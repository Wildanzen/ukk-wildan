@extends('layouts.app_modern', ['title' => 'Daftar Supplier'])

@section('content')
    <div class="card">
        <h5 class="card-header">Daftar Supplier</h5>
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Tambah Supplier</button>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table id="supplierTable" class="table table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supplier as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kontak }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editSupplierModal{{ $item->id }}">Edit</button>
                                    <form action="{{ route('supplier.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit Supplier -->
                        <div class="modal fade" id="editSupplierModal{{ $item->id }}" tabindex="-1" aria-labelledby="editSupplierModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSupplierModalLabel{{ $item->id }}">Edit Supplier</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('supplier.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="form_type" value="edit">
                                            <div class="mb-3">
                                                <label for="nama_supplier{{ $item->id }}" class="form-label">Nama Supplier</label>
                                                <input type="text" class="form-control" id="nama_supplier{{ $item->id }}" name="nama_supplier" value="{{ $item->nama_supplier }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat{{ $item->id }}" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat{{ $item->id }}" name="alamat">{{ $item->alamat }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kontak{{ $item->id }}" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="kontak{{ $item->id }}" name="kontak" value="{{ $item->kontak }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Supplier -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="form_type" value="create">
                        <div class="mb-3">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control @if(session()->has('errors') && old('form_type') == 'create') is-invalid @endif" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}">
                            @error('nama_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @if(session()->has('errors') && old('form_type') == 'create') is-invalid @endif" id="alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Telepon</label>
                            <input type="text" class="form-control @if(session()->has('errors') && old('form_type') == 'create') is-invalid @endif" id="kontak" name="kontak" value="{{ old('kontak') }}">
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
