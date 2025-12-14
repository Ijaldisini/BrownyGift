<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Belanja - BrownyGift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color: #ffc0cb;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 25%;
        }
        .sidebar a {
            color: white;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            font-size: 1.1rem;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #ff69b4;
        }
        .sidebar .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
        .main-content {
            margin-left: 25%;
            padding: 40px;
        }
        .page-header {
            margin-bottom: 10px;
        }
        .page-header h2 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .page-header p {
            color: #999;
            margin-bottom: 30px;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
        }
        .stat-card .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .stat-card .stat-value {
            color: #ff1493;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .stat-card .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-left: auto;
        }
        .stat-card-pink .stat-icon {
            background: linear-gradient(135deg, #ffc0cb, #ffb6c1);
            color: white;
        }
        .stat-card-yellow .stat-icon {
            background: linear-gradient(135deg, #fff3cd, #ffe4a1);
            color: #856404;
        }
        .stat-card-blue .stat-icon {
            background: linear-gradient(135deg, #cfe2ff, #b6d4fe);
            color: #084298;
        }
        .stat-card-green .stat-icon {
            background: linear-gradient(135deg, #d1e7dd, #badbcc);
            color: #0f5132;
        }

        /* Search and Filter */
        .search-filter-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .search-box {
            flex: 1;
            position: relative;
        }
        .search-box input {
            width: 100%;
            border: 2px solid #ffe4e1;
            border-radius: 25px;
            padding: 12px 20px 12px 45px;
            transition: 0.3s;
        }
        .search-box input:focus {
            border-color: #ff69b4;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
        }
        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #ff69b4;
        }


        /* History Table */
        .history-container {
            background: white;
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .history-table {
            width: 100%;
            margin: 0;
        }
        .history-table thead {
            background: linear-gradient(135deg, #ffc0cb, #ffb6c1);
        }
        .history-table thead th {
            color: white;
            font-weight: 600;
            padding: 20px 15px;
            border: none;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        .history-table tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #ffe4e1;
            color: #333;
        }
        .history-table tbody tr:last-child td {
            border-bottom: none;
        }
        .history-table tbody tr:hover {
            background-color: #fff0f5;
        }
        .order-id {
            font-weight: 600;
            color: #ff1493;
        }
        .product-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .product-name {
            font-weight: 600;
            color: #333;
        }
        .product-qty {
            color: #999;
            font-size: 0.85rem;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-processing {
            background-color: #cfe2ff;
            color: #084298;
        }
        .status-shipped {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        .status-completed {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        .btn-action {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            cursor: pointer;
        }
        .btn-detail {
            background: white;
            color: #ff69b4;
            border: 2px solid #ff69b4;
        }
        .btn-detail:hover {
            background: #ff69b4;
            color: white;
            transform: translateY(-2px);
        }
        .btn-upload {
            background: linear-gradient(135deg, #4caf50, #45a049);
            color: white;
            margin-left: 8px;
        }
        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        /* Empty State */
        .empty-history {
            text-align: center;
            padding: 80px 20px;
        }
        .empty-history-icon {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #ffc0cb, #ffe4e1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .empty-history-icon i {
            font-size: 4rem;
            color: #ff69b4;
        }
        .empty-history h4 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .empty-history p {
            color: #999;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .btn-shop {
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-shop:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.4);
            color: white;
        }

        /* Modal */
        .modal-content {
            border-radius: 20px;
            border: none;
        }
        .modal-header {
            background: linear-gradient(135deg, #ffc0cb, #ffb6c1);
            color: white;
            border-radius: 20px 20px 0 0;
            border: none;
        }
        .modal-title {
            font-weight: bold;
        }
        .btn-close {
            filter: brightness(0) invert(1);
        }
        .order-detail-item {
            padding: 15px;
            background: #fff0f5;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .order-detail-item strong {
            color: #ff1493;
        }

        @media (max-width: 992px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="text-center mb-5">
                <h4 class="text-white fw-bold">BrownyGift</h4>
                <p class="text-white">Halo, <?php echo e(auth()->user()->username); ?>!</p>
            </div>
            <a href="<?php echo e(route('dashboard.customer.index')); ?>"><i class="fas fa-home"></i> Dashboard</a>
            <a href="<?php echo e(route('dashboard.customer.profil')); ?>"><i class="fas fa-user"></i> Profil Saya</a>
            <a href="<?php echo e(route('dashboard.customer.produk')); ?>"><i class="fas fa-gift"></i> Produk</a>
            <a href="<?php echo e(route('dashboard.customer.keranjang')); ?>"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="<?php echo e(route('dashboard.customer.pesanan')); ?>"><i class="fas fa-truck"></i> Pesanan Saya</a>
            <a href="<?php echo e(route('dashboard.customer.riwayat')); ?>" class="active"><i class="fas fa-history"></i> Riwayat Belanja</a>

            <div class="logout">
                <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <div class="col-md-9 main-content">
            <div class="page-header">
                <h2>Riwayat Belanja</h2>
                <p>Kelola dan lacak pesanan Anda dengan mudah</p>
            </div>

            <div class="stats-container">
                <div class="stat-card stat-card-pink">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label">Total Pesanan</div>
                            <div class="stat-value" id="totalOrders">4</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-card-yellow">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label">Menunggu</div>
                            <div class="stat-value" id="pendingOrders">1</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-card-blue">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label">Diproses</div>
                            <div class="stat-value" id="processingOrders">1</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-card-green">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label">Selesai</div>
                            <div class="stat-value" id="completedOrders">1</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-filter-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari nomor pesanan, tanggal, atau total..." onkeyup="filterHistory()">
                </div>
            </div>

            <div class="history-container" id="historyContainer">
                <div class="table-responsive">
                    <table class="history-table">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="historyTableBody">
                            <tr data-status="pending">
                                <td class="order-id">BG-2024-001</td>
                                <td>10 Nov 2024</td>
                                <td>
                                    <div class="product-info">
                                        <span class="product-name">Buket Mawar Pink Premium x2</span>
                                        <span class="product-name">Buket Anniversary Mewah x1</span>
                                    </div>
                                </td>
                                <td><strong>Rp 850.000</strong></td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-001')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>

                            <tr data-status="processing">
                                <td class="order-id">BG-2024-002</td>
                                <td>12 Nov 2024</td>
                                <td>
                                    <div class="product-info">
                                        <span class="product-name">Buket Wedding Dream x1</span>
                                    </div>
                                </td>
                                <td><strong>Rp 500.000</strong></td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-002')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>

                            <tr data-status="shipped">
                                <td class="order-id">BG-2024-003</td>
                                <td>13 Nov 2024</td>
                                <td>
                                    <div class="product-info">
                                        <span class="product-name">Buket Birthday Delight x1</span>
                                    </div>
                                </td>
                                <td><strong>Rp 200.000</strong></td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-003')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>

                            <tr data-status="completed">
                                <td class="order-id">BG-2024-004</td>
                                <td>8 Nov 2024</td>
                                <td>
                                    <div class="product-info">
                                        <span class="product-name">Buket New Baby Pink x2</span>
                                    </div>
                                </td>
                                <td><strong>Rp 360.000</strong></td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-004')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="empty-history" id="emptyHistory" style="display: none;">
                    <div class="empty-history-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4>Tidak Ada Riwayat</h4>
                    <p>Belum ada riwayat pesanan yang sesuai</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-receipt me-2"></i> Detail Pesanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="order-detail-item">
                    <strong>No. Pesanan:</strong> <span id="modalOrderId">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Tanggal:</strong> <span id="modalDate">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Total:</strong> <span id="modalTotal">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Produk:</strong>
                    <ul class="mb-0 mt-2" id="modalProducts"></ul>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ordersData = [
        { id: 'BG-2024-001', date: '10 Nov 2024', products: 'Buket Mawar Pink Premium x2, Buket Anniversary Mewah x1', total: 850000, status: 'pending', statusText: 'Menunggu Pembayaran' },
        { id: 'BG-2024-002', date: '12 Nov 2024', products: 'Buket Wedding Dream x1', total: 500000, status: 'processing', statusText: 'Diproses' },
        { id: 'BG-2024-003', date: '13 Nov 2024', products: 'Buket Birthday Delight x1', total: 200000, status: 'shipped', statusText: 'Dikirim' },
        { id: 'BG-2024-004', date: '8 Nov 2024', products: 'Buket New Baby Pink x2', total: 360000, status: 'completed', statusText: 'Selesai' }
    ];

    function filterHistory() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#historyTableBody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchSearch = text.includes(search);

            if (matchSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.querySelector('.table-responsive').style.display = visibleCount ? 'block' : 'none';
        document.getElementById('emptyHistory').style.display = visibleCount ? 'none' : 'block';
    }

    function showDetail(orderId) {
        const order = ordersData.find(o => o.id === orderId);
        if (!order) return;

        document.getElementById('modalOrderId').textContent = order.id;
        document.getElementById('modalDate').textContent = order.date;
        document.getElementById('modalTotal').textContent = `Rp ${order.total.toLocaleString('id-ID')}`;
        document.getElementById('modalProducts').innerHTML = order.products.split(', ').map(p => `<li>${p}</li>`).join('');

        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }
</script>
</body>
</html>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/dashboard/customer/riwayatbelanja.blade.php ENDPATH**/ ?>