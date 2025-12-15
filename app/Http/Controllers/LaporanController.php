<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan(Request $request)
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

        $totalPenjualan = DB::table('detail_pesanan')
            ->join('pesanan', 'detail_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->whereMonth('pesanan.tanggal_pemesanan', $bulanDipilih)
            ->whereYear('pesanan.tanggal_pemesanan', $tahunDipilih)
            ->sum('detail_pesanan.quantity_per_produk');

        $totalPendapatan = DB::table('detail_pesanan')
            ->join('pesanan', 'detail_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->whereMonth('pesanan.tanggal_pemesanan', $bulanDipilih)
            ->whereYear('pesanan.tanggal_pemesanan', $tahunDipilih)
            ->sum(DB::raw('detail_pesanan.quantity_per_produk * detail_pesanan.harga_produk'));

        $topProducts = DB::table('detail_pesanan')
            ->join('produk', 'detail_pesanan.id_produk', '=', 'produk.id_produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('pesanan', 'detail_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->select(
                'produk.nama_produk as nama',
                'kategori.nama_kategori as kategori',
                DB::raw('SUM(detail_pesanan.quantity_per_produk) as jumlah'),
                DB::raw('SUM(detail_pesanan.quantity_per_produk * detail_pesanan.harga_produk) as pendapatan')
            )
            ->whereMonth('pesanan.tanggal_pemesanan', $bulanDipilih)
            ->whereYear('pesanan.tanggal_pemesanan', $tahunDipilih)
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'kategori.nama_kategori')
            ->orderByDesc('jumlah')
            ->limit(10)
            ->get();

        $produkTerlaris = $topProducts->first()->nama ?? '-';

        $hariDalamBulan = Carbon::create($tahunDipilih, $bulanDipilih, 1)->daysInMonth;
        $rataRata = $hariDalamBulan > 0 ? round($totalPenjualan / $hariDalamBulan, 2) : 0;

        $namaBulan = Carbon::create()->month($bulanDipilih)->translatedFormat('F');

        return view('dashboard.admin.laporan', compact(
            'labels',
            'data',
            'bulanDipilih',
            'tahunDipilih',
            'namaBulan',
            'totalPenjualan',
            'totalPendapatan',
            'produkTerlaris',
            'rataRata',
            'topProducts'
        ));
    }
}
