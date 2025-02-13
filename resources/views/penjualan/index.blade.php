@extends('layouts.app_modern')

@section('content')
    <div class="container">
        <h1>Penjualan</h1>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
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
                        <td>{{ $item->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td> <!-- Validasi jika relasi null -->
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('penjualan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
