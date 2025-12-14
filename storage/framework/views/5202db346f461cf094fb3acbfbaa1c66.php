<?php $__env->startSection('title', 'Edit Karyawan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Edit Akun Karyawan
</h2>

<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8">

    <form action="/owner/karyawan_edit/<?php echo e($karyawan->id_user); ?>"
          method="POST"
          class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-semibold mb-1">Nama Karyawan</label>
            <input type="text" name="nama"
                   value="<?php echo e($karyawan->nama); ?>"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Email Karyawan</label>
            <input type="email" name="email"
                   value="<?php echo e($karyawan->email); ?>"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Nomor HP</label>
            <input type="text" name="no_hp"
                   value="<?php echo e($karyawan->no_hp); ?>"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">
                Password Baru <span class="text-sm text-gray-400">(opsional)</span>
            </label>
            <input type="password" name="password"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   placeholder="Kosongkan jika tidak diganti">
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="/owner/karyawan_list"
               class="text-gray-500 hover:text-pink-600 transition">
                ← Kembali
            </a>

            <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl transition">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/owner/karyawan_edit.blade.php ENDPATH**/ ?>