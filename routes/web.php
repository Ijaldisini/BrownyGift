<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileAdminController;

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
        Route::get('/', fn() => view('dashboard.admin.index'))->name('dashboard');
        Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
        Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
        Route::post('/produk/create', [ProductController::class, 'store'])->name('produk.store');
        Route::get('/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/edit/{id}', [ProductController::class, 'update'])->name('produk.update');
        Route::delete('/produk/hapus/{id}', [ProductController::class, 'destroy'])->name('produk.delete');
        Route::get('/profile', [ProfileAdminController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileAdminController::class, 'updatePassword'])->name('profile.password');
    });

// OWNER DASHBOARD
Route::middleware(['auth'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        Route::get('/', fn() => view('dashboard.owner.index'))->name('owner.dashboard');
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

        Route::get('/profil_saya', [OwnerController::class, 'profilSaya']);
        Route::post('/profil_saya', [OwnerController::class, 'updateProfilSaya']);
    });

Route::middleware(['auth'])
    ->prefix('customer/dashboard')
    ->name('dashboard.customer.')
    ->group(function () {

        Route::get('/', [CustomerController::class, 'dashboard'])->name('index');

        Route::get('/profil', [CustomerController::class, 'profil'])->name('profil');
        Route::put('/profil', [CustomerController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password', [CustomerController::class, 'updatePassword'])->name('password.update');
        Route::put('/photo', [CustomerController::class, 'updatePhoto'])->name('photo.update');

        Route::get('/produk', [CustomerController::class, 'produk'])->name('produk');
        Route::get('/keranjang', [CustomerController::class, 'keranjang'])->name('keranjang');
        Route::get('/pesanan', [CustomerController::class, 'pesanansaya'])->name('pesanan');
        Route::get('/riwayat', [CustomerController::class, 'riwayat'])->name('riwayat');
    });
