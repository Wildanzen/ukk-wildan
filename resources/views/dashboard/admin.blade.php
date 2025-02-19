@extends('layouts.app_modern')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="h5">Dashboard Admin</h5>
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
                </div>
            </main>
        </div>
    </div>
@endsection
