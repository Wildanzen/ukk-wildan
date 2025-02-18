<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BarangController, KategoriController, SupplierController, PembelianController, PenjualanController, HomeController};

// Middleware untuk memastikan pengguna harus login
Route::middleware(['auth'])->group(function () {
    // Redirect dashboard sesuai peran
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        }
        abort(403, 'Unauthorized');
    })->name('dashboard');

    // Dashboard admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::resource('kategori', KategoriController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('pembelian', PembelianController::class);
    });

    // Dashboard petugas
    Route::middleware(['role:petugas'])->group(function () {
        Route::get('/petugas/dashboard', [HomeController::class, 'petugasDashboard'])->name('petugas.dashboard');
        Route::resource('penjualan', PenjualanController::class);
    });
});

// Halaman Welcome (Tanpa autentikasi)
Route::get('/', function () {
    return view('welcome');
});

// Default routes untuk autentikasi
Auth::routes();
