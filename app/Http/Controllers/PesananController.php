<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\status_pembayaran;
use App\Models\status_pemesanan;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Pesanan::with(['user', 'statusPemesanan', 'statusPembayaran'])
            ->orderBy('tanggal_pemesanan', 'desc')
            ->get();

        $statusPembayaran = status_pembayaran::all();
        $statusPemesanan = status_pemesanan::all();

        return view('dashboard.admin.pesanan.index', compact('orders', 'statusPembayaran', 'statusPemesanan'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'statusPemesanan', 'statusPembayaran', 'alamat', 'detailPesanan.produk'])
            ->findOrFail($id);

        return view('dashboard.admin.pesanan.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pemesanan_id' => 'required|exists:status_pemesanan,id_status_pemesanan',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->id_status_pemesanan = $request->status_pemesanan_id;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diupdate');
    }

    public function updatePembayaran(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran_id' => 'required|exists:status_pembayaran,id_status_pembayaran',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->id_status_pembayaran = $request->status_pembayaran_id;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diupdate');
    }
}
