@extends('layouts.app_modern', ['title' => 'Daftar Kategori'])

@section('content')
    <div class="card">
        <h5 class="card-header">Daftar Kategori</h5>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#kategoriModal">
                Tambah Kategori
            </button>

            @if (session('success'))
                <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger fade show" role="alert">{{ session('error') }}</div>
            @endif

            <table id="kategoriTable" class="table table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#showModal{{ $item->id }}">
                                     Lihat
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data kategori tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($kategori as $item)
        <!-- Show Modal -->
        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel{{ $item->id }}">Detail Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama Kategori:</strong> {{ $item->nama_kategori }}</p>
                        <p><strong>Produk Terkait:</strong></p>
                        @if ($item->products && $item->products->isEmpty())
                            <p>Tidak ada produk terkait.</p>
                        @elseif ($item->products)
                            <ul>
                                @foreach ($item->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Produk terkait tidak ditemukan.</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('kategori.create')
    @include('kategori.edit')
@endsection

@push('scripts')
    <!-- Tambahkan jQuery dan DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kategoriTable').DataTable({
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

            // Menghilangkan notifikasi setelah 4 detik
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 4000);
        });
    </script>
@endpush
