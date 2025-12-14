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
                <h4 class="text-white fw-bold">BrownyGift</h4>
                <p class="text-white">Halo, {{ auth()->user()->username }}!</p>
            </div>
            <a href="{{ route('dashboard.customer.index') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('dashboard.customer.profil') }}"><i class="fas fa-user"></i> Profil Saya</a>
            <a href="{{ route('dashboard.customer.produk') }}"><i class="fas fa-gift"></i> Produk</a>
            <a href="{{ route('dashboard.customer.keranjang') }}"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="{{ route('dashboard.customer.pesanan') }}" class="active"><i class="fas fa-truck"></i> Pesanan Saya</a>
            <a href="{{ route('dashboard.customer.riwayat') }}"><i class="fas fa-history"></i> Riwayat Belanja</a>

            <div class="logout">
                <a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin keluar?')">
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
                            <tr>
                                <td class="order-id">BG-2024-001</td>
                                <td>10/11/2024</td>
                                <td><strong>Rp 850.000</strong></td>
                                <td>
                                    <span class="status-badge status-pending">Menunggu Pembayaran</span>
                                </td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-001')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                    <button class="btn-action btn-upload" onclick="uploadProof('BG-2024-001')">
                                        <i class="fas fa-upload"></i> Upload Bukti
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">BG-2024-002</td>
                                <td>12/11/2024</td>
                                <td><strong>Rp 500.000</strong></td>
                                <td>
                                    <span class="status-badge status-processing">Diproses</span>
                                </td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-002')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">BG-2024-003</td>
                                <td>13/11/2024</td>
                                <td><strong>Rp 200.000</strong></td>
                                <td>
                                    <span class="status-badge status-shipped">Dikirim</span>
                                </td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-003')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">BG-2024-004</td>
                                <td>8/11/2024</td>
                                <td><strong>Rp 360.000</strong></td>
                                <td>
                                    <span class="status-badge status-completed">Selesai</span>
                                </td>
                                <td>
                                    <button class="btn-action btn-detail" onclick="showDetail('BG-2024-004')">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="empty-orders" id="emptyOrders" style="display: none;">
                    <div class="empty-orders-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4>Belum Ada Pesanan</h4>
                    <p>Anda belum memiliki pesanan apapun</p>
                    <a href="{{ route('dashboard.customer.produk') }}" class="btn-shop">
                        <i class="fas fa-gift me-2"></i> Mulai Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">
                    <i class="fas fa-receipt me-2"></i> Detail Pesanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="order-detail-item">
                    <strong>No. Pesanan:</strong> <span id="modalOrderId">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Tanggal:</strong> <span id="modalDate">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Status:</strong> <span id="modalStatus">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Total:</strong> <span id="modalTotal">-</span>
                </div>
                <div class="order-detail-item">
                    <strong>Alamat Pengiriman:</strong>
                    <p class="mb-0 mt-2" id="modalAddress">Jl. Merdeka No. 123, Jakarta Selatan</p>
                </div>
                <div class="order-detail-item">
                    <strong>Produk:</strong>
                    <ul class="mb-0 mt-2" id="modalProducts">
                        <li>Buket Mawar Pink Premium (1x) - Rp 250.000</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">
                    <i class="fas fa-upload me-2"></i> Upload Bukti Pembayaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">No. Pesanan:</label>
                        <input type="text" class="form-control" id="uploadOrderId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="proofFile" class="form-label fw-bold">
                            <i class="fas fa-image me-1"></i> Pilih File Bukti Transfer
                        </label>
                        <input type="file" class="form-control" id="proofFile" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                    </div>
                    <div class="mb-3">
                        <label for="bankAccount" class="form-label fw-bold">Rekening Pengirim</label>
                        <input type="text" class="form-control" id="bankAccount" placeholder="Contoh: BCA - 1234567890" required>
                    </div>
                    <div class="mb-3">
                        <label for="accountName" class="form-label fw-bold">Nama Pemilik Rekening</label>
                        <input type="text" class="form-control" id="accountName" placeholder="Nama sesuai rekening" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-upload">
                        <i class="fas fa-check me-2"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ordersData = [
        {
            id: 'BG-2024-001',
            date: '10/11/2024',
            total: 850000,
            status: 'Menunggu Pembayaran',
            statusClass: 'status-pending',
            address: 'Jl. Merdeka No. 123, Jakarta Selatan, 12345',
            products: [
                { name: 'Buket Mawar Pink Premium', qty: 2, price: 250000 },
                { name: 'Buket Anniversary Mewah', qty: 1, price: 350000 }
            ]
        },
        {
            id: 'BG-2024-002',
            date: '12/11/2024',
            total: 500000,
            status: 'Diproses',
            statusClass: 'status-processing',
            address: 'Jl. Sudirman No. 45, Jakarta Pusat, 10210',
            products: [
                { name: 'Buket Wedding Dream', qty: 1, price: 500000 }
            ]
        },
        {
            id: 'BG-2024-003',
            date: '13/11/2024',
            total: 200000,
            status: 'Dikirim',
            statusClass: 'status-shipped',
            address: 'Jl. Gatot Subroto No. 78, Jakarta Selatan, 12930',
            products: [
                { name: 'Buket Birthday Delight', qty: 1, price: 200000 }
            ]
        },
        {
            id: 'BG-2024-004',
            date: '8/11/2024',
            total: 360000,
            status: 'Selesai',
            statusClass: 'status-completed',
            address: 'Jl. Thamrin No. 12, Jakarta Pusat, 10340',
            products: [
                { name: 'Buket New Baby Pink', qty: 2, price: 180000 }
            ]
        }
    ];

    function showDetail(orderId) {
        const order = ordersData.find(o => o.id === orderId);
        if (!order) return;

        document.getElementById('modalOrderId').textContent = order.id;
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
        document.getElementById('uploadOrderId').value = orderId;
        const modal = new bootstrap.Modal(document.getElementById('uploadModal'));
        modal.show();
    }

    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const orderId = document.getElementById('uploadOrderId').value;
        const file = document.getElementById('proofFile').files[0];
        const bankAccount = document.getElementById('bankAccount').value;
        const accountName = document.getElementById('accountName').value;

        console.log('Upload data:', {
            orderId,
            file: file.name,
            bankAccount,
            accountName
        });

        alert('Bukti pembayaran berhasil diupload!\nPesanan Anda akan segera diproses.');

        bootstrap.Modal.getInstance(document.getElementById('uploadModal')).hide();
        this.reset();
    });

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
</html>
