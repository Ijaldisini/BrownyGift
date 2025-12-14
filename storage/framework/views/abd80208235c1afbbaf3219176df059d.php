<?php $__env->startSection('title', 'Daftar Karyawan'); ?>

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-6 text-center">
    Daftar Akun Karyawan
</h2>

<div class="bg-white rounded-3xl shadow-xl p-6">
    <table class="w-full text-center border">
        <thead class="bg-pink-600 text-white">
            <tr>
                <th class="p-3">ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo e($k->id_user); ?></td>
                    <td><?php echo e($k->nama); ?></td>
                    <td><?php echo e($k->email); ?></td>
                    <td><?php echo e($k->no_hp); ?></td>
                    <td class="space-x-2">
                        <a href="/owner/karyawan_edit/<?php echo e($k->id_user); ?>"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">
                            Edit
                        </a>
                        <a href="/owner/karyawan_delete/<?php echo e($k->id_user); ?>"
                           onclick="return confirm('Yakin hapus?')"
                           class="px-3 py-1 bg-red-600 text-white rounded">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="p-4 text-gray-500">Belum ada karyawan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/dashboard/owner/karyawan_list.blade.php ENDPATH**/ ?>