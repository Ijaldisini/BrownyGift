<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $bulanIni = now()->month;
        $tahunIni = now()->year;

        $bulanLalu = now()->subMonth()->month;
        $tahunBulanLalu = now()->subMonth()->year;

        $pesananBulanIni = Pesanan::whereMonth('tanggal_pemesanan', $bulanIni)
            ->whereYear('tanggal_pemesanan', $tahunIni)
            ->sum('total');

        $totalPendapatan = $pesananBulanIni;

        $pesananBulanLalu = Pesanan::whereMonth('tanggal_pemesanan', $bulanLalu)
            ->whereYear('tanggal_pemesanan', $tahunBulanLalu)
            ->sum('total');

        if ($pesananBulanLalu > 0) {
            $persentasePerubahan = (($pesananBulanIni - $pesananBulanLalu) / $pesananBulanLalu) * 100;
        } else {
            $persentasePerubahan = 0;
        }

        $totalPesanan = Pesanan::whereMonth('tanggal_pemesanan', $bulanIni)
            ->whereYear('tanggal_pemesanan', $tahunIni)
            ->count();

        $produkAktif = DB::table('produk')
            ->where('stok_produk', '>', 0)
            ->count();

        $karyawan = User::where('id_role', 2)->count();

        // ================= AKTIVITAS PESANAN =================
        $aktivitasPesanan = Pesanan::orderBy('tanggal_pemesanan', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($pesanan) {
                return (object) [
                    'time' => Carbon::parse($pesanan->tanggal_pemesanan),
                    'icon' => 'bi bi-cart-check',
                    'icon_color' => 'success',
                    'description' => 'Pesanan #' . $pesanan->id_pesanan . ' telah dibuat',
                    'time_ago' => Carbon::parse($pesanan->tanggal_pemesanan)->diffForHumans(),
                ];
            });

        // ================= KARYAWAN BARU =================
        $aktivitasKaryawanBaru = User::where('id_role', 2)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($user) {
                return (object) [
                    'time' => Carbon::parse($user->created_at),
                    'icon' => 'bi bi-person-plus',
                    'icon_color' => 'info',
                    'description' => 'Karyawan baru ditambahkan: ' . $user->nama,
                    'time_ago' => Carbon::parse($user->created_at)->diffForHumans(),
                ];
            });

        // ================= KARYAWAN DIEDIT =================
        $aktivitasKaryawanEdit = User::where('id_role', 2)
            ->whereColumn('updated_at', '!=', 'created_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($user) {
                return (object) [
                    'time' => Carbon::parse($user->updated_at),
                    'icon' => 'bi bi-pencil-square',
                    'icon_color' => 'warning',
                    'description' => 'Data karyawan diperbarui: ' . $user->nama,
                    'time_ago' => Carbon::parse($user->updated_at)->diffForHumans(),
                ];
            });

        // ================= GABUNG SEMUA =================
        $activities = collect()
            ->merge($aktivitasPesanan)
            ->merge($aktivitasKaryawanBaru)
            ->merge($aktivitasKaryawanEdit)
            ->sortByDesc('time')
            ->take(7)
            ->values();


        return view('dashboard.owner.index', compact(
            'totalPesanan',
            'totalPendapatan',
            'produkAktif',
            'karyawan',
            'persentasePerubahan',
            'activities'
        ));
    }

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
            'id_role'  => 2,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Akun karyawan berhasil dibuat!');
    }

    public function listKaryawan(Request $request)
    {
        $search = $request->query('search');

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

        // VALIDASI DATA UMUM
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'no_hp' => 'required|string|max:20',
        ]);

        // UPDATE PROFIL
        $user->nama  = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        // JIKA USER INGIN GANTI PASSWORD
        if ($request->filled('password_lama') || $request->filled('password_baru')) {

            $request->validate([
                'password_lama' => 'required',
                'password_baru' => 'required|min:6|confirmed',
            ], [
                'password_lama.required' => 'Password lama wajib diisi',
                'password_baru.required' => 'Password baru wajib diisi',
                'password_baru.confirmed' => 'Konfirmasi password tidak cocok',
            ]);

            // CEK PASSWORD LAMA
            if (!Hash::check($request->password_lama, $user->password)) {
                return back()->withErrors([
                    'password_lama' => 'Password lama tidak sesuai'
                ])->withInput();
            }

            // SIMPAN PASSWORD BARU
            $user->password = Hash::make($request->password_baru);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function editProfilSaya()
    {
        $user = Auth::user();
        return view('dashboard.owner.profil_saya_edit', compact('user'));
    }
}
