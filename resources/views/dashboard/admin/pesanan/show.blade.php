@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="max-w-6xl mx-auto animate-fadeIn">
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-pink-100">
        <!-- Header with Gradient Background -->
        <div class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-600 p-8">
            <div class="flex justify-between items-start">
                <div class="text-white">
                    <h2 class="text-4xl font-bold mb-3 flex items-center">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4">
                            <i class="bi bi-receipt text-white text-2xl"></i>
                        </div>
                        Detail Pesanan
                    </h2>
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl inline-flex">
                        <i class="bi bi-hash text-lg"></i>
                        <span class="text-lg font-semibold">Pesanan #{{ $pesanan->id_pesanan }}</span>
                    </div>
                </div>

                <a href="{{ route('admin.pesanan.index') }}"
                   class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 border border-white/20">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <div class="p-8">
            <!-- Status Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Status Pemesanan -->
                <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
                    <div class="relative">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="bi bi-truck text-2xl"></i>
                            </div>
                            <p class="text-sm opacity-90 font-medium">Status Pemesanan</p>
                        </div>
                        <p class="text-3xl font-bold">{{ $pesanan->statusPemesanan->status_pemesanan }}</p>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
                    <div class="relative">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="bi bi-credit-card text-2xl"></i>
                            </div>
                            <p class="text-sm opacity-90 font-medium">Status Pembayaran</p>
                        </div>
                        <p class="text-3xl font-bold">{{ $pesanan->statusPembayaran->status_pembayaran }}</p>
                    </div>
                </div>
            </div>

            <!-- Info Pesanan -->
            <div class="bg-gradient-to-br from-pink-50 via-rose-50 to-pink-50 rounded-2xl p-8 mb-8 border border-pink-200">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                        <i class="bi bi-info-circle text-white"></i>
                    </div>
                    <h3 class="font-bold text-xl bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                        Informasi Pesanan
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Customer -->
                    <div class="group bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-pink-100 hover:border-pink-300">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-100 to-rose-100 rounded-lg flex items-center justify-center">
                                <i class="bi bi-person-circle text-pink-600 text-xl"></i>
                            </div>
                            <p class="text-xs text-gray-600 font-semibold uppercase tracking-wider">Customer</p>
                        </div>
                        <p class="font-bold text-gray-900 text-lg">{{ $pesanan->user->nama }}</p>
                    </div>

                    <!-- Tanggal Pemesanan -->
                    <div class="group bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-pink-100 hover:border-pink-300">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-lg flex items-center justify-center">
                                <i class="bi bi-calendar-check text-blue-600 text-xl"></i>
                            </div>
                            <p class="text-xs text-gray-600 font-semibold uppercase tracking-wider">Tanggal Pemesanan</p>
                        </div>
                        <p class="font-bold text-gray-900 text-lg">
                            {{ \Carbon\Carbon::parse($pesanan->tanggal_pemesanan)->format('d M Y H:i') }}
                        </p>
                    </div>

                    <!-- Tanggal Pengambilan -->
                    <div class="group bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-pink-100 hover:border-pink-300">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-100 to-fuchsia-100 rounded-lg flex items-center justify-center">
                                <i class="bi bi-calendar-event text-purple-600 text-xl"></i>
                            </div>
                            <p class="text-xs text-gray-600 font-semibold uppercase tracking-wider">Tanggal Pengambilan</p>
                        </div>
                        <p class="font-bold text-gray-900 text-lg">
                            {{ $pesanan->tanggal_pengambilan
                                ? \Carbon\Carbon::parse($pesanan->tanggal_pengambilan)->format('d M Y')
                                : '-' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Produk Dipesan -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                        <i class="bi bi-bag-check text-white"></i>
                    </div>
                    <h3 class="font-bold text-xl bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                        Produk Dipesan
                    </h3>
                </div>

                <div class="space-y-4">
                    @foreach($pesanan->detailPesanan as $index => $item)
                    <div class="group bg-gradient-to-r from-white via-pink-50 to-white border-2 border-pink-200 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:border-pink-300 hover:-translate-y-1">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-5">
                                <!-- Number Badge -->
                                <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-xl">{{ $index + 1 }}</span>
                                </div>

                                <!-- Product Icon -->
                                <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-rose-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-flower1 text-pink-600 text-3xl"></i>
                                </div>

                                <!-- Product Info -->
                                <div>
                                    <p class="font-bold text-gray-900 text-xl mb-2">{{ $item->produk->nama_produk }}</p>
                                    <div class="flex items-center space-x-4 text-gray-600">
                                        <div class="flex items-center space-x-2 bg-pink-50 px-3 py-1 rounded-lg">
                                            <i class="bi bi-box text-pink-600"></i>
                                            <span class="font-semibold text-sm">{{ $item->quantity_per_produk }} unit</span>
                                        </div>
                                        <div class="flex items-center space-x-2 bg-blue-50 px-3 py-1 rounded-lg">
                                            <i class="bi bi-tag text-blue-600"></i>
                                            <span class="font-semibold text-sm">Rp {{ number_format($item->harga_produk,0,',','.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subtotal -->
                            <div class="text-right">
                                <p class="text-xs text-gray-500 mb-2 font-medium">Subtotal</p>
                                <p class="font-bold text-2xl bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                                    Rp {{ number_format($item->subtotal,0,',','.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Total Payment -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-pink-600 via-rose-500 to-pink-600 p-8 text-white shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-bl-full"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-black/10 rounded-tr-full"></div>

                <div class="relative flex justify-between items-center">
                    <div>
                        <p class="text-sm opacity-90 mb-2 font-medium flex items-center">
                            <i class="bi bi-cash-stack mr-2"></i>
                            Total Pembayaran
                        </p>
                        <p class="text-5xl font-bold">
                            Rp {{ number_format($pesanan->total,0,',','.') }}
                        </p>
                    </div>
                    <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center">
                        <i class="bi bi-currency-dollar text-6xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}
</style>
@endsection
