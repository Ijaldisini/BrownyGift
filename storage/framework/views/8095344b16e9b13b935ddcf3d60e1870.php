<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - BrownyGift</title>
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
        .orders-container {
            background: white;
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .orders-table {
            width: 100%;
            margin: 0;
        }
        .orders-table thead {
            background: linear-gradient(135deg, #ffc0cb, #ffb6c1);
        }
        .orders-table thead th {
            color: white;
            font-weight: 600;
            padding: 20px 15px;
            border: none;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        .orders-table tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #ffe4e1;
            color: #333;
        }
        .orders-table tbody tr:last-child td {
            border-bottom: none;
        }
        .orders-table tbody tr:hover {
            background-color: #fff0f5;
        }
        .order-id {
            font-weight: 600;
            color: #ff1493;
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
        .status-cancelled {
            background-color: #f8d7da;
            color: #842029;
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
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            color: white;
            margin-left: 8px;
        }
        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4);
        }
        .empty-orders {
            text-align: center;
            padding: 80px 20px;
        }
        .empty-orders-icon {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #ffc0cb, #ffe4e1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .empty-orders-icon i {
            font-size: 4rem;
            color: #ff69b4;
        }
        .empty-orders h4 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .empty-orders p {
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

        /* Modal Styles */
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
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="text-center mb-5">
                <div class="mb-3 d-flex justify-content-center">
                    <?php if(auth()->user()->photo): ?>
                        <img src="<?php echo e(asset('storage/' . auth()->user()->photo)); ?>" alt="Profile" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid white;">
                    <?php else: ?>
                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border: 3px solid white;">
                            <span class="fw-bold fs-3" style="color: #ff69b4;"><?php echo e(strtoupper(substr(auth()->user()->username, 0, 1))); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <h4 class="text-white fw-bold">BrownyGift</h4>
                <p class="text-white">Halo, <?php echo e(auth()->user()->username); ?>!</p>
            </div>
            <a href="<?php echo e(route('customer.index')); ?>"><i class="fas fa-home"></i> Dashboard</a>
            <a href="<?php echo e(route('customer.profil')); ?>"><i class="fas fa-user"></i> Profil Saya</a>
            <a href="<?php echo e(route('customer.produk')); ?>"><i class="fas fa-gift"></i> Produk</a>
            <a href="<?php echo e(route('customer.keranjang')); ?>"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="<?php echo e(route('customer.pesanansaya')); ?>" class="active"><i class="fas fa-truck"></i> Pesanan Saya</a>
            <a href="<?php echo e(route('customer.riwayat')); ?>"><i class="fas fa-history"></i> Riwayat Belanja</a>

            <div class="logout">
                <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

        <div class="col-md-9 main-content">
            <div class="page-header">
                <h2>Pesanan Saya</h2>
                <p>Riwayat pesanan dan status pengiriman</p>
            </div>

            <div class="orders-container" id="ordersContainer">
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTableBody">
                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="order-id">BG-<?php echo e(date('Y', strtotime($order->created_at))); ?>-<?php echo e(str_pad($order->id_pesanan, 3, '0', STR_PAD_LEFT)); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($order->created_at))); ?></td>
                                <td><strong>Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></strong></td>
                                <td>
                                    <?php
                                        $statusClass = 'status-pending';
                                        $rawStatus = $order->statusPemesanan->status_pemesanan ?? 'unknown';
                                        $status = strtolower($rawStatus);
                                        
                                        if($status == 'diproses') $statusClass = 'status-processing';
                                        elseif($status == 'dikirim') $statusClass = 'status-shipped';
                                        elseif($status == 'selesai') $statusClass = 'status-completed';
                                        elseif($status == 'dibatalkan') $statusClass = 'status-cancelled';
                                    ?>
                                    <span class="status-badge <?php echo e($statusClass); ?>"><?php echo e(ucfirst($rawStatus)); ?></span>
                                </td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail(<?php echo e($order->id_pesanan); ?>)">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                    <?php
                                        $paymentMethod = strtolower($order->metodePembayaran->metode_pembayaran ?? '');
                                        $isCOD = str_contains($paymentMethod, 'cod') || str_contains($paymentMethod, 'cash') || str_contains($paymentMethod, 'ambil');
                                    ?>
                                    
                                    <?php if($status == 'menunggu pembayaran' && !$isCOD): ?>
                                    <button class="btn-action btn-upload" onclick="uploadProof(<?php echo e($order->id_pesanan); ?>)">
                                        <i class="fas fa-upload"></i> Upload Bukti
                                    </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <!-- Empty state rendered via JS or just simple TR here? 
                                 The original code had a separate div #emptyOrders.
                                 Let's keep the table empty and show the div if empty.
                            -->
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="empty-orders" id="emptyOrders" style="<?php echo e($orders->isEmpty() ? 'display: block;' : 'display: none;'); ?>">
                    <div class="empty-orders-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4>Belum Ada Pesanan</h4>
                    <p>Anda belum memiliki pesanan apapun</p>
                    <a href="<?php echo e(route('customer.produk')); ?>" class="btn-shop">
                        <i class="fas fa-gift me-2"></i> Mulai Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Detail Pesanan -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan <span id="modalOrderId"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted" id="modalDate"></span>
                    <span id="modalStatus"></span>
                </div>
                
                <h6 class="fw-bold mb-3"><i class="fas fa-box me-2 text-pink"></i> Daftar Produk</h6>
                <ul class="list-unstyled mb-4" id="modalProducts">
                    <!-- Products injected here -->
                </ul>

                <h6 class="fw-bold mb-2"><i class="fas fa-map-marker-alt me-2 text-pink"></i> Alamat Pengiriman</h6>
                <p class="text-muted small mb-4" id="modalAddress">-</p>

                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <span class="fw-bold">Total Pembayaran</span>
                    <span class="fw-bold text-pink fs-5" id="modalTotal"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload Bukti -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_pesanan" id="uploadOrderId">
                    <p class="text-muted small mb-3">Silakan transfer ke salah satu rekening berikut:</p>
                    <div class="alert alert-light border mb-3">
                        <small class="d-block fw-bold text-dark">BCA: 1234567890 (BrownyGift)</small>
                        <small class="d-block fw-bold text-dark">Mandiri: 0987654321 (BrownyGift)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bukti Transfer (Image)</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background: #ff69b4; border:none;">Kirim Bukti</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ordersData = [
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            id: <?php echo e($order->id_pesanan); ?>,
            displayId: 'BG-<?php echo e(date('Y', strtotime($order->created_at))); ?>-<?php echo e(str_pad($order->id_pesanan, 3, '0', STR_PAD_LEFT)); ?>',
            date: '<?php echo e(date('d/m/Y', strtotime($order->created_at))); ?>',
            total: <?php echo e($order->total); ?>,
            status: '<?php echo e(ucfirst($order->statusPemesanan->status_pemesanan ?? "Unknown")); ?>',
            statusClass: (() => {
                const s = '<?php echo e(strtolower($order->statusPemesanan->status_pemesanan ?? "Unknown")); ?>';
                if(s === 'diproses') return 'status-processing';
                if(s === 'dikirim') return 'status-shipped';
                if(s === 'selesai') return 'status-completed';
                if(s === 'dibatalkan') return 'status-cancelled';
                return 'status-pending';
            })(),
            address: 'Alamat Pengiriman Default', // In a real app we'd fetch this from address relation
            products: [
                <?php $__currentLoopData = $order->detailPesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                { 
                    name: '<?php echo e($detail->produk->nama_produk ?? "Produk Dihapus"); ?>', 
                    qty: <?php echo e($detail->quantity_per_produk); ?>, 
                    price: <?php echo e($detail->harga_produk); ?> 
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];

    function showDetail(orderId) {
        const order = ordersData.find(o => o.id === orderId);
        if (!order) return;

        document.getElementById('modalOrderId').textContent = order.displayId;
        document.getElementById('modalDate').textContent = order.date;
        document.getElementById('modalStatus').innerHTML = `<span class="status-badge ${order.statusClass}">${order.status}</span>`;
        document.getElementById('modalTotal').textContent = `Rp ${order.total.toLocaleString('id-ID')}`;
        document.getElementById('modalAddress').textContent = order.address;

        const productsList = order.products.map(p =>
            `<li>${p.name} (${p.qty}x) - Rp ${(p.price * p.qty).toLocaleString('id-ID')}</li>`
        ).join('');
        document.getElementById('modalProducts').innerHTML = productsList;

        const modal = new bootstrap.Modal(document.getElementById('detailModal'));
        modal.show();
    }

    function uploadProof(orderId) {
        // Set dynamic action for the form
        const form = document.getElementById('uploadForm');
        form.action = `/dashboard/pesanansaya/${orderId}/upload`; // Fixed route prefix

        document.getElementById('uploadOrderId').value = orderId;
        const modal = new bootstrap.Modal(document.getElementById('uploadModal'));
        modal.show();
    }

    // Removed mock form listener to allow native submission

    function initPage() {
        const tbody = document.getElementById('ordersTableBody');
        const emptyState = document.getElementById('emptyOrders');

        if (ordersData.length === 0) {
            tbody.closest('.table-responsive').style.display = 'none';
            emptyState.style.display = 'block';
        }
    }

    initPage();
</script>
</body>
</html><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/customer/pesanansaya.blade.php ENDPATH**/ ?>