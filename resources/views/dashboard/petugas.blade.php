@extends('layouts.app_petugas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="h5">Dashboard Petugas</h5>
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
