<?php $__env->startSection('title', 'Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-sm p-8">
    <!-- Success/Error Messages -->
    <?php if(session('success')): ?>
    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r" role="alert">
        <div class="flex items-center justify-between">
            <p class="text-green-700"><?php echo e(session('success')); ?></p>
            <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r" role="alert">
        <div class="flex items-center justify-between">
            <p class="text-red-700"><?php echo e(session('error')); ?></p>
            <button type="button" class="text-red-700 hover:text-red-900" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h4 class="text-gray-900 font-semibold text-2xl mb-2">Kelola Produk</h4>
            <p class="text-gray-500">Daftar semua produk buket bunga</p>
        </div>
        <a href="<?php echo e(route('admin.produk.create')); ?>" class="bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-md font-medium transition-all inline-flex items-center shadow-sm hover:shadow-md">
            <i class="bi bi-plus-circle mr-2"></i>
            Tambah Produk
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-pink-200">
        <table class="w-full">
            <thead class="bg-pink-50">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Gambar</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kategori</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Harga</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Stok</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-pink-100">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-pink-50 transition-colors">
                    <td class="px-4 py-4">
                        <img src="<?php echo e(asset('images/' . $product->gambar_produk)); ?>"
                             alt="<?php echo e($product->nama_produk); ?>"
                             class="w-12 h-12 object-cover rounded-lg border-2 border-pink-200"
                             onerror="this.src='https://via.placeholder.com/50/ff69b4/ffffff'">
                    </td>
                    <td class="px-4 py-4 text-gray-900 font-medium"><?php echo e($product->nama_produk); ?></td>
                    <td class="px-4 py-4">
                        <span class="bg-pink-100 text-primary px-3 py-1.5 rounded-full text-xs font-medium">
                            <?php echo e($product->kategori->nama_kategori ?? 'N/A'); ?>

                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <span class="block max-w-xs truncate text-gray-600 text-sm" title="<?php echo e($product->deskripsi_produk); ?>">
                            <?php echo e($product->deskripsi_produk ?? '-'); ?>

                        </span>
                    </td>
                    <td class="px-4 py-4 text-gray-900 font-medium">Rp <?php echo e(number_format($product->harga_produk, 0, ',', '.')); ?></td>
                    <td class="px-4 py-4 text-gray-900"><?php echo e($product->stok_produk); ?></td>
                    <td class="px-4 py-4">
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('admin.produk.edit', $product->id_produk)); ?>"
                               class="bg-primary-light hover:bg-primary text-white px-3 py-1.5 rounded-md text-sm transition-all inline-flex items-center shadow-sm hover:shadow"
                               title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button type="button"
                                    class="bg-primary hover:bg-primary-dark text-white px-3 py-1.5 rounded-md text-sm transition-all inline-flex items-center shadow-sm hover:shadow"
                                    onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.remove('hidden')"
                                    title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>

                        <!-- Delete Modal -->
                        <div id="deleteModal<?php echo e($product->id_produk); ?>" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                            <div class="relative top-20 mx-auto p-5 border border-pink-200 w-96 shadow-xl rounded-xl bg-white">
                                <div class="flex justify-between items-center pb-3 border-b border-pink-100">
                                    <h5 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h5>
                                    <button type="button"
                                            class="text-gray-400 hover:text-gray-600 transition-colors"
                                            onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.add('hidden')">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                                <div class="py-4">
                                    <p class="text-gray-600 mb-2">Yakin ingin menghapus produk ini?</p>
                                    <strong class="text-gray-900"><?php echo e($product->nama_produk); ?></strong>
                                </div>
                                <div class="flex justify-end gap-2 pt-3 border-t border-pink-100">
                                    <button type="button"
                                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md transition-colors font-medium"
                                            onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.add('hidden')">
                                        Batal
                                    </button>
                                    <form action="<?php echo e(route('admin.produk.delete', $product->id_produk)); ?>"
                                          method="POST"
                                          class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md transition-all shadow-sm hover:shadow font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                        Belum ada produk. <a href="<?php echo e(route('admin.produk.create')); ?>" class="text-primary hover:text-primary-dark hover:underline font-medium">Tambah produk pertama</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if(isset($products) && $products->hasPages()): ?>
    <div class="flex justify-center mt-6">
        <?php echo e($products->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/admin/produk/index.blade.php ENDPATH**/ ?>