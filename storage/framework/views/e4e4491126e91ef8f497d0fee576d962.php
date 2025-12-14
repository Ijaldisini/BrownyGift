<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Owner Panel'); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="bg-gradient-to-br from-pink-50 to-pink-200 min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-gradient-to-b from-pink-600 to-pink-800 text-white shadow-xl">
            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold">BrownyGift</h2>
                <p class="text-sm opacity-90">Owner Panel</p>
                <span class="inline-block mt-3 px-3 py-1 bg-yellow-400 text-pink-900 text-xs font-bold rounded-full">
                    OWNER
                </span>
            </div>

            <nav class="mt-6 flex flex-col">
                <a href="/owner" class="px-6 py-4 hover:bg-white/10 transition">
                    Dashboard
                </a>

                <a href="/owner/profil_toko" class="px-6 py-4 hover:bg-white/10 transition">
                    Profil Toko
                </a>

                <a href="/owner/karyawan" class="px-6 py-4 hover:bg-white/10 transition">
                    Tambah Karyawan
                </a>

                <a href="/owner/karyawan_list" class="px-6 py-4 hover:bg-white/10 transition">
                    Daftar Karyawan
                </a>

                <a href="/owner/laporan_penjualan" class="px-6 py-4 hover:bg-white/10 transition">
                    Laporan Penjualan
                </a>

                <a href="/owner/profil_saya" class="px-6 py-4 hover:bg-white/10 transition">
                    Profil Saya
                </a>

                <div class="my-6 border-t border-white/30"></div>

                <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Keluar dari Owner Panel?')"
                    class="px-6 py-4 text-white/70 hover:text-white hover:bg-white/10 transition">
                    Logout
                </a>
            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-10">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/layouts/owner.blade.php ENDPATH**/ ?>