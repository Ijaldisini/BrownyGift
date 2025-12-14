<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - BrownyGift</title>

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
            <a href="<?php echo e(route('admin.profile.index')); ?>" class="flex items-center px-6 py-3 bg-pink-50 text-primary font-medium border-l-4 border-primary">
                <i class="bi bi-person text-lg mr-3"></i>
                <span>Profil</span>
            </a>
            <a href="<?php echo e(route('admin.produk.index')); ?>" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
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
        <!-- Profile Header Card -->
        <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
            <div class="mb-6">
                <h4 class="text-2xl font-semibold text-gray-900 mb-2">Profil Saya</h4>
                <p class="text-gray-500">Kelola informasi profil Anda</p>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r">
                <div class="flex items-center justify-between">
                    <p class="text-green-700"><?php echo e(session('success')); ?></p>
                    <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.parentElement.remove()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <?php endif; ?>

            <!-- Profile Avatar Section -->
            <div class="text-center">
                <div class="inline-block relative">
                    <img src="<?php echo e(asset('images/admin-avatar.jpg')); ?>"
                         alt="Admin Photo"
                         class="w-32 h-32 rounded-full object-cover border-4 border-pink-100"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->nama ?? 'Admin BrownyGift')); ?>&size=128&background=ff69b4&color=fff'">
                </div>
                <div class="mt-4">
                    <h5 class="text-lg font-semibold text-gray-900 mb-1"><?php echo e($user->nama ?? 'Admin BrownyGift'); ?></h5>
                    <p class="text-gray-600 mb-2"><?php echo e($user->email ?? 'admin@brownygift.com'); ?></p>
                    <span class="inline-block bg-pink-100 text-primary px-4 py-1.5 rounded-full text-xs font-medium">Admin</span>
                </div>
            </div>
        </div>

        <!-- Information Profile Section -->
        <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
            <div class="flex items-center text-primary font-semibold mb-6">
                <i class="bi bi-person-circle text-lg mr-2"></i>
                <span class="text-sm uppercase tracking-wider">Informasi Profil</span>
            </div>

            <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text"
                               class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="nama_lengkap"
                               value="<?php echo e(old('nama_lengkap', $user->nama ?? 'Admin BrownyGift')); ?>"
                               required>
                        <?php $__errorArgs = ['nama_lengkap'];
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

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email"
                               class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="email"
                               value="<?php echo e(old('email', $user->email ?? 'admin@brownygift.com')); ?>"
                               required>
                        <?php $__errorArgs = ['email'];
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

                <!-- No Handphone -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">No. Handphone</label>
                    <input type="text"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['no_handphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="no_handphone"
                           value="<?php echo e(old('no_handphone', $user->no_hp ?? '082345678910')); ?>"
                           required>
                    <?php $__errorArgs = ['no_handphone'];
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

                <div class="flex justify-end">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <div class="flex items-center text-primary font-semibold mb-6">
                <i class="bi bi-lock text-lg mr-2"></i>
                <span class="text-sm uppercase tracking-wider">Ganti Password</span>
            </div>

            <form action="<?php echo e(route('admin.profile.password')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Password Lama -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
                    <input type="password"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['password_lama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="password_lama"
                           required>
                    <?php $__errorArgs = ['password_lama'];
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

                <!-- Password Baru -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                    <input type="password"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['password_baru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="password_baru"
                           required>
                    <?php $__errorArgs = ['password_baru'];
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

                <!-- Konfirmasi Password Baru -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                    <input type="password"
                           class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all <?php $__errorArgs = ['password_baru_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="password_baru_confirmation"
                           required>
                    <?php $__errorArgs = ['password_baru_confirmation'];
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

                <div class="flex justify-end">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow">
                        Ganti Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>