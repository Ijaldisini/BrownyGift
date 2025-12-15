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

        .sidebar a:hover,
        .sidebar a.active {
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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
                <a href="<?php echo e(route('customer.profil')); ?>" class="active"><i class="fas fa-user"></i> Profil Saya</a>
                <a href="<?php echo e(route('customer.produk')); ?>"><i class="fas fa-gift"></i> Produk</a>
                <a href="<?php echo e(route('customer.keranjang')); ?>"><i class="fas fa-shopping-cart"></i> Keranjang</a>
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
                <h2 class="mb-2">Profil Saya</h2>
                <p class="text-muted mb-4">Kelola informasi profil Anda</p>

                <!-- Alert Messages -->
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <!-- Profile Header Card -->
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="profile-photo">
                                <?php if(auth()->user()->photo): ?>
                                <img src="<?php echo e(asset('storage/' . auth()->user()->photo)); ?>" alt="Profile Photo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                <?php else: ?>
                                <?php echo e(strtoupper(substr(auth()->user()->username, 0, 1))); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="mb-1 fw-bold"><?php echo e(auth()->user()->username); ?></h4>
                            <p class="text-muted mb-1"><?php echo e(auth()->user()->email); ?></p>
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
                    <form action="<?php echo e(route('customer.profile.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="username" class="form-label">
                                    <i class="fas fa-user text-muted me-1"></i> Username
                                </label>
                                <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="username" name="username"
                                    value="<?php echo e(old('username', auth()->user()->username)); ?>"
                                    placeholder="Masukkan username">
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope text-muted me-1"></i> Email
                                </label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="email" name="email"
                                    value="<?php echo e(old('email', auth()->user()->email)); ?>"
                                    placeholder="email@example.com">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="no_hp" class="form-label">
                                    <i class="fas fa-phone text-muted me-1"></i> No. Handphone
                                </label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="no_hp" name="no_hp"
                                    value="<?php echo e(old('no_hp', auth()->user()->no_hp ?? '')); ?>"
                                    placeholder="081234567890">
                                <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="tanggal_lahir" class="form-label">
                                    <i class="fas fa-birthday-cake text-muted me-1"></i> Tanggal Lahir
                                </label>
                                <input type="date" class="form-control"
                                    id="tanggal_lahir" name="tanggal_lahir"
                                    value="<?php echo e(old('tanggal_lahir', auth()->user()->tanggal_lahir ?? '')); ?>">
                            </div>
                        </div>

                        <!-- Alamat field removed, replaced by Address Management Section below -->

                        <div class="text-end">
                            <button type="submit" class="btn btn-pink">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Address Management Section -->
                <div class="profile-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Daftar Alamat</h5>
                        <button type="button" class="btn btn-sm btn-pink" data-bs-toggle="modal" data-bs-target="#addressModal">
                            <i class="fas fa-plus"></i> Tambah Alamat
                        </button>
                    </div>

                    <?php if($addresses->isEmpty()): ?>
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-map-marked-alt fa-3x mb-3" style="color: #ffc0cb;"></i>
                        <p>Belum ada alamat tersimpan.</p>
                    </div>
                    <?php else: ?>
                    <div class="row">
                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm" style="background: #fffafa;">
                                <div class="card-body">
                                    <h6 class="fw-bold"><?php echo e($address->nama_penerima); ?> <small class="text-muted">(<?php echo e($address->no_hp_penerima); ?>)</small></h6>
                                    <p class="mb-2 text-muted small">
                                        <?php echo e($address->detail_alamat); ?><br>
                                        <?php echo e($address->desa->nama_desa); ?>, <?php echo e($address->kecamatan->nama_kecamatan); ?>

                                    </p>
                                    <div class="text-end">
                                        <form action="<?php echo e(route('customer.address.delete', $address->id_alamat)); ?>" method="POST" onsubmit="return confirm('Hapus alamat ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-link text-danger p-0 font-size-sm text-decoration-none">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Form Ganti Password -->
                <div class="profile-card">
                    <h5><i class="fas fa-lock"></i> Ganti Password</h5>
                    <form action="<?php echo e(route('customer.password.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-4">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-key text-muted me-1"></i> Password Lama
                            </label>
                            <input type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="current_password" name="current_password"
                                placeholder="Masukkan password lama">
                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock text-muted me-1"></i> Password Baru
                                </label>
                                <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="password" name="password"
                                    placeholder="Masukkan password baru">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

    <!-- Modal Tambah Alamat -->
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <div class="modal-header" style="background-color: #fff0f5; border: none;">
                    <h5 class="modal-title fw-bold" id="addressModalLabel" style="color: #ff69b4;">
                        <i class="fas fa-map-marker-alt me-2"></i> Tambah Alamat Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('customer.address.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" name="nama_penerima" required placeholder="Contoh: Budi Santoso">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp_penerima" required placeholder="08123456789">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kecamatan</label>
                                <select class="form-select" id="selectKecamatan" name="id_kecamatan" required onchange="filterDesa()">
                                    <option value="">Pilih Kecamatan</option>
                                    <?php $__currentLoopData = $kecamatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kec->id_kecamatan); ?>"><?php echo e($kec->nama_kecamatan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Desa</label>
                                <select class="form-select" id="selectDesa" name="id_desa" required disabled>
                                    <option value="">Pilih Desa</option>
                                    <!-- Populated by JS -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Alamat</label>
                            <textarea class="form-control" name="detail_alamat" rows="3" required placeholder="Nama Jalan, No. Rumah, RT/RW, Patokan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-pink">
                            <i class="fas fa-save me-2"></i> Simpan Alamat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <!-- ... Photo Modal Content ... -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <div class="modal-header" style="background-color: #fff0f5; border: none;">
                    <h5 class="modal-title fw-bold" id="photoModalLabel" style="color: #ff69b4;">
                        <i class="fas fa-camera me-2"></i> Ubah Foto Profil
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('customer.photo.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <div class="profile-photo mx-auto mb-3">
                                <?php echo e(strtoupper(substr(auth()->user()->username, 0, 1))); ?>

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

        // Initial allDesas data from Controller
        const allDesas = <?php echo json_encode($desas, 15, 512) ?>;

        function filterDesa() {
            const idKecamatan = document.getElementById('selectKecamatan').value;
            const selectDesa = document.getElementById('selectDesa');

            selectDesa.innerHTML = '<option value="">Pilih Desa</option>';
            selectDesa.disabled = true;

            if (idKecamatan) {
                const filteredDesas = allDesas.filter(desa => desa.id_kecamatan == idKecamatan);

                filteredDesas.forEach(desa => {
                    const option = document.createElement('option');
                    option.value = desa.id_desa;
                    option.textContent = desa.nama_desa;
                    selectDesa.appendChild(option);
                });

                if (filteredDesas.length > 0) {
                    selectDesa.disabled = false;
                }
            }
        }
    </script>
</body>

</html><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/customer/profil.blade.php ENDPATH**/ ?>