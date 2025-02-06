@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penjualan</h1>

    <div class="mb-3">
        <label for="barang" class="form-label">Barang</label>
        <p>{{ $penjualan->barang->nama_barang ?? 'Barang tidak ditemukan' }}</p>
    </div>

    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <p>{{ $penjualan->jumlah }}</p>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga Satuan</label>
        <p>{{ number_format($penjualan->barang->harga, 0, ',', '.') }}</p>
    </div>

    <div class="mb-3">
        <label for="total_harga" class="form-label">Total Harga</label>
        <p>{{ number_format($penjualan->harga, 0, ',', '.') }}</p>
    </div>

    <div class="mb-3">
        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
        <p>{{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d-m-Y') }}</p>
    </div>

    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
