<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto animate-fadeIn">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">
        <!-- Header with Gradient -->
        <div class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-600 p-8">
            <div class="flex items-center justify-between">
                <div class="text-white">
                    <h2 class="text-3xl font-bold mb-2 flex items-center">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4">
                            <i class="bi bi-plus-circle text-white text-2xl"></i>
                        </div>
                        Tambah Produk Baru
                    </h2>
                    <p class="text-pink-100">Lengkapi form untuk menambahkan produk</p>
                </div>
                <a href="<?php echo e(route('admin.produk.index')); ?>"
                   class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 border border-white/20">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="<?php echo e(route('admin.produk.store')); ?>" method="POST" enctype="multipart/form-data" class="p-8">
            <?php echo csrf_field(); ?>

            <!-- Nama Produk -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-flower1 text-white text-xs"></i>
                    </div>
                    Nama Produk <span class="text-pink-500 ml-1">*</span>
                </label>
                <input type="text"
                       class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                       name="nama_produk"
                       value="<?php echo e(old('nama_produk')); ?>"
                       placeholder="Contoh: Buket Mawar Pink Premium"
                       required>
                <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="bi bi-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Gambar Produk -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-image text-white text-xs"></i>
                    </div>
                    Gambar Produk <span class="text-pink-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <input type="file"
                           class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gradient-to-r file:from-pink-500 file:to-rose-500 file:text-white file:font-medium file:cursor-pointer hover:file:from-pink-600 hover:file:to-rose-600"
                           name="gambar_produk"
                           accept="image/*"
                           id="imageInput"
                           required>
                    <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="bi bi-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden mt-6">
                    <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-6 border-2 border-pink-200">
                        <p class="text-sm font-bold text-gray-700 mb-4 flex items-center">
                            <i class="bi bi-eye text-pink-500 mr-2"></i>
                            Preview Gambar
                        </p>
                        <div class="flex justify-center">
                            <div class="w-48 h-48 border-2 border-dashed border-pink-300 rounded-2xl flex items-center justify-center overflow-hidden bg-white">
                                <div class="text-center text-gray-400">
                                    <i class="bi bi-image text-4xl"></i>
                                    <p class="text-xs mt-2">Preview gambar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-purple-500 to-fuchsia-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-tag text-white text-xs"></i>
                    </div>
                    Kategori <span class="text-pink-500 ml-1">*</span>
                </label>
                <select class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300 bg-white"
                        name="id_kategori"
                        required>
                    <option value="">Pilih Kategori</option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k->id_kategori); ?>" <?php echo e(old('id_kategori') == $k->id_kategori ? 'selected' : ''); ?>>
                            <?php echo e($k->nama_kategori); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="bi bi-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Deskripsi -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-card-text text-white text-xs"></i>
                    </div>
                    Deskripsi Produk <span class="text-pink-500 ml-1">*</span>
                </label>
                <textarea class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                          name="deskripsi_produk"
                          rows="5"
                          placeholder="Jelaskan detail produk, bahan, ukuran, dan keunikannya..."
                          required><?php echo e(old('deskripsi_produk')); ?></textarea>
                <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="bi bi-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <!-- Harga -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg flex items-center justify-center mr-2">
                            <i class="bi bi-cash text-white text-xs"></i>
                        </div>
                        Harga (Rp) <span class="text-pink-500 ml-1">*</span>
                    </label>
                    <input type="number"
                           class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                           name="harga_produk"
                           value="<?php echo e(old('harga_produk')); ?>"
                           placeholder="250000"
                           min="0"
                           required>
                    <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="bi bi-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-2">
                            <i class="bi bi-box text-white text-xs"></i>
                        </div>
                        Stok <span class="text-pink-500 ml-1">*</span>
                    </label>
                    <input type="number"
                           class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                           name="stok_produk"
                           value="<?php echo e(old('stok_produk')); ?>"
                           placeholder="15"
                           min="0"
                           required>
                    <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="bi bi-exclamation-circle mr-1"></i>
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-6 border-t-2 border-pink-100">
                <button type="submit" class="flex-1 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white px-8 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center space-x-2 hover:-translate-y-0.5">
                    <i class="bi bi-check-circle text-xl"></i>
                    <span>Simpan Produk</span>
                </button>
                <a href="<?php echo e(route('admin.produk.index')); ?>" class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 px-8 py-4 rounded-xl font-bold transition-all duration-300 inline-flex items-center justify-center space-x-2 border-2 border-gray-300">
                    <i class="bi bi-x-circle"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Image Preview
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            preview.classList.remove('hidden');
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-6 border-2 border-pink-200">
                        <p class="text-sm font-bold text-gray-700 mb-4 flex items-center">
                            <i class="bi bi-eye text-pink-500 mr-2"></i>
                            Preview Gambar
                        </p>
                        <div class="flex justify-center">
                            <img src="${e.target.result}" alt="Preview" class="w-64 h-64 object-cover rounded-2xl border-4 border-white shadow-xl">
                        </div>
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/admin/produk/create.blade.php ENDPATH**/ ?>