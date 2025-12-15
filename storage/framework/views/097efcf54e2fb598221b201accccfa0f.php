<aside class="w-64 bg-white shadow-xl fixed h-screen z-50">
    <div class="p-6 text-center border-b border-pink-100">
        <h2 class="text-2xl font-bold text-primary">BrownyGift</h2>
        <p class="text-sm text-gray-500">Admin Panel</p>
        <span class="inline-block mt-3 px-3 py-1 bg-primary text-white text-xs font-bold rounded-full">
            ADMIN
        </span>
    </div>

    <nav class="mt-6 flex flex-col">
        <?php
        // Helper function menggunakan skema warna Admin (Pink/White)
        $activeClass = 'bg-pink-50 text-primary font-semibold border-l-4 border-primary';
        $defaultClass = 'px-6 py-4 text-gray-700 hover:bg-pink-50 hover:text-primary transition border-l-4 border-transparent flex items-center';
        ?>

        <a href="<?php echo e(route('admin.dashboard.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.dashboard.index') ? $activeClass : ''); ?>">
            <i class="bi bi-speedometer2 text-lg mr-3"></i>
            Dashboard
        </a>

        <a href="<?php echo e(route('admin.profile.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.profile.*') ? $activeClass : ''); ?>">
            <i class="bi bi-person text-lg mr-3"></i>
            Profil
        </a>

        <a href="<?php echo e(route('admin.produk.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.produk.*') ? $activeClass : ''); ?>">
            <i class="bi bi-box-seam text-lg mr-3"></i>
            Produk
        </a>

        <a href="<?php echo e(route('admin.pesanan.index')); ?>" class="<?php echo e($defaultClass); ?>">
            <i class="bi bi-receipt text-lg mr-3"></i>
            Pesanan
        </a>

        <a href="<?php echo e(route('admin.laporan.laporan')); ?>" class="<?php echo e($defaultClass); ?>">
            <i class="bi bi-file-earmark-text text-lg mr-3"></i>
            Laporan
        </a>

        <div class="my-6 border-t border-pink-100"></div>

        <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin logout?')"
            class="px-6 py-4 text-primary hover:text-primary-dark hover:bg-pink-50 transition flex items-center font-medium">
            <i class="bi bi-box-arrow-left text-lg mr-3"></i>
            Keluar
        </a>
    </nav>
</aside>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/components/sidebar-admin.blade.php ENDPATH**/ ?>