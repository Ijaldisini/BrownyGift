<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - BrownyGift</title>
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
        .profile-header {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }
        .profile-card h5 {
            color: #ff69b4;
            font-weight: bold;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        .profile-card h5 i {
            margin-right: 10px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #ffe4e1;
            border-radius: 10px;
            padding: 12px 15px;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
        }
        .btn-pink {
            background-color: #ff69b4;
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-pink:hover {
            background-color: #ff1493;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4);
            color: white;
        }
        .btn-outline-pink {
            border: 2px solid #ff69b4;
            color: #ff69b4;
            background: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-outline-pink:hover {
            background-color: #ff69b4;
            color: white;
            transform: translateY(-2px);
        }
        .profile-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffc0cb, #ff69b4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
        }
        .alert-custom {
            border-radius: 15px;
            border: none;
            padding: 15px 20px;
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
            <a href="{{ route('dashboard.customer.index') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('dashboard.customer.profil') }}" class="active"><i class="fas fa-user"></i> Profil Saya</a>
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
            <h2 class="mb-2">Profil Saya</h2>
            <p class="text-muted mb-4">Kelola informasi profil Anda</p>

            <!-- Alert Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Profile Header Card -->
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="profile-photo">
                            {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="mb-1 fw-bold">{{ auth()->user()->username }}</h4>
                        <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                        <small class="text-secondary"><i class="fas fa-shield-alt"></i> Role: Customer</small>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-pink btn-sm" data-bs-toggle="modal" data-bs-target="#photoModal">
                            <i class="fas fa-camera"></i> Ubah Foto
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form Informasi Profil -->
            <div class="profile-card">
                <h5><i class="fas fa-user-circle"></i> Informasi Profil</h5>
                <form action="{{ route('dashboard.customer.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="username" class="form-label">
                                <i class="fas fa-user text-muted me-1"></i> Username
                            </label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   id="username" name="username"
                                   value="{{ old('username', auth()->user()->username) }}"
                                   placeholder="Masukkan username">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope text-muted me-1"></i> Email
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   placeholder="email@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="no_hp" class="form-label">
                                <i class="fas fa-phone text-muted me-1"></i> No. Handphone
                            </label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                   id="no_hp" name="no_hp"
                                   value="{{ old('no_hp', auth()->user()->no_hp ?? '') }}"
                                   placeholder="081234567890">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tanggal_lahir" class="form-label">
                                <i class="fas fa-birthday-cake text-muted me-1"></i> Tanggal Lahir
                            </label>
                            <input type="date" class="form-control"
                                   id="tanggal_lahir" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir ?? '') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">
                            <i class="fas fa-map-marker-alt text-muted me-1"></i> Alamat Pengiriman
                        </label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                  id="alamat" name="alamat" rows="3"
                                  placeholder="Jl. Merdeka No. 123, Jakarta Selatan">{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-pink">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Form Ganti Password -->
            <div class="profile-card">
                <h5><i class="fas fa-lock"></i> Ganti Password</h5>
                <form action="{{ route('dashboard.customer.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="current_password" class="form-label">
                            <i class="fas fa-key text-muted me-1"></i> Password Lama
                        </label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                               id="current_password" name="current_password"
                               placeholder="Masukkan password lama">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock text-muted me-1"></i> Password Baru
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password"
                                   placeholder="Masukkan password baru">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock text-muted me-1"></i> Konfirmasi Password Baru
                            </label>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation"
                                   placeholder="Konfirmasi password baru">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-pink">
                            <i class="fas fa-shield-alt me-2"></i> Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Foto -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px; border: none;">
            <div class="modal-header" style="background-color: #fff0f5; border: none;">
                <h5 class="modal-title fw-bold" id="photoModalLabel" style="color: #ff69b4;">
                    <i class="fas fa-camera me-2"></i> Ubah Foto Profil
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.customer.photo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="profile-photo mx-auto mb-3">
                            {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                        </div>
                        <p class="text-muted">Upload foto profil baru Anda</p>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Pilih Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i> Format: JPG, PNG, JPEG. Maksimal 2MB
                        </small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-pink">
                        <i class="fas fa-upload me-2"></i> Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
</body>
</html>
