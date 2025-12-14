<?php $__env->startSection('title', 'Dashboard Owner'); ?>

<?php $__env->startSection('content'); ?>

<div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-gray-800">Selamat Datang, Owner!</h1>
    <p class="text-gray-600 mt-2">Kontrol penuh BrownyGift ada di tangan Anda</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <h3 class="text-2xl font-bold text-pink-600">1.248</h3>
        <p class="text-gray-500">Total Pesanan</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <h3 class="text-2xl font-bold text-pink-600">Rp 42,8jt</h3>
        <p class="text-gray-500">Pendapatan Bulan Ini</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <h3 class="text-2xl font-bold text-pink-600">127</h3>
        <p class="text-gray-500">Produk Aktif</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <h3 class="text-2xl font-bold text-pink-600">8</h3>
        <p class="text-gray-500">Karyawan Aktif</p>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/index.blade.php ENDPATH**/ ?>