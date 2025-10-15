<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>

                    <!-- File -->
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn w-100 text-white fw-semibold" style="background-color:#007BFF;">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
