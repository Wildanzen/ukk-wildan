<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BarangController, KategoriController, SupplierController, PembelianController, PenjualanController, HomeController};

// Middleware untuk memastikan pengguna harus login
Route::middleware(['auth'])->group(function () {
    // Rute resource untuk manajemen data
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::resource('penjualan', PenjualanController::class);

    // Halaman dashboard (home)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Halaman Welcome (Tidak membutuhkan autentikasi)
Route::get('/', function () {
    return view('welcome');
});

// Default routes untuk autentikasi (login, register, dll.)
Auth::routes();
