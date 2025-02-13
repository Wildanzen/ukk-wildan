@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar/Navbar -->
            <nav class="col-md-2 d-none d-md-block bg-secondary text-white sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="#">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('barang.index') }}">
                                <i class="fas fa-box"></i> Barang
                            </a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('penjualan.index') }}">
                                <i class="fas fa-cash-register"></i> Penjualan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Petugas</h1>
                </div>

                <!-- Cards Section -->
                <div class="row">
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
