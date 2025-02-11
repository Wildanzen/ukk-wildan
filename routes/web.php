<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BarangController, KategoriController, SupplierController, PembelianController, PenjualanController, HomeController};

// Middleware untuk memastikan pengguna harus login
Route::middleware(['auth'])->group(function () {
    // Rute khusus admin
    Route::group(['middleware' => function ($request, $next) {
        // Memastikan user login dan memiliki role 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }
        // Akses ditolak jika bukan admin
        abort(403, 'Unauthorized');
    }], function () {
        Route::resource('kategori', KategoriController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('pembelian', PembelianController::class);
    });

    // Rute khusus petugas
    Route::group(['middleware' => function ($request, $next) {
        // Memastikan user login dan memiliki role 'petugas'
        if (auth()->check() && auth()->user()->role === 'petugas') {
            return $next($request);
        }
        // Akses ditolak jika bukan petugas
        abort(403, 'Unauthorized');
    }], function () {
        Route::resource('penjualan', PenjualanController::class);
    });

    // Halaman dashboard (home)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Halaman Welcome (Tidak membutuhkan autentikasi)
Route::get('/', function () {
    return view('welcome');
});

// Default routes untuk autentikasi (login, register, dll.)
Auth::routes();
