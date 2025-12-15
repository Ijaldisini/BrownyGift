<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Total semua pesanan
        $totalOrders = Pesanan::count();

        // Pesanan yang sedang diproses
        $processingOrders = Pesanan::whereHas('statusPemesanan', function($q){
            $q->where('status_pemesanan', 'Diproses');
        })->count();

        // Pesanan dalam pengiriman
        $shippingOrders = Pesanan::whereHas('statusPemesanan', function($q){
            $q->where('status_pemesanan', 'Dikirim');
        })->count();

        // Pesanan selesai
        $completedOrders = Pesanan::whereHas('statusPemesanan', function($q){
            $q->where('status_pemesanan', 'Selesai');
        })->count();

        // Pesanan pending (belum lunas)
        $pendingOrders = Pesanan::whereHas('statusPemesanan', function($q){
            $q->where('status_pemesanan', 'Menunggu Konfirmasi');
        })->count();

        return view('dashboard.admin.index', compact(
            'totalOrders',
            'processingOrders',
            'shippingOrders',
            'completedOrders',
            'pendingOrders',
        ));
    }
}
