<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Katalog Produk - BrownyGift</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <style>
    body{background:#fff0f5;font-family:Arial, sans-serif}
    .sidebar{background:#ffc0cb;min-height:100vh;padding:20px 0;position:fixed;width:25%;z-index: 100;}
    .sidebar a{color:#fff;padding:15px 20px;display:block;text-decoration:none;font-size:1.1rem;transition:.3s}
    .sidebar a:hover,.sidebar a.active{background:#ff69b4}
    .sidebar .logout{position:absolute;bottom:20px;width:100%}
    .main-content{margin-left:25%;padding:40px}
    .page-header{margin-bottom:30px}
    .page-header h2{color:#ff1493;font-weight:700;margin-bottom:5px}
    .page-header p{color:#999}
    .search-box{position:relative;margin-bottom:25px}
    .search-box input{border:2px solid #ffe4e1;border-radius:25px;padding:12px 20px 12px 45px;width:100%;transition:.3s}
    .search-box input:focus{border-color:#ff69b4;outline:0;box-shadow:0 0 0 .2rem rgba(255,105,180,.25)}
    .search-box i{position:absolute;left:18px;top:50%;transform:translateY(-50%);color:#999}
    .filter-buttons{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:30px}
    .filter-btn{border:2px solid #ffe4e1;background:#fff;color:#666;padding:8px 20px;border-radius:20px;font-size:.9rem;transition:.3s;cursor:pointer}
    .filter-btn:hover{border-color:#ff69b4;color:#ff69b4}
    .filter-btn.active{background:#ff69b4;border-color:#ff69b4;color:#fff}
    .filter-btn i{margin-right:5px}
    .product-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:25px;margin-bottom:40px}
    .product-card{background:#fff;border-radius:15px;overflow:hidden;box-shadow:0 5px 15px rgba(0,0,0,.05);transition:.3s;cursor:pointer}
    .product-card:hover{transform:translateY(-8px);box-shadow:0 15px 30px rgba(255,105,180,.2)}
    .product-image{width:100%;height:250px;background:#f8f9fa;position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden}
    .product-image img{width:100%;height:100%;object-fit:cover}
    .product-rating{position:absolute;top:15px;right:15px;background:#fff;padding:5px 12px;border-radius:20px;display:flex;align-items:center;gap:5px;font-size:.85rem;font-weight:700;box-shadow:0 2px 8px rgba(0,0,0,.1)}
    .product-rating i{color:#ffd700}
    .product-body{padding:20px}
    .product-category{color:#ff69b4;font-size:.85rem;font-weight:600;text-transform:uppercase;margin-bottom:8px}
    .product-title{font-size:1.1rem;font-weight:700;color:#333;margin-bottom:8px}
    .product-description{color:#999;font-size:.9rem;margin-bottom:15px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
    .product-footer{display:flex;justify-content:space-between;align-items:center}
    .product-price{font-size:1.2rem;font-weight:700;color:#ff1493}
    .btn-add-cart{background:linear-gradient(135deg,#ff69b4,#ff1493);color:#fff;border:0;padding:8px 20px;border-radius:20px;font-size:.9rem;font-weight:600;transition:.3s}
    .btn-add-cart:hover{transform:scale(1.05);box-shadow:0 5px 15px rgba(255,105,180,.4)}
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
      <a href="<?php echo e(route('customer.produk')); ?>" class="active"><i class="fas fa-gift"></i> Produk</a>
      <a href="<?php echo e(route('customer.keranjang')); ?>"><i class="fas fa-shopping-cart"></i> Keranjang</a>
      <a href="<?php echo e(route('customer.pesanansaya')); ?>"><i class="fas fa-truck"></i> Pesanan Saya</a>
      <a href="<?php echo e(route('customer.riwayat')); ?>"><i class="fas fa-history"></i> Riwayat Belanja</a>

      <div class="logout">
          <a href="<?php echo e(url('/logout')); ?>" onclick="return confirm('Yakin ingin keluar?')">
              <i class="fas fa-sign-out-alt"></i> Logout
          </a>
      </div>
    </div>

    <div class="col-md-9 main-content">
      <div class="page-header">
        <h2>Katalog Produk</h2>
        <p>Pilih buket cantik untuk momen spesial Anda</p>
      </div>

      <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" placeholder="Cari produk..." onkeyup="filterProducts()"/>
      </div>

      <div class="filter-buttons">
        <button class="filter-btn active" onclick="filterByCategory('all', event)"><i class="fas fa-th"></i> Semua</button>
        <button class="filter-btn" onclick="filterByCategory('Graduation', event)"><i class="fas fa-graduation-cap"></i> Graduation</button>
        <button class="filter-btn" onclick="filterByCategory('Snack', event)"><i class="fas fa-cookie"></i> Snack</button>
        <button class="filter-btn" onclick="filterByCategory('Pita Satin', event)"><i class="fas fa-ribbon"></i> Pita Satin</button>
        <button class="filter-btn" onclick="filterByCategory('Birthday', event)"><i class="fas fa-birthday-cake"></i> Birthday</button>
      </div>

      <div class="product-grid" id="productGrid">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-card" data-category="<?php echo e($product->kategori->nama_kategori ?? 'Umum'); ?>">
          <div class="product-image">
            
            <img src="<?php echo e(asset('images/' . $product->gambar_produk)); ?>" 
                 alt="<?php echo e($product->nama_produk); ?>"
                 onerror="this.onerror=null;this.src='https://via.placeholder.com/300x250/ff69b4/ffffff?text=No+Image';">
            
            <div class="product-rating">
              <i class="fas fa-star"></i> 4.5
            </div>
          </div>
          <div class="product-body">
            <div class="product-category"><?php echo e($product->kategori->nama_kategori ?? 'Umum'); ?></div>
            <div class="product-title"><?php echo e($product->nama_produk); ?></div>
            <div class="product-description"><?php echo e($product->deskripsi_produk); ?></div>
            <div class="product-footer">
              <span class="product-price">Rp <?php echo e(number_format($product->harga_produk, 0, ',', '.')); ?></span>
              <button onclick="addToCart(<?php echo e($product->id_produk); ?>, this)" class="btn-add-cart">
                <i class="fas fa-shopping-cart"></i> Tambah
              </button>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="empty-state" id="emptyState" style="display:none;">
          <i class="fas fa-search"></i>
          <h4>Produk Tidak Ditemukan</h4>
          <p>Coba kata kunci atau filter lain</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function filterProducts() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.product-card');
    let visibleCount = 0;

    cards.forEach(card => {
      const title = card.querySelector('.product-title').innerText.toLowerCase();
      if (title.includes(input)) {
        card.style.display = 'block';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });
    document.getElementById('emptyState').style.display = visibleCount ? 'none' : 'block';
  }

  function filterByCategory(category, ev) {
    const cards = document.querySelectorAll('.product-card');
    const buttons = document.querySelectorAll('.filter-btn');
    const emptyState = document.getElementById('emptyState');
    let visibleCount = 0;

    buttons.forEach(btn => btn.classList.remove('active'));
    if (ev) ev.currentTarget.classList.add('active');

    const targetCat = category.toLowerCase();

    cards.forEach(card => {
      const cardCat = (card.dataset.category || '').toLowerCase();
      if (targetCat === 'all' || cardCat === targetCat) {
        card.style.display = 'block';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });
    emptyState.style.display = visibleCount ? 'none' : 'block';
  }

  function addToCart(id, btn) {
    const originalContent = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    btn.disabled = true;

    fetch('<?php echo e(route("customer.keranjang.add")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id_produk: id, quantity: 1 })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            btn.innerHTML = '<i class="fas fa-check"></i>';
            btn.style.background = '#4caf50';
            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.style.background = '';
                btn.disabled = false;
            }, 2000);
        } else {
            alert('Gagal: ' + (data.message || 'Error'));
            btn.innerHTML = originalContent;
            btn.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        btn.innerHTML = originalContent;
        btn.disabled = false;
    });
  }
</script>
</body>
</html><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/customer/produk.blade.php ENDPATH**/ ?>