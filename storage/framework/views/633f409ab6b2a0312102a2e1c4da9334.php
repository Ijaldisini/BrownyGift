<?php $__env->startSection('title', 'Tambah Karyawan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Tambah Akun Karyawan
</h2>

<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8">

    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="/owner/karyawan" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-semibold mb-1">Nama Karyawan</label>
            <input type="text" name="nama"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Email Karyawan</label>
            <input type="email" name="email"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Nomor HP</label>
            <input type="text" name="no_hp"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Password Akun</label>
            <input type="password" name="password"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   minlength="6" required>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="/owner/karyawan_list"
               class="text-gray-500 hover:text-pink-600 transition">
                ← Kembali
            </a>

            <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl transition">
                Buat Akun
            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/owner/karyawan.blade.php ENDPATH**/ ?>