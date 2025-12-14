<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - BrownyGift</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff69b4',
                        'primary-dark': '#ff1493',
                        'primary-light': '#ffb6c1',
                        'pink-50': '#fff0f5',
                        'pink-100': '#ffe4e8',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-pink-50 font-sans">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-screen w-64 bg-white shadow-sm z-50">
        <!-- Sidebar Header -->
        <div class="p-6 border-b border-pink-100">
            <h5 class="text-primary font-semibold text-xl mb-1">BrownyGift</h5>
            <small class="text-gray-500 text-sm">Admin</small>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="py-4">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-speedometer2 text-lg mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?php echo e(route('admin.profile.index')); ?>" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-person text-lg mr-3"></i>
                <span>Profil</span>
            </a>
            <a href="<?php echo e(route('admin.produk.index')); ?>" class="flex items-center px-6 py-3 bg-pink-50 text-primary font-medium border-l-4 border-primary">
                <i class="bi bi-box-seam text-lg mr-3"></i>
                <span>Produk</span>
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-receipt text-lg mr-3"></i>
                <span>Pesanan</span>
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-file-earmark-text text-lg mr-3"></i>
                <span>Laporan</span>
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-pink-100">
            <a href="<?php echo e(route('logout')); ?>" class="text-primary hover:text-primary-dark flex items-center font-medium">
                <i class="bi bi-box-arrow-left mr-2"></i>
                <span>Keluar</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8 min-h-screen">
        <div class="bg-white rounded-lg shadow-sm p-8 max-w-3xl">
            <!-- Back Button -->
            <a href="<?php echo e(route('admin.produk.index')); ?>" class="inline-flex items-center text-gray-500 hover:text-primary transition-colors mb-6">
                <i class="bi bi-arrow-left mr-2"></i>
                Kembali ke Daftar Produk
            </a>

            <!-- Form Title -->
            <h4 class="text-2xl font-semibold text-gray-900 mb-6">Edit Produk</h4>

            <!-- Form -->
            <form action="<?php echo e(route('admin.produk.update', $product->id_produk)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Nama Produk -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Produk <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="nama_produk"
                           value="<?php echo e(old('nama_produk', $product->nama_produk)); ?>"
                           placeholder="Contoh: Buket Mawar Pink Premium"
                           required>
                    <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Gambar Produk -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Produk</label>

                    <?php if($product->gambar_produk): ?>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
                        <img src="<?php echo e(asset('images/' . $product->gambar_produk)); ?>"
                             alt="<?php echo e($product->nama_produk); ?>"
                             class="w-40 h-40 object-cover rounded-lg border-2 border-pink-200"
                             onerror="this.src='https://via.placeholder.com/150/ff69b4/ffffff'">
                        <p class="text-xs text-gray-500 mt-2">Upload gambar baru untuk menggantinya</p>
                    </div>
                    <?php endif; ?>

                    <input type="file"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="gambar_produk"
                           accept="image/*"
                           id="imageInput">
                    <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- Image Preview for new upload -->
                    <div id="imagePreview" class="hidden mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru:</p>
                        <div class="w-40 h-40 border-2 border-dashed border-pink-200 rounded-lg flex items-center justify-center overflow-hidden">
                            <div class="text-center text-gray-400">
                                <i class="bi bi-image text-3xl"></i>
                                <p class="text-xs mt-2">Preview gambar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-primary">*</span>
                    </label>
                    <select class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="id_kategori"
                            required>
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k->id_kategori); ?>"
                                <?php echo e(old('id_kategori', $product->id_kategori) == $k->id_kategori ? 'selected' : ''); ?>>
                                <?php echo e($k->nama_kategori); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Produk <span class="text-primary">*</span>
                    </label>
                    <textarea class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="deskripsi_produk"
                              rows="4"
                              placeholder="Jelaskan detail produk..."
                              required><?php echo e(old('deskripsi_produk', $product->deskripsi_produk)); ?></textarea>
                    <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Harga & Stok -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Harga (Rp) <span class="text-primary">*</span>
                        </label>
                        <input type="number"
                               class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="harga_produk"
                               value="<?php echo e(old('harga_produk', $product->harga_produk)); ?>"
                               placeholder="250000"
                               min="0"
                               required>
                        <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Stok <span class="text-primary">*</span>
                        </label>
                        <input type="number"
                               class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="stok_produk"
                               value="<?php echo e(old('stok_produk', $product->stok_produk)); ?>"
                               placeholder="15"
                               min="0"
                               required>
                        <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 mt-8">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow inline-flex items-center">
                        <i class="bi bi-check-circle mr-2"></i>
                        Update Produk
                    </button>
                    <a href="<?php echo e(route('admin.produk.index')); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-2.5 rounded-lg font-medium transition-colors inline-flex items-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

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
                        <p class="text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru:</p>
                        <img src="${e.target.result}" alt="Preview" class="w-40 h-40 object-cover rounded-lg border-2 border-pink-200">
                    `;
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/admin/produk/edit.blade.php ENDPATH**/ ?>