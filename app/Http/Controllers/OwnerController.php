<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\store;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function karyawanForm()
    {
        return view('dashboard.owner.karyawan');
    }

    public function storeKaryawan(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'id_role'  => 2, // role karyawan
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => bcrypt($request->password) // HASH WAJIB
        ]);

        return back()->with('success', 'Akun karyawan berhasil dibuat!');
    }

    public function listKaryawan(Request $request) // Tambahkan Request di sini
    {
        $search = $request->query('search'); // Ambil input dari input name="search"

        $karyawan = User::where('id_role', 2)
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('id_user', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id_user', 'desc')
            ->get();

        return view('dashboard.owner.karyawan_list', compact('karyawan'));
    }

    public function editKaryawan($id)
    {
        $karyawan = User::findOrFail($id);
        return view('dashboard.owner.karyawan_edit', compact('karyawan'));
    }

    public function updateKaryawan(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $karyawan = User::findOrFail($id);
        $karyawan->nama = $request->nama;
        $karyawan->email = $request->email;
        $karyawan->no_hp = $request->no_hp;

        if ($request->password != null) {
            $karyawan->password = bcrypt($request->password);
        }

        $karyawan->save();

        return redirect('/owner/karyawan_list')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function deleteKaryawan($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect('/owner/karyawan_list')->with('success', 'Karyawan berhasil dihapus!');
    }

    public function showProfilToko()
    {
        $toko = Store::first();

        return view('dashboard.owner.profil_toko', compact('toko'));
    }

    public function editProfilToko()
    {
        $toko = Store::first();
        return view('dashboard.owner.profil_toko_edit', compact('toko'));
    }

    public function updateProfilToko(Request $request)
    {
        $request->validate([
            'nama_toko'    => 'required',
            'deskripsi'    => 'required',
            'tentang_kami' => 'required',
        ]);

        $toko = Store::first();

        $toko->update([
            'nama_toko'    => $request->nama_toko,
            'deskripsi'    => $request->deskripsi,
            'tentang_kami' => $request->tentang_kami,
        ]);

        return redirect('/owner/profil_toko')->with('success', 'Profil toko berhasil diperbarui!');
    }

    public function laporanPenjualan(Request $request)
    {
        $bulanDipilih = (int) ($request->bulan ?? date('m'));
        $tahunDipilih = (int) ($request->tahun ?? date('Y'));

        $laporan = DB::table('pesanan')
            ->join('detail_pesanan', 'pesanan.id_pesanan', '=', 'detail_pesanan.id_pesanan')
            ->select(
                DB::raw('DATE(pesanan.tanggal_pemesanan) as tanggal'),
                DB::raw('SUM(detail_pesanan.quantity_per_produk) as total_produk')
            )
            ->whereMonth('pesanan.tanggal_pemesanan', $bulanDipilih)
            ->whereYear('pesanan.tanggal_pemesanan', $tahunDipilih)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $labels = [];
        $data = [];

        foreach ($laporan as $item) {
            $labels[] = Carbon::parse($item->tanggal)->format('d M');
            $data[] = $item->total_produk;
        }

        $namaBulan = Carbon::create()->month($bulanDipilih)->translatedFormat('F');

        return view('dashboard.owner.laporan_penjualan', compact(
            'labels',
            'data',
            'bulanDipilih',
            'tahunDipilih',
            'namaBulan'
        ));
    }

    public function profilSaya()
    {
        $user = Auth::user();
        return view('dashboard.owner.profil_saya', compact('user'));
    }

    public function updateProfilSaya(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|min:6'
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
