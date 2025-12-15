@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="animate-fadeIn">
    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-l-4 border-emerald-500 p-5 mb-8 rounded-r-2xl shadow-lg animate-slideDown" role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-check-lg text-white text-xl"></i>
                </div>
                <p class="text-emerald-800 font-medium">{{ session('success') }}</p>
            </div>
            <button type="button" class="text-emerald-700 hover:text-emerald-900 hover:bg-emerald-100 rounded-lg p-2 transition-colors" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">
        <!-- Header -->
        <div class="bg-gradient-to-r from-pink-50 via-rose-50 to-pink-50 p-8 border-b border-pink-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent mb-2 flex items-center">
                        <i class="bi bi-receipt-cutoff mr-3"></i>
                        Kelola Pesanan
                    </h2>
                    <p class="text-gray-600">Admin dapat mengubah status pesanan dan pembayaran</p>
                </div>
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-8 bg-gradient-to-br from-pink-50 to-white">
            <!-- Total Pesanan -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-pink-200 hover:-translate-y-1">
                <div class="p-6 relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-pink-100 to-rose-100 rounded-bl-full opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="bi bi-bag-check-fill text-white text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Pesanan</p>
                        <h3 class="text-3xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                            {{ $orders->count() }}
                        </h3>
                    </div>
                </div>
            </div>

           <!-- Belum Dibayar -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-amber-200 hover:-translate-y-1">
                <div class="p-6 relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 rounded-bl-full opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="bi bi-clock-history text-white text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Belum Dibayar</p>
                        <h3 class="text-3xl font-bold bg-gradient-to-r from-amber-600 to-orange-500 bg-clip-text text-transparent">
                            {{ $orders->filter(function($order) {
                                return $order->statusPembayaran && strtolower($order->statusPembayaran->status_pembayaran) == 'belum lunas';
                            })->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Diproses -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-blue-200 hover:-translate-y-1">
                <div class="p-6 relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-bl-full opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="bi bi-arrow-repeat text-white text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Diproses</p>
                        <h3 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                            {{ $orders->filter(function($order) {
                                return $order->statusPemesanan && $order->statusPemesanan->status_pemesanan == 'diproses';
                            })->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Selesai -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-emerald-200 hover:-translate-y-1">
                <div class="p-6 relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-bl-full opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="bi bi-check-circle-fill text-white text-xl"></i>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Selesai</p>
                        <h3 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">
                            {{ $orders->filter(function($order) {
                                return $order->statusPemesanan && $order->statusPemesanan->status_pemesanan == 'selesai';
                            })->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="p-8">
            <div class="overflow-x-auto rounded-2xl border border-pink-200 shadow-sm">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-100 to-rose-100">
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Pembayaran</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status Pesanan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-pink-100">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 transition-all duration-200">
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 text-white rounded-lg font-bold text-sm shadow-sm">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2 text-gray-700">
                                    <i class="bi bi-calendar-event text-pink-500"></i>
                                    <span class="font-medium">{{ \Carbon\Carbon::parse($order->tanggal_pemesanan)->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-pink-100 to-rose-100 rounded-full flex items-center justify-center">
                                        <i class="bi bi-person-fill text-pink-600 text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-900">{{ $order->user->nama }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-lg bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </span>
                            </td>
                            <!-- Status Pembayaran -->
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.pesanan.updatePembayaran', $order->id_pesanan) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pembayaran_id"
                                            onchange="if(confirm('Yakin ingin mengubah status pembayaran?')) this.form.submit()"
                                            class="text-xs font-bold rounded-xl px-4 py-2 border-2 cursor-pointer transition-all focus:outline-none focus:ring-2 focus:ring-offset-2
                                            {{ $order->statusPembayaran->status_pembayaran == 'Lunas'
                                                ? 'bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-700 border-emerald-300 hover:border-emerald-400 focus:ring-emerald-500'
                                                : 'bg-gradient-to-r from-red-50 to-pink-50 text-red-700 border-red-300 hover:border-red-400 focus:ring-red-500' }}">
                                        @foreach($statusPembayaran as $status)
                                            <option value="{{ $status->id_status_pembayaran }}"
                                                {{ $order->id_status_pembayaran == $status->id_status_pembayaran ? 'selected' : '' }}>
                                                {{ $status->status_pembayaran }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <!-- Status Pesanan -->
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.pesanan.updateStatus', $order->id_pesanan) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pemesanan_id"
                                            onchange="if(confirm('Yakin ingin mengubah status pesanan?')) this.form.submit()"
                                            class="text-xs font-bold rounded-xl px-4 py-2 border-2 cursor-pointer transition-all focus:outline-none focus:ring-2 focus:ring-offset-2
                                            @if($order->statusPemesanan->status_pemesanan == 'Menunggu')
                                                bg-gradient-to-r from-amber-50 to-orange-50 text-amber-700 border-amber-300 hover:border-amber-400 focus:ring-amber-500
                                            @elseif($order->statusPemesanan->status_pemesanan == 'Diproses')
                                                bg-gradient-to-r from-blue-50 to-cyan-50 text-blue-700 border-blue-300 hover:border-blue-400 focus:ring-blue-500
                                            @elseif($order->statusPemesanan->status_pemesanan == 'Dikirim')
                                                bg-gradient-to-r from-purple-50 to-fuchsia-50 text-purple-700 border-purple-300 hover:border-purple-400 focus:ring-purple-500
                                            @elseif($order->statusPemesanan->status_pemesanan == 'Selesai')
                                                bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-700 border-emerald-300 hover:border-emerald-400 focus:ring-emerald-500
                                            @else
                                                bg-gradient-to-r from-gray-50 to-slate-50 text-gray-700 border-gray-300 hover:border-gray-400 focus:ring-gray-500
                                            @endif">
                                        @foreach($statusPemesanan as $status)
                                            <option value="{{ $status->id_status_pemesanan }}"
                                                {{ $order->id_status_pemesanan == $status->id_status_pemesanan ? 'selected' : '' }}>
                                                {{ ucfirst($status->status_pemesanan) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.pesanan.show', $order->id_pesanan) }}"
                                   class="inline-flex items-center space-x-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 shadow-sm hover:shadow-lg">
                                    <i class="bi bi-eye-fill"></i>
                                    <span>Detail</span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-16">
                                <div class="flex flex-col items-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-pink-100 to-rose-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="bi bi-inbox text-pink-400 text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg">Belum ada data pesanan</p>
                                    <p class="text-gray-400 text-sm mt-2">Pesanan akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

.animate-slideDown {
    animation: slideDown 0.4s ease-out;
}
</style>
@endsection
