@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="animate-fadeIn">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center justify-between">
            <div>
                <h4 class="text-3xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent mb-2">
                    Dashboard Admin
                </h4>
                <p class="text-gray-600 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Kelola pesanan dan produk toko
                </p>
            </div>
        </div>
    </div>

    {{-- Pesanan Pending Alert --}}
    @if(($pendingOrders ?? 0) > 0)
    <div class="bg-gradient-to-r from-amber-50 to-orange-50 border border-orange-200 rounded-2xl p-5 mb-10 shadow-sm hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="bi bi-bell-fill text-white text-xl"></i>
                </div>
                <div>
                    <span class="text-orange-900 font-semibold text-lg">{{ $pendingOrders ?? 0 }} Pesanan Baru</span>
                    <p class="text-orange-700 text-sm">Menunggu konfirmasi pembayaran</p>
                </div>
            </div>
            <a href="{{ route('admin.pesanan.index') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 flex items-center space-x-2">
                <span>Lihat Pesanan</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    @endif

    {{-- Statistik Pesanan Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {{-- Total Pesanan --}}
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-pink-100 hover:border-pink-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Pesanan</p>
                        <h3 class="text-4xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                            {{ $totalOrders ?? 0 }}
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-100 to-rose-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-bag-heart-fill text-pink-600 text-2xl"></i>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </div>
        </div>

        {{-- Sedang Diproses --}}
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-blue-100 hover:border-blue-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Sedang Diproses</p>
                        <h3 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                            {{ $processingOrders ?? 0 }}
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-arrow-clockwise text-blue-600 text-2xl animate-spin-slow"></i>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </div>
        </div>

        {{-- Dalam Pengiriman --}}
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-purple-100 hover:border-purple-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Dalam Pengiriman</p>
                        <h3 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-fuchsia-500 bg-clip-text text-transparent">
                            {{ $shippingOrders ?? 0 }}
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-fuchsia-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-truck text-purple-600 text-2xl"></i>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-purple-500 to-fuchsia-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </div>
        </div>

        {{-- Selesai --}}
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-emerald-100 hover:border-emerald-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Selesai</p>
                        <h3 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">
                            {{ $completedOrders ?? 0 }}
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-check-circle-fill text-emerald-600 text-2xl"></i>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-gradient-to-br from-pink-50 via-white to-rose-50 rounded-2xl p-8 mb-6 border border-pink-100">
        <h5 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
            <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center mr-3">
                <i class="bi bi-lightning-fill text-white text-sm"></i>
            </div>
            Menu Cepat
        </h5>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Kelola Produk --}}
            <a href="{{ route('admin.produk.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-pink-100 hover:border-pink-300 hover:-translate-y-2">
                <div class="p-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-pink-100 to-rose-100 rounded-3xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="bi bi-box-seam-fill text-pink-600 text-3xl"></i>
                    </div>
                    <h5 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-pink-600 transition-colors">
                        Kelola Produk
                    </h5>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Tambah, edit, atau hapus produk
                    </p>
                    <div class="mt-4 flex items-center text-pink-600 font-medium text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Buka</span>
                        <i class="bi bi-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>

            {{-- Pesanan --}}
            <a href="{{ route('admin.pesanan.index') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-blue-100 hover:border-blue-300 hover:-translate-y-2 relative">
                @if(($pendingOrders ?? 0) > 0)
                <div class="absolute top-4 right-4 w-8 h-8 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-lg animate-bounce">
                    {{ $pendingOrders ?? 0 }}
                </div>
                @endif
                <div class="p-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-3xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="bi bi-receipt-cutoff text-blue-600 text-3xl"></i>
                    </div>
                    <h5 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                        Pesanan
                    </h5>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Kelola dan proses pesanan
                    </p>
                    <div class="mt-4 flex items-center text-blue-600 font-medium text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Buka</span>
                        <i class="bi bi-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>

            {{-- Laporan --}}
            <a href="{{ route('admin.laporan.laporan') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-emerald-100 hover:border-emerald-300 hover:-translate-y-2">
                <div class="p-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-3xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="bi bi-graph-up-arrow text-emerald-600 text-3xl"></i>
                    </div>
                    <h5 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                        Laporan
                    </h5>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Lihat laporan penjualan
                    </p>
                    <div class="mt-4 flex items-center text-emerald-600 font-medium text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Buka</span>
                        <i class="bi bi-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-spin-slow {
    animation: spin-slow 3s linear infinite;
}
</style>
@endsection
