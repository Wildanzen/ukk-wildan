<!-- resources/views/partials/_modal_create.blade.php -->

<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.store') }}" method="POST" id="createBarangForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                        <div id="namaError" class="text-danger" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div id="kategoriError" class="text-danger" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                        <div id="hargaError" class="text-danger" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control">
                        <div id="stokError" class="text-danger" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-select">
                            <option value="">-- Pilih Supplier --</option>
                            @foreach ($supplier as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                            @endforeach
                        </select>
                        <div id="supplierError" class="text-danger" style="display: none;"></div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        // Clear previous error messages
        document.getElementById('namaError').style.display = 'none';
        document.getElementById('kategoriError').style.display = 'none';
        document.getElementById('hargaError').style.display = 'none';
        document.getElementById('stokError').style.display = 'none';
        document.getElementById('supplierError').style.display = 'none';

        let isValid = true;

        // Validate Nama Barang
        const namaBarang = document.getElementById('nama_barang').value;
        if (namaBarang.trim() === '') {
            document.getElementById('namaError').innerText = 'Nama Barang wajib diisi.';
            document.getElementById('namaError').style.display = 'block';
            isValid = false;
        }

        // Validate Kategori
        const kategori = document.getElementById('kategori_id').value;
        if (kategori.trim() === '') {
            document.getElementById('kategoriError').innerText = 'Kategori wajib dipilih.';
            document.getElementById('kategoriError').style.display = 'block';
            isValid = false;
        }

        // Validate Harga
        const harga = document.getElementById('harga').value;
        if (harga.trim() === '' || harga <= 0) {
            document.getElementById('hargaError').innerText = 'Harga wajib diisi dengan angka yang valid.';
            document.getElementById('hargaError').style.display = 'block';
            isValid = false;
        }

        // Validate Stok
        const stok = document.getElementById('stok').value;
        if (stok.trim() === '' || stok <= 0) {
            document.getElementById('stokError').innerText = 'Stok wajib diisi dengan angka yang valid.';
            document.getElementById('stokError').style.display = 'block';
            isValid = false;
        }

        // Validate Supplier (Optional)
        const supplier = document.getElementById('supplier_id').value;
        if (supplier.trim() === '') {
            document.getElementById('supplierError').innerText = 'Supplier tidak wajib diisi.';
            document.getElementById('supplierError').style.display = 'block';
        }

        return isValid;
    }
</script>
