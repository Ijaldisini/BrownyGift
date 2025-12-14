<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?> - BrownyGift</title>

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
                    }
                }
            }
        }
    </script>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-pink-50 font-sans">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-screen w-64 bg-white shadow-sm z-50">
        <!-- Sidebar Header -->
        <div class="p-6 border-b border-pink-200">
            <h5 class="text-primary font-semibold text-xl mb-1">BrownyGift</h5>
            <small class="text-gray-500 text-sm">Admin</small>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="py-4">
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-pink-50 text-primary font-medium border-primary' : ''); ?>">
                <i class="bi bi-speedometer2 text-lg mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?php echo e(route('admin.profile.index')); ?>"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary <?php echo e(request()->routeIs('admin.profile.*') ? 'bg-pink-50 text-primary font-medium border-primary' : ''); ?>">
                <i class="bi bi-person text-lg mr-3"></i>
                <span>Profil</span>
            </a>
            <a href="<?php echo e(route('admin.produk.index')); ?>"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary <?php echo e(request()->routeIs('admin.produk.*') ? 'bg-pink-50 text-primary font-medium border-primary' : ''); ?>">
                <i class="bi bi-box-seam text-lg mr-3"></i>
                <span>Produk</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-receipt text-lg mr-3"></i>
                <span>Pesanan</span>
            </a>
            <a href="#"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-50 hover:text-primary transition-all border-l-4 border-transparent hover:border-primary">
                <i class="bi bi-file-earmark-text text-lg mr-3"></i>
                <span>Laporan</span>
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-pink-200">
            <a href="<?php echo e(route('logout')); ?>"
               class="text-primary hover:text-primary-dark flex items-center font-medium"
               onclick="return confirm('Yakin ingin keluar?')">
                <i class="bi bi-box-arrow-left mr-2"></i>
                <span>Keluar</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8 min-h-screen">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/layouts/admin.blade.php ENDPATH**/ ?>