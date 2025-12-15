<?php $__env->startSection('title', 'Laporan Penjualan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

<h2 class="text-3xl font-bold text-pink-800 mb-6 text-center">
    Laporan Penjualan
</h2>

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
        options: { responsive: true }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/owner/laporan_penjualan.blade.php ENDPATH**/ ?>