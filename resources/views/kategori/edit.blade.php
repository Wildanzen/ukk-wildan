@foreach ($kategori as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editKategoriForm{{ $item->id }}" action="{{ route('kategori.update', $item->id) }}" method="POST" onsubmit="return validateEditKategoriForm({{ $item->id }})">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="form_type" value="edit-{{ $item->id }}">

                        <div class="mb-3">
                            <label for="nama_kategori{{ $item->id }}" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori{{ $item->id }}" value="{{ old('nama_kategori', $item->nama_kategori) }}">
                            <small id="namaKategoriError{{ $item->id }}" class="text-danger" style="display:none;"></small>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function validateEditKategoriForm(id) {
        // Clear previous error messages
        document.getElementById('namaKategoriError' + id).style.display = 'none';

        let isValid = true;

        // Validate Nama Kategori
        const namaKategori = document.getElementById('nama_kategori' + id).value;
        if (namaKategori.trim() === '') {
            document.getElementById('namaKategoriError' + id).innerText = 'Nama Kategori wajib diisi.';
            document.getElementById('namaKategoriError' + id).style.display = 'block';
            isValid = false;
        }

        return isValid;
    }
</script>
