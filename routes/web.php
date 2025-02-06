<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukBarangController;
use App\Http\Controllers\SekolahController;

// Route::resource('siswa', SiswaController::class);
//  Route::resource('sekolah', SekolahController::class);


// Middleware untuk memastikan pengguna harus login
Route::middleware(['auth'])->group(function () {
    // Resource routes yang membutuhkan autentikasi
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::resource('penjualan', PenjualanController::class);
    // Route::resource('produkbarang', ProdukBarangController::class);
    // Route::resource('employ', EmployController::class);


    Route::delete('hapus/{id}',[SupplierController::class,'destroy'])->name('hapus');
    // Dashboard (home) yang membutuhkan autentikasi
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Halaman Welcome (Tidak membutuhkan autentikasi)
Route::get('/', function () {
    return view('welcome');
});

// Default routes untuk autentikasi (login, register, dll.)
Auth::routes();
