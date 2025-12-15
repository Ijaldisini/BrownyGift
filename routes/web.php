<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardAdminController;

// LANDING PAGE & AUTHENTICATION
Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN DASHBOARD
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard.index');

        Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
        Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
        Route::post('/produk/create', [ProductController::class, 'store'])->name('produk.store');
        Route::get('/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/edit/{id}', [ProductController::class, 'update'])->name('produk.update');
        Route::delete('/produk/hapus/{id}', [ProductController::class, 'destroy'])->name('produk.delete');

        Route::get('/profile', [ProfileAdminController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileAdminController::class, 'updatePassword'])->name('profile.password');

        Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan.laporan');

        Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
        Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');

        Route::put('/pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
        Route::put('/pesanan/{id}/update-pembayaran', [PesananController::class, 'updatePembayaran'])->name('pesanan.updatePembayaran');
    });

// OWNER DASHBOARD
Route::middleware(['auth'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        Route::get('/', [OwnerController::class, 'dashboard'])->name('dashboard');
        Route::get('/karyawan', [OwnerController::class, 'karyawanForm']);
        Route::post('/karyawan', [OwnerController::class, 'storeKaryawan']);
        Route::get('/karyawan_list', [OwnerController::class, 'listKaryawan'])->middleware('auth');

        Route::get('/karyawan_edit/{id}', [OwnerController::class, 'editKaryawan'])->middleware('auth');
        Route::post('/karyawan_edit/{id}', [OwnerController::class, 'updateKaryawan'])->middleware('auth');
        Route::get('/karyawan_delete/{id}', [OwnerController::class, 'deleteKaryawan'])->middleware('auth');

        Route::get('/profil_toko', [OwnerController::class, 'showProfilToko'])->middleware('auth');
        Route::get('/profil_toko', [OwnerController::class, 'showProfilToko'])->middleware('auth');
        Route::get('/profil_toko_edit', [OwnerController::class, 'editProfilToko'])->middleware('auth');
        Route::post('/profil_toko_edit', [OwnerController::class, 'updateProfilToko'])->middleware('auth');

        Route::get('/laporan_penjualan', [OwnerController::class, 'laporanPenjualan'])->middleware('auth');

        Route::get('/profil_saya', [OwnerController::class, 'profilSaya'])->middleware('auth');
        Route::get('/profil_saya_edit', [OwnerController::class, 'editProfilSaya'])->middleware('auth');
        Route::post('/profil_saya', [OwnerController::class, 'updateProfilSaya'])->middleware('auth');
    });

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    // Route::get('/', [CustomerController::class, 'dashboard'])->name('customer.dashboard');

    Route::get('/index', [CustomerController::class, 'dashboard'])->name('customer.index');
    Route::get('/profil', [CustomerController::class, 'profil'])->name('customer.profil');
    Route::put('/profil', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
    Route::post('/profil/address', [CustomerController::class, 'storeAddress'])->name('customer.address.store');
    Route::delete('/profil/address/{id}', [CustomerController::class, 'deleteAddress'])->name('customer.address.delete');
    Route::put('/password', [CustomerController::class, 'updatePassword'])->name('customer.password.update');

    Route::put('/photo', [CustomerController::class, 'updatePhoto'])->name('customer.photo.update');

    Route::get('/produk', [CustomerController::class, 'produk'])->name('customer.produk');
    Route::get('/keranjang', [CustomerController::class, 'keranjang'])->name('customer.keranjang');
    Route::post('/keranjang/add', [CustomerController::class, 'addToCart'])->name('customer.keranjang.add');
    Route::put('/keranjang/update', [CustomerController::class, 'updateCart'])->name('customer.keranjang.update');
    Route::delete('/keranjang/remove/{id}', [CustomerController::class, 'removeFromCart'])->name('customer.keranjang.remove');
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');
    Route::post('/checkout', [CustomerController::class, 'processCheckout'])->name('customer.checkout.process');
    Route::get('/pesanansaya', [CustomerController::class, 'pesanansaya'])->name('customer.pesanansaya'); // Fixed path from /pesanan to /pesanansaya to match
    Route::post('/pesanansaya/{id}/upload', [CustomerController::class, 'uploadBukti'])->name('customer.pesanan.upload'); // Fixed path
    Route::get('/riwayatbelanja', [CustomerController::class, 'riwayat'])->name('customer.riwayat'); // Fixed path
});
