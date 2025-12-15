<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BrownyGift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff0f5; font-family: 'Arial', sans-serif; }
        .checkout-container { max-width: 900px; margin: 40px auto; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .card-header { background: white; border-bottom: 2px solid #fff0f5; padding: 20px; border-radius: 15px 15px 0 0; }
        .btn-pink { background-color: #ff69b4; border: none; color: white; padding: 12px 30px; border-radius: 25px; font-weight: 600; width: 100%; transition: 0.3s; }
        .btn-pink:hover { background-color: #ff1493; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4); color: white; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .summary-total { font-weight: bold; font-size: 1.2rem; border-top: 2px dashed #eee; padding-top: 15px; margin-top: 15px; color: #ff69b4; }
        .form-check-input:checked { background-color: #ff69b4; border-color: #ff69b4; }
        .address-card { border: 2px solid #eee; border-radius: 10px; padding: 15px; cursor: pointer; transition: 0.2s; }
        .address-card:hover, .address-card.selected { border-color: #ff69b4; background-color: #fff0f5; }
    </style>
</head>
<body>

<div class="checkout-container">
    <div class="d-flex align-items-center mb-4">
        <a href="<?php echo e(route('customer.keranjang')); ?>" class="text-decoration-none text-muted me-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <h2 class="fw-bold m-0">Checkout Pesanan</h2>
    </div>

    <?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('customer.checkout.process')); ?>" method="POST" id="checkoutForm">
        <?php echo csrf_field(); ?>
        <div class="row">
            <!-- Left Column: Shipping & Payment -->
            <div class="col-md-7">
                
                <!-- Shipping Method -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 fw-bold"><i class="fas fa-truck me-2 text-pink"></i> Metode Pengiriman</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="pengiriman" id="shippingPickup" value="Ambil di Tempat" onchange="toggleAddress(false)">
                            <label class="form-check-label fw-bold" for="shippingPickup">
                                Ambil di Tempat (Pickup)
                            </label>
                            <p class="text-muted small ms-4 mb-0">Lokasi: Toko BrownyGift, Jember.</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengiriman" id="shippingDelivery" value="Dikirim" checked onchange="toggleAddress(true)">
                            <label class="form-check-label fw-bold" for="shippingDelivery">
                                Dikirim ke Alamat
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Address Selection (Hidden if Pickup) -->
                <div class="card" id="addressSection">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0 fw-bold"><i class="fas fa-map-marker-alt me-2 text-pink"></i> Alamat Pengiriman</h5>
                        <a href="<?php echo e(route('customer.profil')); ?>" class="btn btn-sm btn-outline-secondary">Kelola Alamat</a>
                    </div>
                    <div class="card-body">
                        <?php if($addresses->isEmpty()): ?>
                            <div class="text-center py-3">
                                <p class="text-muted">Belum ada alamat tersimpan.</p>
                                <a href="<?php echo e(route('customer.profil')); ?>" class="btn btn-sm btn-pink">Tambah Alamat</a>
                            </div>
                        <?php else: ?>
                            <div class="row g-3">
                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12">
                                    <div class="address-card" onclick="selectAddress(<?php echo e($address->id_alamat); ?>, <?php echo e($address->desa->ongkir ?? 0); ?>)">
                                        <div class="form-check pointer-events-none">
                                            <input class="form-check-input" type="radio" name="id_alamat" id="addr_<?php echo e($address->id_alamat); ?>" value="<?php echo e($address->id_alamat); ?>">
                                            <label class="form-check-label fw-bold" for="addr_<?php echo e($address->id_alamat); ?>">
                                                <?php echo e($address->nama_penerima); ?> (<?php echo e($address->no_hp_penerima); ?>)
                                            </label>
                                        </div>
                                        <div class="ms-4 text-muted small mt-1">
                                            <?php echo e($address->detail_alamat); ?><br>
                                            <?php echo e($address->desa->nama_desa); ?>, <?php echo e($address->kecamatan->nama_kecamatan); ?><br>
                                            <span class="badge bg-secondary mt-1">Ongkir: Rp <?php echo e(number_format($address->desa->ongkir ?? 0, 0, ',', '.')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <?php $__errorArgs = ['id_alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger mt-2 small"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 fw-bold"><i class="fas fa-credit-card me-2 text-pink"></i> Metode Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="id_metode_pembayaran" id="pm_<?php echo e($pm->id_metode_pembayaran); ?>" value="<?php echo e($pm->id_metode_pembayaran); ?>" required>
                            <label class="form-check-label" for="pm_<?php echo e($pm->id_metode_pembayaran); ?>">
                                <?php echo e($pm->metode_pembayaran); ?>

                            </label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>

            <!-- Right Column: Order Summary -->
            <div class="col-md-5">
                <div class="card position-sticky" style="top: 20px;">
                    <div class="card-header">
                        <h5 class="m-0 fw-bold"><i class="fas fa-receipt me-2 text-pink"></i> Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <?php $subtotal = 0; ?>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $subtotal += $item->produk->harga_produk * $item->quantity; ?>
                        <div class="d-flex justify-content-between mb-2 small">
                            <span><?php echo e($item->produk->nama_produk); ?> x<?php echo e($item->quantity); ?></span>
                            <span>Rp <?php echo e(number_format($item->produk->harga_produk * $item->quantity, 0, ',', '.')); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <hr>
                        
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Ongkos Kirim</span>
                            <span id="ongkirDisplay">Rp 0</span>
                        </div>
                        
                        <div class="summary-row summary-total">
                            <span>Total Tagihan</span>
                            <span id="totalDisplay">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                        </div>

                        <button type="submit" class="btn btn-pink mt-4">
                            Lanjutkan ke Pembayaran <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const subtotal = <?php echo e($subtotal); ?>;
    let currentOngkir = 0;
    
    // Initial State Check
    document.addEventListener('DOMContentLoaded', function() {
        toggleAddress(document.getElementById('shippingDelivery').checked);
    });

    function toggleAddress(show) {
        const section = document.getElementById('addressSection');
        const inputs = document.getElementsByName('id_alamat');
        
        if (show) {
            section.style.display = 'block';
            updateTotal(); // Recalculate based on selected address
        } else {
            section.style.display = 'none';
            document.getElementById('ongkirDisplay').textContent = 'Rp 0';
            document.getElementById('totalDisplay').textContent = formatRupiah(subtotal);
            // Clear radio selection? Maybe not needed, backend ignores if Pickup.
        }
    }

    function selectAddress(id, ongkir) {
        // Find the radio button and check it
        const radio = document.getElementById('addr_' + id);
        if (radio) radio.checked = true;
        
        // Highlight card
        document.querySelectorAll('.address-card').forEach(c => c.classList.remove('selected'));
        radio.closest('.address-card').classList.add('selected');

        // Update Ongkir
        currentOngkir = ongkir;
        updateTotal();
    }

    function updateTotal() {
        // Only add ongkir if Delivery is checked
        const isDelivery = document.getElementById('shippingDelivery').checked;
        const finalOngkir = isDelivery ? currentOngkir : 0;
        
        document.getElementById('ongkirDisplay').textContent = formatRupiah(finalOngkir);
        document.getElementById('totalDisplay').textContent = formatRupiah(subtotal + finalOngkir);
    }

    function formatRupiah(number) {
        return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>

</body>
</html><?php /**PATH C:\laragon\www\BrownyGift\resources\views/dashboard/customer/checkout.blade.php ENDPATH**/ ?>