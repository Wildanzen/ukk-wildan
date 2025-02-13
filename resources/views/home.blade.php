@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar/Navbar -->
        <nav class="col-md-2 d-none d-md-block bg-primary text-white sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="#">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kategori.index') }}">
                            <i class="fas fa-list"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('barang.index') }}">
                            <i class="fas fa-box"></i> Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('supplier.index') }}">
                            <i class="fas fa-truck"></i> Supplier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('pembelian.index') }}">
                            <i class="fas fa-shopping-cart"></i> Pembelian
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <!-- Cards Section -->
            <div class="row">
                <!-- Kategori Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('kategori.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-list fa-2x text-primary mb-3"></i>
                                <h5 class="card-title">Kelola Kategori</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Barang Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('barang.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-box fa-2x text-success mb-3"></i>
                                <h5 class="card-title">Kelola Barang</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Supplier Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('supplier.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-truck fa-2x text-warning mb-3"></i>
                                <h5 class="card-title">Kelola Supplier</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Pembelian Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('pembelian.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-shopping-cart fa-2x text-danger mb-3"></i>
                                <h5 class="card-title">Kelola Pembelian</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Penjualan Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('penjualan.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-cash-register fa-2x text-info mb-3"></i>
                                <h5 class="card-title">Kelola Penjualan</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
