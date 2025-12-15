<?php $__env->startSection('title', 'Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="animate-fadeIn">
    <!-- Success/Error Messages -->
    <?php if(session('success')): ?>
    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-l-4 border-emerald-500 p-5 mb-8 rounded-r-2xl shadow-lg animate-slideDown" role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-check-lg text-white text-xl"></i>
                </div>
                <p class="text-emerald-800 font-medium"><?php echo e(session('success')); ?></p>
            </div>
            <button type="button" class="text-emerald-700 hover:text-emerald-900 hover:bg-emerald-100 rounded-lg p-2 transition-colors" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 mb-8 rounded-r-2xl shadow-lg animate-slideDown" role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-exclamation-triangle text-white text-xl"></i>
                </div>
                <p class="text-red-800 font-medium"><?php echo e(session('error')); ?></p>
            </div>
            <button type="button" class="text-red-700 hover:text-red-900 hover:bg-red-100 rounded-lg p-2 transition-colors" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">
        <!-- Header -->
        <div class="bg-gradient-to-r from-pink-50 via-rose-50 to-pink-50 p-8 border-b border-pink-100">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent mb-2 flex items-center">
                        <i class="bi bi-box-seam mr-3"></i>
                        Kelola Produk
                    </h2>
                    <p class="text-gray-600">Daftar semua produk buket bunga</p>
                </div>
                <a href="<?php echo e(route('admin.produk.create')); ?>"
                   class="bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white px-6 py-3 rounded-xl font-bold transition-all duration-300 inline-flex items-center space-x-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                    <i class="bi bi-plus-circle text-xl"></i>
                    <span>Tambah Produk</span>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="p-8">
            <div class="overflow-x-auto rounded-2xl border border-pink-200 shadow-sm">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-100 to-rose-100">
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-4 text-left text-xxs font-bold text-gray-700 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-pink-100">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 transition-all duration-200">
                            <td class="px-6 py-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-rose-100 rounded-xl overflow-hidden border-2 border-pink-200 shadow-sm">
                                    <img src="<?php echo e(asset('images/' . $product->gambar_produk)); ?>"
                                         alt="<?php echo e($product->nama_produk); ?>"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='https://via.placeholder.com/64/ff69b4/ffffff'">
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                                    <span class="text-gray-900 font-bold"><?php echo e($product->nama_produk); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gradient-to-r from-pink-100 to-rose-100 text-pink-700 px-4 py-2 rounded-xl text-xs font-bold border border-pink-200 inline-flex items-center">
                                    <i class="bi bi-tag-fill mr-1"></i>
                                    <?php echo e($product->kategori->nama_kategori ?? 'N/A'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block max-w-xs truncate text-gray-600" title="<?php echo e($product->deskripsi_produk); ?>">
                                    <?php echo e($product->deskripsi_produk ?? '-'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-lg bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                                    Rp <?php echo e(number_format($product->harga_produk, 0, ',', '.')); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-box text-blue-600 text-sm"></i>
                                    </div>
                                    <span class="font-bold text-gray-900"><?php echo e($product->stok_produk); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('admin.produk.edit', $product->id_produk)); ?>"
                                       class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-4 py-2 rounded-xl transition-all duration-300 inline-flex items-center shadow-sm hover:shadow-lg hover:-translate-y-0.5"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <button type="button"
                                            class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-4 py-2 rounded-xl transition-all duration-300 inline-flex items-center shadow-sm hover:shadow-lg hover:-translate-y-0.5"
                                            onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.remove('hidden')"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- Delete Modal -->
                                <div id="deleteModal<?php echo e($product->id_produk); ?>" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
                                    <div class="relative p-8 border border-pink-200 w-full max-w-md shadow-2xl rounded-2xl bg-white mx-4 animate-slideDown">
                                        <div class="flex justify-between items-center pb-4 border-b border-pink-100">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center">
                                                    <i class="bi bi-exclamation-triangle text-white text-xl"></i>
                                                </div>
                                                <h5 class="text-xl font-bold text-gray-900">Konfirmasi Hapus</h5>
                                            </div>
                                            <button type="button"
                                                    class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg p-2 transition-colors"
                                                    onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.add('hidden')">
                                                <i class="bi bi-x-lg text-xl"></i>
                                            </button>
                                        </div>
                                        <div class="py-6">
                                            <p class="text-gray-600 mb-3">Yakin ingin menghapus produk ini?</p>
                                            <div class="bg-gradient-to-r from-pink-50 to-rose-50 p-4 rounded-xl border border-pink-200">
                                                <strong class="text-gray-900 font-bold"><?php echo e($product->nama_produk); ?></strong>
                                            </div>
                                        </div>
                                        <div class="flex gap-3 pt-4 border-t border-pink-100">
                                            <button type="button"
                                                    class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 px-6 py-3 rounded-xl transition-all duration-300 font-bold border-2 border-gray-300"
                                                    onclick="document.getElementById('deleteModal<?php echo e($product->id_produk); ?>').classList.add('hidden')">
                                                Batal
                                            </button>
                                            <form action="<?php echo e(route('admin.produk.delete', $product->id_produk)); ?>"
                                                  method="POST"
                                                  class="flex-1">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl font-bold">
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
                            <td colspan="7" class="text-center py-16">
                                <div class="flex flex-col items-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-pink-100 to-rose-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="bi bi-inbox text-pink-400 text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg mb-2">Belum ada produk</p>
                                    <a href="<?php echo e(route('admin.produk.create')); ?>" class="text-pink-600 hover:text-pink-700 font-bold hover:underline inline-flex items-center">
                                        <i class="bi bi-plus-circle mr-1"></i>
                                        Tambah produk pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if(isset($products) && $products->hasPages()): ?>
            <div class="flex justify-center mt-8">
                <div class="bg-white rounded-xl shadow-sm border border-pink-200 p-2">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

.animate-slideDown {
    animation: slideDown 0.4s ease-out;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/admin/produk/index.blade.php ENDPATH**/ ?>