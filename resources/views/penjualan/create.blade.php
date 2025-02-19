<div class="modal fade" id="tambahPenjualanModal" tabindex="-1" aria-labelledby="tambahPenjualanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenjualanModalLabel">Tambah Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penjualan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select name="barang_id" id="barang_id"
                            class="form-select @error('barang_id') is-invalid @enderror">
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('barang_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_barang }} (Rp {{ number_format($item->harga, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}"
                            min="1">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" name="tanggal_penjualan" id="tanggal_penjualan"
                            class="form-control @error('tanggal_penjualan') is-invalid @enderror"
                            value="{{ old('tanggal_penjualan') }}" min="{{ date('Y-m-d') }}">
                        @error('tanggal_penjualan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('#tambahPenjualanModal form');
        const barangSelect = document.getElementById('barang_id');
        const jumlahInput = document.getElementById('jumlah');
        const tanggalInput = document.getElementById('tanggal_penjualan');

        form.addEventListener('submit', function (e) {
            let isValid = true;

            // Hapus pesan error sebelumnya
            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            barangSelect.classList.remove('is-invalid');
            jumlahInput.classList.remove('is-invalid');
            tanggalInput.classList.remove('is-invalid');

            // Validasi Barang
            if (barangSelect.value === '') {
                isValid = false;
                barangSelect.classList.add('is-invalid');
                barangSelect.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Pilih barang terlebih dahulu.</div>');
            }

            // Validasi Jumlah
            if (jumlahInput.value.trim() === '' || jumlahInput.value <= 0) {
                isValid = false;
                jumlahInput.classList.add('is-invalid');
                jumlahInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Jumlah harus lebih dari 0.</div>');
            }

            // Validasi Tanggal Penjualan
            if (tanggalInput.value.trim() === '') {
                isValid = false;
                tanggalInput.classList.add('is-invalid');
                tanggalInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Pilih tanggal penjualan.</div>');
            }

            // Jika ada error, cegah form terkirim
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>
