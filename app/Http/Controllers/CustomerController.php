<?php

namespace App\Http\Controllers;

// Import Request Form (Pastikan folder sudah benar: app/Http/Requests/Customer)
use App\Http\Requests\Customer\UpdateProfileRequest;
use App\Http\Requests\Customer\StoreAddressRequest;
use App\Http\Requests\Customer\AddToCartRequest;
use App\Http\Requests\Customer\CheckoutRequest;

// Import Models (Gunakan PascalCase)
use App\Models\Alamat;
use App\Models\Pesanan;
use App\Models\detail_pesanan;
use App\Models\Produk;
use App\Models\metode_pembayaran;
use App\Models\kecamatan;
use App\Models\desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.customer.index');
    }

    public function profil()
    {
        $user = Auth::user();
        $addresses = $user->alamat()->with(['kecamatan', 'desa'])->get();
        $kecamatans = kecamatan::all();
        $desas = desa::all();
        return view('dashboard.customer.profil', compact('addresses', 'kecamatans', 'desas'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $request->user()->update($request->validated());
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function storeAddress(StoreAddressRequest $request)
    {
        $request->user()->alamat()->create($request->validated());
        return back()->with('success', 'Alamat berhasil ditambahkan!');
    }

    public function deleteAddress($id)
    {
        Auth::user()->alamat()->where('id_alamat', $id)->delete();
        return back()->with('success', 'Alamat berhasil dihapus!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah!');
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        $request->validate(['photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']]);

        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $request->file('photo')->store('profile-photos', 'public');
        $user->forceFill(['photo' => $path])->save();
        return back()->with('success', 'Foto profil berhasil diubah!');
    }

    public function produk()
    {
        $products = produk::with('kategori')->get();
        return view('dashboard.customer.produk', compact('products'));
    }

    public function addToCart(AddToCartRequest $request)
    {
        $user = Auth::user();
        $item = $user->keranjang()->where('id_produk', $request->id_produk)->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            $user->keranjang()->create($request->validated());
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Produk ditambahkan!']);
        }
        return redirect()->route('customer.keranjang')->with('success', 'Produk ditambahkan!');
    }

    public function keranjang()
    {
        $cartItems = Auth::user()->keranjang()->with('produk')->get();
        return view('dashboard.customer.keranjang', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'id_keranjang' => 'required|exists:keranjang,id_keranjang',
            'quantity' => 'required|integer|min:1'
        ]);
        $item = Auth::user()->keranjang()->where('id_keranjang', $request->id_keranjang)->firstOrFail();
        $item->update(['quantity' => $request->quantity]);
        return response()->json(['success' => true]);
    }

    public function removeFromCart($id)
    {
        Auth::user()->keranjang()->where('id_keranjang', $id)->delete();
        return back()->with('success', 'Produk dihapus.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = $user->keranjang()->with('produk')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.keranjang')->with('error', 'Keranjang kosong!');
        }
        $addresses = $user->alamat()->with(['kecamatan', 'desa'])->get();
        $paymentMethods = metode_pembayaran::all();
        return view('dashboard.customer.checkout', compact('cartItems', 'addresses', 'paymentMethods'));
    }

    public function processCheckout(CheckoutRequest $request)
    {
        $user = Auth::user();
        $cartItems = $user->keranjang()->with('produk')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        $subtotal = $cartItems->sum(fn($item) => $item->produk->harga_produk * $item->quantity);
        $ongkir = 0;
        if ($request->pengiriman == 'Dikirim') {
            $address = Alamat::with('desa')->find($request->id_alamat);
            $ongkir = $address->desa->ongkir ?? 0;
        }
        $total = $subtotal + $ongkir;

        $paymentMethod = metode_pembayaran::find($request->id_metode_pembayaran);
        $isCOD = $paymentMethod && (stripos($paymentMethod->metode_pembayaran, 'COD') !== false);
        $initialStatus = $isCOD ? 2 : 1;

        DB::transaction(function () use ($user, $request, $initialStatus, $total, $cartItems) {
            $order = Pesanan::create([
                'id_user' => $user->id_user,
                'id_alamat' => $request->id_alamat,
                'id_metode_pembayaran' => $request->id_metode_pembayaran,
                'id_status_pembayaran' => 1,
                'id_status_pemesanan' => $initialStatus,
                'total' => $total,
                'catatan' => $request->catatan,
                'tanggal_pemesanan' => now(), // Sesuai kolom migrasi Anda
            ]);

            foreach ($cartItems as $item) {
                detail_pesanan::create([
                    'id_pesanan' => $order->id_pesanan,
                    'id_produk' => $item->id_produk,
                    'quantity_per_produk' => $item->quantity,
                    'harga_produk' => $item->produk->harga_produk,
                    'subtotal' => $item->produk->harga_produk * $item->quantity,
                ]);
            }
            $user->keranjang()->delete();
        });

        return redirect()->route('customer.pesanansaya')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function pesanansaya()
    {
        $orders = Auth::user()->pesanan()
            ->with(['detailPesanan.produk', 'statusPemesanan', 'statusPembayaran', 'metodePembayaran'])
            ->orderBy('id_pesanan', 'desc')
            ->get();
        return view('dashboard.customer.pesanansaya', compact('orders'));
    }

    public function riwayat()
    {
        $orders = Auth::user()->pesanan()
            ->with(['detailPesanan.produk', 'statusPemesanan', 'statusPembayaran'])
            ->orderBy('id_pesanan', 'desc')
            ->get();
        return view('dashboard.customer.riwayatbelanja', compact('orders'));
    }

    public function uploadBukti(Request $request, $id)
    {
        $request->validate(['bukti_pembayaran' => 'required|image|max:2048']);
        $order = Auth::user()->pesanan()->findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $imageName = time() . '.' . $request->bukti_pembayaran->extension();
            $request->bukti_pembayaran->storeAs('public/payments', $imageName);
            $order->update(['bukti_pembayaran' => $imageName, 'id_status_pemesanan' => 2]);
            return back()->with('success', 'Bukti berhasil diupload!');
        }
        return back()->with('error', 'Gagal upload.');
    }
}
