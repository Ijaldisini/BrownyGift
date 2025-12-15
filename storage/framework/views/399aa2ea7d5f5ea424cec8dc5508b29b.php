<?php $__env->startSection('title', 'Laporan Penjualan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

    <h2 class="text-3xl font-bold text-pink-800 mb-6 text-center">
        Laporan Penjualan
    </h2>

    <p class="text-center text-gray-500 mb-4 italic">
        Data penjualan bulan <strong><?php echo e($namaBulan); ?> <?php echo e($tahunDipilih); ?></strong>
    </p>

    <form method="GET" class="flex flex-wrap justify-center gap-4 mb-6">
        <select name="bulan"
            class="px-4 py-2 rounded-xl border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($bulan); ?>" <?php echo e($bulan == $bulanDipilih ? 'selected' : ''); ?>>
                    <?php echo e(\Carbon\Carbon::create()->month($bulan)->translatedFormat('F')); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="tahun"
            class="px-4 py-2 rounded-xl border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            <?php for($tahun = now()->year; $tahun >= now()->year - 5; $tahun--): ?>
                <option value="<?php echo e($tahun); ?>" <?php echo e($tahun == $tahunDipilih ? 'selected' : ''); ?>>
                    <?php echo e($tahun); ?>

                </option>
            <?php endfor; ?>
        </select>

        <button type="submit"
            class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-xl font-semibold transition">
            Tampilkan
        </button>
    </form>

    <div class="bg-white rounded-3xl shadow-xl p-6">
        <canvas id="chartPenjualan"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('chartPenjualan'), {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Jumlah Produk Terjual',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: '#d81b60',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/owner/laporan_penjualan.blade.php ENDPATH**/ ?>