<div class="modal fade" id="editSupplierModal{{ $supplier->id }}" tabindex="-1"
    aria-labelledby="editSupplierModalLabel{{ $supplier->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSupplierModalLabel{{ $supplier->id }}">Edit Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSupplierForm{{ $supplier->id }}" action="{{ route('supplier.update', $supplier->id) }}"
                    method="POST" enctype="multipart/form-data"
                    onsubmit="return validateEditForm({{ $supplier->id }})">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_supplier{{ $supplier->id }}" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier{{ $supplier->id }}"
                            name="nama_supplier" value="{{ $supplier->nama_supplier }}">
                        <small id="namaError{{ $supplier->id }}" class="text-danger" style="display:none;"></small>
                    </div>
                    <div class="mb-3">
                        <label for="alamat{{ $supplier->id }}" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat{{ $supplier->id }}" name="alamat">{{ $supplier->alamat }}</textarea>
                        <small id="alamatError{{ $supplier->id }}" class="text-danger" style="display:none;"></small>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="kontak{{ $supplier->id }}" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="kontak{{ $supplier->id }}" name="kontak"
                                value="{{ $supplier->kontak }}" pattern="\d+" title="Hanya angka yang diperbolehkan">
                            <small id="kontakError{{ $supplier->id }}" class="text-danger"
                                style="display:none;"></small>
                        </div>
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

<script>
    function validateEditForm(id) {
        // Clear previous error messages
        document.getElementById('namaError' + id).style.display = 'none';
        document.getElementById('alamatError' + id).style.display = 'none';
        document.getElementById('kontakError' + id).style.display = 'none';

        let isValid = true;

        // Validate Nama Supplier
        const nama = document.getElementById('nama_supplier' + id).value;
        if (nama.trim() === '') {
            document.getElementById('namaError' + id).innerText = 'Nama Supplier wajib diisi.';
            document.getElementById('namaError' + id).style.display = 'block';
            isValid = false;
        }

        // Validate Alamat
        const alamat = document.getElementById('alamat' + id).value;
        if (alamat.trim() === '') {
            document.getElementById('alamatError' + id).innerText = 'Alamat wajib diisi.';
            document.getElementById('alamatError' + id).style.display = 'block';
            isValid = false;
        }

        // Validate Telepon
        const kontak = document.getElementById('kontak' + id).value;
        if (kontak.trim() === '') {
            document.getElementById('kontakError' + id).innerText = 'Telepon wajib diisi.';
            document.getElementById('kontakError' + id).style.display = 'block';
            isValid = false;
        } else if (!/^\d+$/.test(kontak)) { // Check if the contact is numeric
            document.getElementById('kontakError' + id).innerText = 'Telepon hanya boleh berupa angka.';
            document.getElementById('kontakError' + id).style.display = 'block';
            isValid = false;
        }

        return isValid;
    }
</script>
