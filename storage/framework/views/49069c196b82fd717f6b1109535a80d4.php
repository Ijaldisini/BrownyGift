<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BrownyGift</title>
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
            margin-bottom: 30px;
        }
        .page-header h2 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .page-header p {
            color: #999;
        }
        .cart-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            min-height: 500px;
        }
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
        }
        .empty-cart-icon {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #ffc0cb, #ffe4e1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .empty-cart-icon i {
            font-size: 4rem;
            color: #ff69b4;
        }
        .empty-cart h3 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .empty-cart p {
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
        .cart-item {
            background: #fff0f5;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: 0.3s;
        }
        .cart-item:hover {
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.2);
        }
        .cart-item-image {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ffc0cb, #ffe4e1);
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }
        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .cart-item-details {
            flex: 1;
        }
        .cart-item-category {
            color: #ff69b4;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .cart-item-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }
        .cart-item-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #ff1493;
        }
        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            border-radius: 25px;
            padding: 8px 15px;
            border: 2px solid #ffe4e1;
        }
        .quantity-control button {
            background: none;
            border: none;
            color: #ff69b4;
            font-size: 1.2rem;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }
        .quantity-control button:hover {
            color: #ff1493;
            transform: scale(1.2);
        }
        .quantity-control span {
            font-weight: bold;
            color: #333;
            min-width: 30px;
            text-align: center;
        }
        .btn-remove {
            background: #fff;
            border: 2px solid #ffb6c1;
            color: #ff69b4;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-remove:hover {
            background: #ff69b4;
            color: white;
            transform: rotate(90deg);
        }
        .cart-summary {
            background: #fff0f5;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
        }
        .cart-summary h4 {
            color: #ff1493;
            font-weight: bold;
            margin-bottom: 25px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .summary-row.total {
            border-top: 2px solid #ffc0cb;
            padding-top: 20px;
            margin-top: 20px;
            font-size: 1.4rem;
            font-weight: bold;
            color: #ff1493;
        }
        .btn-checkout {
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: 600;
            width: 100%;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-checkout:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.4);
        }
        .btn-continue {
            background: white;
            color: #ff69b4;
            border: 2px solid #ff69b4;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .btn-continue:hover {
            background: #ff69b4;
            color: white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
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
            <a href="<?php echo e(route('customer.keranjang')); ?>" class="active"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="<?php echo e(route('customer.pesanansaya')); ?>"><i class="fas fa-truck"></i> Pesanan Saya</a>
            <a href="<?php echo e(route('customer.riwayat')); ?>"><i class="fas fa-history"></i> Riwayat Belanja</a>

            <div class="logout">
                <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 main-content">
            <!-- Page Header -->
            <div class="page-header">
                <h2>Keranjang Belanja</h2>
                <p>Review produk yang akan Anda beli</p>
            </div>

            <div class="cart-container">
                <!-- Empty Cart State -->
                <div class="empty-cart" id="emptyCart" style="<?php echo e($cartItems->isEmpty() ? '' : 'display: none;'); ?>">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3>Keranjang Kosong</h3>
                    <p>Belum ada produk di keranjang Anda</p>
                    <a href="<?php echo e(route('customer.produk')); ?>" class="btn-shop">
                        <i class="fas fa-gift me-2"></i> Mulai Belanja
                    </a>
                </div>

                <!-- Cart Items (Hidden by default, shown when cart has items) -->
                <div id="cartItems" style="<?php echo e($cartItems->isEmpty() ? 'display: none;' : ''); ?>">
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Cart Item -->
                    <div class="cart-item" data-id="<?php echo e($item->id_keranjang); ?>">
                        <div class="cart-item-image">
                            <img src="<?php echo e(asset('storage/products/' . $item->produk->gambar_produk)); ?>" alt="<?php echo e($item->produk->nama_produk); ?>">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-category">Product</div>
                            <div class="cart-item-title"><?php echo e($item->produk->nama_produk); ?></div>
                            <div class="cart-item-price">Rp <?php echo e(number_format($item->produk->harga_produk, 0, ',', '.')); ?></div>
                        </div>
                        <div class="cart-item-actions">
                            <div class="quantity-control">
                                <!-- Note: For simplicity, update quantity via AJAX or simple form submission could be done. 
                                     Here we will use a simple approach or keep the static JS logic but bounded to backend? 
                                     Let's use a form for update if JS is too complex to inject now.
                                     Actually, let's keep JS logic but update backend via fetch.
                                -->
                                <button onclick="updateQty(<?php echo e($item->id_keranjang); ?>, -1)">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span id="qty-<?php echo e($item->id_keranjang); ?>"><?php echo e($item->quantity); ?></span>
                                <button onclick="updateQty(<?php echo e($item->id_keranjang); ?>, 1)">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <form action="<?php echo e(route('customer.keranjang.remove', $item->id_keranjang)); ?>" method="POST" onsubmit="return confirm('Hapus produk?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <h4><i class="fas fa-receipt me-2"></i> Ringkasan Belanja</h4>
                        <div class="summary-row">
                            <span>Subtotal (<span id="totalItems"><?php echo e($cartItems->sum('quantity')); ?></span> item)</span>
                            <span id="subtotal">Rp <?php echo e(number_format($cartItems->sum(function($item){ return $item->produk->harga_produk * $item->quantity; }), 0, ',', '.')); ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Biaya Pengiriman</span>
                            <span id="shipping">Rp 15.000</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="total">Rp <?php echo e(number_format($cartItems->sum(function($item){ return $item->produk->harga_produk * $item->quantity; }) + 15000, 0, ',', '.')); ?></span>
                        </div>
                        <button class="btn-checkout" onclick="checkout()">
                            <i class="fas fa-credit-card me-2"></i> Checkout
                        </button>
                        <div class="text-center">
                            <a href="<?php echo e(route('customer.produk')); ?>" class="btn-continue">
                                <i class="fas fa-arrow-left me-2"></i> Lanjut Belanja
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

    function updateQty(id, change) {
        const qtyElement = document.getElementById(`qty-${id}`);
        let currentQty = parseInt(qtyElement.textContent);
        let newQty = currentQty + change;

        if (newQty < 1) return;

        fetch('<?php echo e(route("customer.keranjang.update")); ?>', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({
                id_keranjang: id,
                quantity: newQty
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Determine price from DOM or data attribute if possible, or reload page.
                // Simple approach: reload page to update totals correctly
                location.reload(); 
            } else {
                alert('Gagal mengupdate keranjang');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function checkout() {
        if (<?php echo e($cartItems->isEmpty() ? 'true' : 'false'); ?>) {
            alert('Keranjang kosong!');
            return;
        }

        // Redirect to checkout page
        window.location.href = "<?php echo e(route('customer.checkout')); ?>";
    }
</script>
</body>
</html><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/customer/keranjang.blade.php ENDPATH**/ ?>