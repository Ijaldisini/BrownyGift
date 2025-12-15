<?php $__env->startSection('title', 'Laporan Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto animate-fadeIn">
    <!-- Page Header -->
    <div class="mb-10">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent mb-3 flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <i class="bi bi-graph-up-arrow text-white text-xl"></i>
                    </div>
                    Laporan Penjualan
                </h2>
                <p class="text-gray-600 ml-16">Grafik dan analisis penjualan produk</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Penjualan -->
        <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold opacity-90 uppercase tracking-wider">Total Penjualan</span>
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-cart-check text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-5xl font-bold mb-2"><?php echo e($totalPenjualan ?? 0); ?></h3>
                <p class="text-sm opacity-75 flex items-center">
                    <i class="bi bi-box-seam mr-1"></i>
                    Produk terjual
                </p>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold opacity-90 uppercase tracking-wider">Total Pendapatan</span>
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-cash-stack text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-3xl font-bold mb-2">Rp <?php echo e(number_format($totalPendapatan ?? 0, 0, ',', '.')); ?></h3>
                <p class="text-sm opacity-75 flex items-center">
                    <i class="bi bi-wallet2 mr-1"></i>
                    Total revenue
                </p>
            </div>
        </div>

        <!-- Produk Terlaris -->
        <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold opacity-90 uppercase tracking-wider">Produk Terlaris</span>
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-star-fill text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold mb-2 truncate"><?php echo e($produkTerlaris ?? '-'); ?></h3>
                <p class="text-sm opacity-75 flex items-center">
                    <i class="bi bi-trophy mr-1"></i>
                    Best seller
                </p>
            </div>
        </div>

        <!-- Rata-rata -->
        <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-bl-full"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold opacity-90 uppercase tracking-wider">Rata-rata/Hari</span>
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-graph-up text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-5xl font-bold mb-2"><?php echo e($rataRata ?? 0); ?></h3>
                <p class="text-sm opacity-75 flex items-center">
                    <i class="bi bi-calendar-day mr-1"></i>
                    Penjualan harian
                </p>
            </div>
        </div>
    </div>

    <!-- Chart Card -->
    <div class="bg-white rounded-3xl shadow-xl p-10 mb-10 border border-pink-100">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="bi bi-bar-chart-fill text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                    Grafik Penjualan Produk
                </h3>
            </div>
            <div class="flex gap-3">
                <select class="px-6 py-3 border-2 border-pink-200 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all hover:border-pink-300 bg-gradient-to-r from-white to-pink-50">
                    <option>Bulan Ini</option>
                    <option>3 Bulan Terakhir</option>
                    <option>6 Bulan Terakhir</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
        </div>

        <div class="bg-gradient-to-br from-pink-50 via-rose-50 to-pink-50 rounded-2xl p-8 border border-pink-200">
            <canvas id="chartPenjualan" class="w-full" style="max-height: 450px;"></canvas>
        </div>
    </div>

    <!-- Top Products Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">
        <div class="bg-gradient-to-r from-pink-50 via-rose-50 to-pink-50 p-8 border-b border-pink-200">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="bi bi-trophy-fill text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                    Top 10 Produk Terlaris
                </h3>
            </div>
        </div>

        <div class="p-8">
            <div class="overflow-x-auto rounded-2xl border border-pink-200">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-100 to-rose-100">
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Rank</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Produk</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Terjual</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-pink-100">
                        <?php $__empty_1 = true; $__currentLoopData = $topProducts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 transition-all duration-200">
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl font-bold text-lg shadow-lg
                                    <?php if($index == 0): ?> bg-gradient-to-br from-yellow-400 to-amber-500 text-white
                                    <?php elseif($index == 1): ?> bg-gradient-to-br from-gray-300 to-gray-400 text-white
                                    <?php elseif($index == 2): ?> bg-gradient-to-br from-orange-400 to-amber-600 text-white
                                    <?php else: ?> bg-gradient-to-br from-pink-400 to-rose-500 text-white
                                    <?php endif; ?>">
                                    <?php if($index == 0): ?>
                                        <i class="bi bi-trophy-fill"></i>
                                    <?php elseif($index == 1): ?>
                                        <i class="bi bi-award-fill"></i>
                                    <?php elseif($index == 2): ?>
                                        <i class="bi bi-medal-fill"></i>
                                    <?php else: ?>
                                        <?php echo e($index + 1); ?>

                                    <?php endif; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-100 to-rose-100 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-flower1 text-pink-600"></i>
                                    </div>
                                    <span class="font-bold text-gray-900 text-lg"><?php echo e($product->nama); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gradient-to-r from-pink-100 to-rose-100 text-pink-700 px-4 py-2 rounded-xl text-sm font-bold border border-pink-200">
                                    <?php echo e($product->kategori); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <i class="bi bi-box text-blue-500"></i>
                                    <span class="font-bold text-gray-900 text-lg"><?php echo e($product->jumlah); ?></span>
                                    <span class="text-gray-500 text-sm">unit</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-xl bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                                    Rp <?php echo e(number_format($product->pendapatan, 0, ',', '.')); ?>

                                </span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-16">
                                <div class="flex flex-col items-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-pink-100 to-rose-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="bi bi-inbox text-pink-400 text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg">Belum ada data penjualan</p>
                                    <p class="text-gray-400 text-sm mt-2">Data akan muncul setelah ada transaksi</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPenjualan').getContext('2d');

    // Create gradient
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(236, 72, 153, 0.9)');
    gradient.addColorStop(0.5, 'rgba(251, 113, 133, 0.8)');
    gradient.addColorStop(1, 'rgba(255, 182, 193, 0.7)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels ?? []); ?>,
            datasets: [{
                label: 'Jumlah Produk Terjual',
                data: <?php echo json_encode($data ?? []); ?>,
                backgroundColor: gradient,
                borderColor: 'rgba(236, 72, 153, 1)',
                borderWidth: 3,
                borderRadius: 12,
                hoverBackgroundColor: 'rgba(236, 72, 153, 1)',
                hoverBorderColor: 'rgba(219, 39, 119, 1)',
                hoverBorderWidth: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            size: 16,
                            weight: 'bold',
                            family: 'system-ui'
                        },
                        color: '#374151',
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    padding: 16,
                    cornerRadius: 12,
                    titleFont: {
                        size: 16,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 14
                    },
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return '📦 ' + context.dataset.label + ': ' + context.parsed.y + ' unit';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 13,
                            weight: '600'
                        },
                        color: '#6b7280',
                        padding: 10
                    },
                    grid: {
                        color: 'rgba(251, 113, 133, 0.1)',
                        drawBorder: false,
                        lineWidth: 2
                    },
                    border: {
                        display: false
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 13,
                            weight: '600'
                        },
                        color: '#6b7280',
                        padding: 10
                    },
                    grid: {
                        display: false
                    },
                    border: {
                        display: false
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false,
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/admin/laporan.blade.php ENDPATH**/ ?>