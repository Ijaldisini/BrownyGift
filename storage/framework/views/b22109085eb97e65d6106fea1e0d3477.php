<?php $__env->startSection('title', 'Dashboard Owner'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>
<div class="p-2">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-gray-800 tracking-tight">
            Selamat Datang, <span class="text-pink-600">Owner!</span>
        </h1>
        <p class="text-gray-500 mt-3 text-lg italic">
            "Kontrol penuh BrownyGift ada di tangan Anda"
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl shadow-sm p-6 border-b-4 border-pink-500 hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <h6 class="text-sm font-bold text-gray-400 uppercase">Total Pesanan</h6>
                <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                    <i class="bi bi-cart-check text-pink-600 text-xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-black text-gray-800">1.248</h3>
            <p class="text-xs text-green-500 mt-2 font-semibold"><i class="bi bi-arrow-up"></i> 12% dari bulan lalu</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-b-4 border-green-500 hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <h6 class="text-sm font-bold text-gray-400 uppercase">Pendapatan</h6>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="bi bi-wallet2 text-green-600 text-xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-black text-gray-800">Rp 42,8jt</h3>
            <p class="text-xs text-gray-500 mt-2 italic">Bulan Ini</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-b-4 border-blue-500 hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <h6 class="text-sm font-bold text-gray-400 uppercase">Produk Aktif</h6>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="bi bi-box-seam text-blue-600 text-xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-black text-gray-800">127</h3>
            <p class="text-xs text-gray-500 mt-2">Katalog Aktif</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-b-4 border-yellow-500 hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <h6 class="text-sm font-bold text-gray-400 uppercase">Karyawan</h6>
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="bi bi-people text-yellow-600 text-xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-black text-gray-800">8</h3>
            <p class="text-xs text-gray-500 mt-2 font-medium">Staf Aktif</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <a href="/owner/profil_toko" class="group bg-white rounded-2xl shadow-sm p-8 hover:bg-pink-600 transition-all text-center">
            <div class="w-16 h-16 bg-pink-100 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-4 mx-auto transition-colors">
                <i class="bi bi-shop text-pink-600 group-hover:text-white text-3xl"></i>
            </div>
            <h5 class="text-lg font-bold text-gray-800 group-hover:text-white mb-1">Profil Toko</h5>
            <p class="text-gray-500 group-hover:text-pink-100 text-sm">Update informasi & branding</p>
        </a>

        <a href="/owner/karyawan_list" class="group bg-white rounded-2xl shadow-sm p-8 hover:bg-pink-700 transition-all text-center">
            <div class="w-16 h-16 bg-blue-100 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-4 mx-auto transition-colors">
                <i class="bi bi-people text-blue-600 group-hover:text-white text-3xl"></i>
            </div>
            <h5 class="text-lg font-bold text-gray-800 group-hover:text-white mb-1">Daftar Karyawan</h5>
            <p class="text-gray-500 group-hover:text-pink-100 text-sm">Kelola akses & data staf</p>
        </a>

        <a href="/owner/laporan_penjualan" class="group bg-white rounded-2xl shadow-sm p-8 hover:bg-pink-800 transition-all text-center">
            <div class="w-16 h-16 bg-green-100 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-4 mx-auto transition-colors">
                <i class="bi bi-file-earmark-bar-graph text-green-600 group-hover:text-white text-3xl"></i>
            </div>
            <h5 class="text-lg font-bold text-gray-800 group-hover:text-white mb-1">Laporan Penjualan</h5>
            <p class="text-gray-500 group-hover:text-pink-100 text-sm">Analisis performa bisnis</p>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8">
        <div class="flex items-center justify-between mb-8">
            <h5 class="text-xl font-bold text-gray-800 flex items-center">
                <i class="bi bi-clock-history mr-3 text-pink-600"></i>
                Aktivitas Terbaru
            </h5>
            <button class="text-sm font-semibold text-pink-600 hover:text-pink-800">Lihat Semua</button>
        </div>

        <div class="space-y-4">
            <?php $__empty_1 = true; $__currentLoopData = $activities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-start p-4 rounded-xl hover:bg-pink-50 transition-colors border border-transparent hover:border-pink-100">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0
                    <?php if($activity->icon_color == 'success'): ?> bg-green-100 text-green-600
                    <?php elseif($activity->icon_color == 'info'): ?> bg-blue-100 text-blue-600
                    <?php else: ?> bg-pink-100 text-pink-600
                    <?php endif; ?>">
                    <i class="<?php echo e($activity->icon); ?> text-lg"></i>
                </div>
                <div class="flex-1">
                    <p class="text-gray-900 font-bold text-sm"><?php echo e($activity->description); ?></p>
                    <small class="text-gray-500 text-xs"><?php echo e($activity->time_ago); ?></small>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-gray-400">
                <i class="bi bi-inbox text-5xl mb-4 block opacity-20"></i>
                <p>Belum ada aktivitas terbaru</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/owner/index.blade.php ENDPATH**/ ?>