@extends('layouts.app_petugas')

@section('content')
<div class="card">
    <h5 class="card-header">Tambah Penjualan</h5>
    <div class="card-body">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPenjualanModal">Jual Barang</button>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="pembelianTable" class="table table-striped display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                        <!-- Validasi jika relasi null -->
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('penjualan.show', $item->id) }}" class="btn btn-info btn-sm me-2">Lihat</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('penjualan.create')
@endsection
