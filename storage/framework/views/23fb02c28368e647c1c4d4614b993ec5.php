<?php $__env->startSection('content'); ?>
<div class="mb-8">
    <h4 class="text-2xl font-semibold text-gray-900 mb-2">Dashboard Admin</h4>
    <p class="text-gray-500">Kelola pesanan dan produk toko</p>
</div>

<?php if(isset($pendingOrders) && $pendingOrders > 0): ?>
<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-xl mr-3"></i>
            <span class="text-yellow-800 font-medium"><?php echo e($pendingOrders); ?> pesanan menunggu konfirmasi pembayaran</span>
        </div>
        <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
            Lihat Pesanan
        </a>
    </div>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <h6 class="text-sm font-medium text-gray-600">Total Pesanan</h6>
            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                <i class="bi bi-bag text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-3xl font-bold text-gray-900"><?php echo e($totalOrders ?? 0); ?></h3>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <h6 class="text-sm font-medium text-gray-600">Sedang Diproses</h6>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="bi bi-arrow-repeat text-blue-500 text-xl"></i>
            </div>
        </div>
        <h3 class="text-3xl font-bold text-gray-900"><?php echo e($processingOrders ?? 0); ?></h3>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <h6 class="text-sm font-medium text-gray-600">Dalam Pengiriman</h6>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="bi bi-truck text-yellow-500 text-xl"></i>
            </div>
        </div>
        <h3 class="text-3xl font-bold text-gray-900"><?php echo e($shippingOrders ?? 0); ?></h3>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <h6 class="text-sm font-medium text-gray-600">Selesai</h6>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="bi bi-check-circle text-green-500 text-xl"></i>
            </div>
        </div>
        <h3 class="text-3xl font-bold text-gray-900"><?php echo e($completedOrders ?? 0); ?></h3>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <a href="/admin/produk" class="bg-white rounded-xl shadow-sm p-8 hover:shadow-lg transition-all hover:-translate-y-1 flex flex-col items-center text-center">
        <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mb-4">
            <i class="bi bi-box-seam text-primary text-2xl"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-900 mb-2">Kelola Produk</h5>
        <p class="text-gray-500 text-sm">Tambah, edit, atau hapus produk</p>
    </a>

    <a href="#" class="bg-white rounded-xl shadow-sm p-8 hover:shadow-lg transition-all hover:-translate-y-1 flex flex-col items-center text-center relative">
        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-4">
            <i class="bi bi-receipt text-blue-500 text-2xl"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-900 mb-2">Pesanan</h5>
        <p class="text-gray-500 text-sm mb-3">Kelola dan proses pesanan</p>
        <?php if(isset($pendingOrders) && $pendingOrders > 0): ?>
        <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-medium">
            <?php echo e($pendingOrders); ?> menunggu
        </span>
        <?php endif; ?>
    </a>

    <a href="#" class="bg-white rounded-xl shadow-sm p-8 hover:shadow-lg transition-all hover:-translate-y-1 flex flex-col items-center text-center">
        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-4">
            <i class="bi bi-file-earmark-text text-green-500 text-2xl"></i>
        </div>
        <h5 class="text-lg font-semibold text-gray-900 mb-2">Laporan</h5>
        <p class="text-gray-500 text-sm">Lihat laporan penjualan</p>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm p-8">
    <h5 class="text-primary font-semibold mb-6 flex items-center">
        <i class="bi bi-clock-history mr-2"></i>
        Aktivitas Terbaru
    </h5>

    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $activities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="flex items-start p-4 rounded-lg hover:bg-pink-50 transition-colors">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0
                    <?php if($activity->icon_color == 'success'): ?> bg-green-100 text-green-600
                    <?php elseif($activity->icon_color == 'info'): ?> bg-blue-100 text-blue-600
                    <?php elseif($activity->icon_color == 'warning'): ?> bg-yellow-100 text-yellow-600
                    <?php else: ?> bg-pink-100 text-primary
                    <?php endif; ?>">
                <i class="<?php echo e($activity->icon); ?> text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="text-gray-900 font-medium text-sm"><?php echo e($activity->description); ?></p>
                <small class="text-gray-500 text-xs"><?php echo e($activity->time_ago); ?></small>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-12 text-gray-400">
            <i class="bi bi-inbox text-5xl mb-4 block opacity-30"></i>
            <p>Belum ada aktivitas terbaru</p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/admin/index.blade.php ENDPATH**/ ?>