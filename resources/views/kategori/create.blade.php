<!-- resources/views/modal/create_modal.blade.php -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST" id="kategoriForm">
                    @csrf
                    <input type="hidden" name="form_type" value="tambah">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori"
                               class="form-control" id="nama_kategori">
                        <div class="invalid-feedback" id="nama_kategori_error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('kategoriForm');
        const input = form.querySelector('#nama_kategori');
        const errorFeedback = document.getElementById('nama_kategori_error');

        form.addEventListener('submit', function(e) {
            // Clear previous error messages
            input.classList.remove('is-invalid');
            errorFeedback.textContent = '';

            // Client-side validation: check if the input is empty
            if (input.value.trim() === '') {
                e.preventDefault();  // Prevent form submission
                input.classList.add('is-invalid');
                errorFeedback.textContent = 'Nama kategori tidak boleh kosong.';
            }
        });
    });
</script>
