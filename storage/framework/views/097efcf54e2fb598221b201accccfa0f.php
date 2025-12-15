<aside class="w-64 bg-white shadow-2xl fixed h-screen z-50 border-r-2 border-pink-100 overflow-y-auto">
    <!-- Header -->
    <div class="p-6 text-center border-b-2 border-pink-100 bg-gradient-to-r from-pink-50 to-rose-50">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
            BrownyGift
        </h2>
        <p class="text-sm text-gray-600 font-medium mt-1">Admin Panel</p>
        <span class="inline-block mt-3 px-4 py-1.5 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs font-bold rounded-full shadow-sm">
            ADMIN
        </span>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 flex flex-col">
        <?php
        $activeClass = 'bg-gradient-to-r from-pink-50 to-rose-50 text-pink-600 font-bold border-l-4 border-pink-500';
        $defaultClass = 'px-6 py-4 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition-all duration-300 border-l-4 border-transparent flex items-center';
        ?>

        <a href="<?php echo e(route('admin.dashboard.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.dashboard.index') ? $activeClass : ''); ?>">
            <i class="bi bi-speedometer2 text-lg mr-3"></i>
            Dashboard
        </a>

        <a href="<?php echo e(route('admin.profile.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.profile.*') ? $activeClass : ''); ?>">
            <i class="bi bi-person-circle text-lg mr-3"></i>
            Profil
        </a>

        <a href="<?php echo e(route('admin.produk.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.produk.*') ? $activeClass : ''); ?>">
            <i class="bi bi-box-seam text-lg mr-3"></i>
            Produk
        </a>

        <a href="<?php echo e(route('admin.pesanan.index')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.pesanan.*') ? $activeClass : ''); ?>">
            <i class="bi bi-receipt text-lg mr-3"></i>
            Pesanan
        </a>

        <a href="<?php echo e(route('admin.laporan.laporan')); ?>"
            class="<?php echo e($defaultClass); ?> <?php echo e(request()->routeIs('admin.laporan.*') ? $activeClass : ''); ?>">
            <i class="bi bi-graph-up-arrow text-lg mr-3"></i>
            Laporan
        </a>

        <!-- Divider -->
        <div class="my-6 border-t-2 border-pink-100"></div>

        <!-- Logout -->
        <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin ingin keluar dari admin panel?')"
            class="px-6 py-4 text-pink-600 hover:text-pink-700 hover:bg-pink-50 transition-all duration-300 flex items-center font-bold">
            <i class="bi bi-box-arrow-left text-lg mr-3"></i>
            Keluar
        </a>
    </nav>
</aside>

<style>
/* Custom Scrollbar */
aside::-webkit-scrollbar {
    width: 6px;
}

aside::-webkit-scrollbar-track {
    background: #fff0f5;
}

aside::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #ec4899, #f43f5e);
    border-radius: 3px;
}

aside::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #db2777, #e11d48);
}
</style>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/components/sidebar-admin.blade.php ENDPATH**/ ?>