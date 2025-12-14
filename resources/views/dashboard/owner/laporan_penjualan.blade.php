@extends('layouts.owner')

@section('title', 'Laporan Penjualan')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

@section('content')

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
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Produk Terjual',
                data: {!! json_encode($data) !!},
                backgroundColor: '#d81b60',
                borderRadius: 8
            }]
        },
        options: { responsive: true }
    });
</script>

@endsection
