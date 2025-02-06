@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Supplier</h1>

    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input
                type="text"
                name="nama_supplier"
                id="nama_supplier"
                class="form-control @error('nama_supplier') is-invalid @enderror"
                value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
            @error('nama_supplier')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea
                name="alamat"
                id="alamat"
                class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $supplier->alamat) }}</textarea>
            @error('alamat')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kontak" class="form-label">Nomor Telepon</label>
            <input
                type="text"
                name="kontak"
                id="kontak"
                class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak', $supplier->kontak) }}">
            @error('kontak')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
