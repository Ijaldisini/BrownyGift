<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer - BrownyGift</title>
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
        }
        .sidebar a {
            color: white;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            font-size: 1.1rem;
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
            padding: 40px;
        }
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .menu-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-decoration: none;
            color: #333;
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(255,105,180,0.2);
            color: #ff69b4;
        }
        .menu-card i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ff69b4;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <div class="text-center mb-5">
                <h4 class="text-white fw-bold">BrownyGift</h4>
                <p class="text-white">Halo, {{ auth()->user()->username }}!</p>
            </div>
         <a href="{{ route('dashboard.customer.index') }}"  class="active"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('dashboard.customer.profil') }}"><i class="fas fa-user"></i> Profil Saya</a>
            <a href="{{ route('dashboard.customer.produk') }}"><i class="fas fa-gift"></i> Produk</a>
            <a href="{{ route('dashboard.customer.keranjang') }}"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="{{ route('dashboard.customer.pesanan') }}"><i class="fas fa-truck"></i> Pesanan Saya</a>
            <a href="{{ route('dashboard.customer.riwayat') }}"><i class="fas fa-history"></i> Riwayat Belanja</a>

            <div class="logout">
                <a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 main-content">
            <h2>Selamat Datang di Dashboard!</h2>
            <p class="text-muted">Pilih menu di samping untuk mulai berbelanja kado manis </p>

            <div class="welcome-card mb-5">
                <h4>Hai, {{ auth()->user()->username }}! </h4>
                <p>Senang sekali kamu kembali. Yuk pilih kado spesial untuk orang tersayang!</p>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="#" class="menu-card">
                        <div>
                            <i class="fas fa-gift"></i>
                            <h5>Lihat Produk</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="menu-card">
                        <div>
                            <i class="fas fa-shopping-cart"></i>
                            <h5>Keranjang (0)</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="menu-card">
                        <div>
                            <i class="fas fa-truck"></i>
                            <h5>Pesanan Saya</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
