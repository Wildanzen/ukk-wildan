@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Barang</h1>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input
                    type="text"
                    name="nama_barang"
                    id="nama_barang"
                    class="form-control @error('nama_barang') is-invalid @enderror"
                    value="{{ old('nama_barang', $barang->nama_barang) }}">
                @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input
                    type="number"
                    name="stok"
                    id="stok"
                    class="form-control @error('stok') is-invalid @enderror"
                    value="{{ old('stok', $barang->stok) }}">
                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select
                    name="kategori_id"
                    id="kategori"
                    class="form-control @error('kategori_id') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input
                    type="number"
                    name="harga"
                    id="harga"
                    class="form-control @error('harga') is-invalid @enderror"
                    value="{{ old('harga', $barang->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select
                    name="supplier_id"
                    id="supplier_id"
                    class="form-select @error('supplier_id') is-invalid @enderror">
                    <option value="">-- Pilih Supplier --</option>
                    @foreach ($supplier as $item)
                        <option value="{{ $item->id }}"
                            {{ old('supplier_id', $barang->supplier_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_supplier }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
