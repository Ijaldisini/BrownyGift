<?php $__env->startSection('title', 'Edit Profil Toko'); ?>

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Edit Profil Toko
</h2>

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl p-10">

    <form action="/owner/profil_toko_edit" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-semibold mb-1">Nama Toko</label>
            <input type="text" name="nama_toko"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   value="<?php echo e($toko->nama_toko); ?>" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                      required><?php echo e($toko->deskripsi); ?></textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tentang Kami</label>
            <textarea name="tentang_kami" rows="5"
                      class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                      required><?php echo e($toko->tentang_kami); ?></textarea>
        </div>

        <div class="text-center pt-4">
            <button class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-8 py-3 rounded-xl transition">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/profil_toko_edit.blade.php ENDPATH**/ ?>