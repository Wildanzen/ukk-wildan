<!-- resources/views/supplier/modal.blade.php -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierLabel">Tambah Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="supplierForm" action="{{ route('supplier.store') }}" method="POST" onsubmit="return validateForm()">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Supplier</label>
                        <input type="text" name="nama_supplier" id="nama" class="form-control">
                        <small id="namaError" class="text-danger" style="display:none;"></small>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        <small id="alamatError" class="text-danger" style="display:none;"></small>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" name="kontak" id="telepon" class="form-control">
                        <small id="kontakError" class="text-danger" style="display:none;"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="supplierForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        // Clear previous error messages
        document.getElementById('namaError').style.display = 'none';
        document.getElementById('alamatError').style.display = 'none';
        document.getElementById('kontakError').style.display = 'none';

        let isValid = true;

        // Validate Nama Supplier
        const nama = document.getElementById('nama').value;
        if (nama.trim() === '') {
            document.getElementById('namaError').innerText = 'Nama Supplier wajib diisi.';
            document.getElementById('namaError').style.display = 'block';
            isValid = false;
        }

        // Validate Alamat
        const alamat = document.getElementById('alamat').value;
        if (alamat.trim() === '') {
            document.getElementById('alamatError').innerText = 'Alamat wajib diisi.';
            document.getElementById('alamatError').style.display = 'block';
            isValid = false;
        }

        // Validate Telepon
        const kontak = document.getElementById('telepon').value;
        if (kontak.trim() === '') {
            document.getElementById('kontakError').innerText = 'Telepon wajib diisi.';
            document.getElementById('kontakError').style.display = 'block';
            isValid = false;
        } else if (!/^\d+$/.test(kontak)) {  // Check if the contact is numeric
            document.getElementById('kontakError').innerText = 'Telepon hanya boleh berupa angka.';
            document.getElementById('kontakError').style.display = 'block';
            isValid = false;
        }

        return isValid;
    }
</script>
