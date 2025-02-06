@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pembelian</h1>
    <a href="{{ route('pembelian.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-header">
            Informasi Pembelian
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $pembelian->id }}</td>
                </tr>
                <tr>
                    <th>Barang</th>
                    <td>{{ $pembelian->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $pembelian->jumlah }}</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>{{ $pembelian->supplier->nama_supplier ?? 'Supplier tidak ditemukan' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <td>{{ $pembelian->created_at->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
