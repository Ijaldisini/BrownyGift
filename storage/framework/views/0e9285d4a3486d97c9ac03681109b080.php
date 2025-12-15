<?php $__env->startSection('title', 'Profil Saya'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Profil Saya
</h2>

<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8 space-y-6">

    <div>
        <p class="text-2xl font-bold text-gray-800">Nama</p>
        <p class="text-gray-700 mt-3 leading-relaxed"><?php echo e($user->nama); ?></p>
    </div>

    <div>
        <p class="text-2xl font-bold text-gray-800">Email</p>
        <p class="text-gray-700 mt-3 leading-relaxed"><?php echo e($user->email); ?></p>
    </div>

    <div>
        <p class="text-2xl font-bold text-gray-800">Nomor HP</p>
        <p class="text-gray-700 mt-3 leading-relaxed"><?php echo e($user->no_hp); ?></p>
    </div>

    <div class="text-right pt-6">
        <a href="/owner/profil_saya_edit"
           class="inline-block bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-3 rounded-xl transition">
            Edit Profil
        </a>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/owner/profil_saya.blade.php ENDPATH**/ ?>