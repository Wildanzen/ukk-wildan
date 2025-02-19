@extends('layouts.app_modern', ['title' => 'Daftar Barang'])

@section('content')
    <div class="card">
        <h5 class="card-header">Daftar Barang</h5>
        <div class="card-body">
            <!-- Button to trigger modal -->
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah Barang</button>

            <!-- Display success and error messages -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Table of barang -->
            <table id="barangTable" class="table table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->supplier ? $item->supplier->nama_supplier : 'Tidak ada supplier' }}</td>
                            <td>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('barang.show', $item->id) }}" class="btn btn-info btn-sm me-2">Lihat</a>
                                    <a href="#" class="btn btn-warning btn-sm me-2 editBarangBtn"
                                        data-id="{{ $item->id }}" data-nama="{{ $item->nama_barang }}"
                                        data-stok="{{ $item->stok }}" data-kategori="{{ $item->kategori_id }}"
                                        data-harga="{{ $item->harga }}" data-supplier="{{ $item->supplier_id }}"
                                        data-bs-toggle="modal" data-bs-target="#modalEditBarang">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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

    <!-- Include Create & Edit Barang Modal -->
    @include('barang.create')
    @include('barang.edit') <!-- Tambahkan ini -->
@endsection

@push('scripts')
    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#barangTable').DataTable({
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

            // Event click untuk edit
            $('.editBarangBtn').on('click', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let stok = $(this).data('stok');
                let kategori = $(this).data('kategori');
                let harga = $(this).data('harga');
                let supplier = $(this).data('supplier');

                // Isi form modal edit
                $('#edit_nama_barang').val(nama);
                $('#edit_stok').val(stok);
                $('#edit_kategori').val(kategori);
                $('#edit_harga').val(harga);
                $('#edit_supplier').val(supplier);

                // Update form action untuk edit
                let url = "{{ route('barang.update', ':id') }}";
                url = url.replace(':id', id);
                $('#editBarangForm').attr('action', url);
            });
        });
    </script>
@endpush
