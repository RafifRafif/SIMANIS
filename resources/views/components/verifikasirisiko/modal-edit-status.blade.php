<!-- Modal Edit Status -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusLabel">Edit Status Verifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="edit-status" class="form-label">Status Verifikasi</label>
                        <select class="form-select" id="edit-status" name="status" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                            <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>