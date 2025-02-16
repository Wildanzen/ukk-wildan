@extends('layouts.app_modern', ['title' => 'Barang'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Barang</h5>
        <div class="card-body">
            <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

            <table id="pembelianTable" class="table table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembelian as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->supplier->nama_supplier ?? 'Supplier tidak ditemukan' }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('pembelian.show', $item->id) }}" class="btn btn-info btn-sm me-2">Lihat</a>
                                </div>
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
@endsection

@push('scripts')
    <!-- Tambahkan jQuery dan DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pembelianTable').DataTable({
                "processing": true,
                "deferRender": true,
                "paging": true,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endpush
