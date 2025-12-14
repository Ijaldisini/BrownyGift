<?php $__env->startSection('title', 'Profil Toko'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Profil Toko
</h2>

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl p-10">

    <h3 class="text-2xl font-bold text-gray-800">
        <?php echo e($toko->nama_toko); ?>

    </h3>

    <p class="text-gray-600 mt-3">
        <?php echo e($toko->deskripsi); ?>

    </p>

    <h4 class="text-2xl font-bold text-gray-800 mt-8">
        Tentang Kami
    </h4>

    <p class="text-gray-700 mt-3 leading-relaxed">
        <?php echo nl2br(e($toko->tentang_kami)); ?>

    </p>

    <div class="text-right mt-8">
        <a href="/owner/profil_toko_edit"
            class="inline-block bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-3 rounded-xl transition">
            Edit Profil
        </a>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/owner/profil_toko.blade.php ENDPATH**/ ?>