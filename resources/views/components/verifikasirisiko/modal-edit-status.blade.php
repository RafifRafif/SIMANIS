<!-- Modal Edit Status -->
<style>
    .modal-dialog.modal-md-custom {
        max-width: 340px;
    }
</style>
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md-custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusLabel">Ubah Status Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="Belum Terverifikasi">
                            <label class="form-check-label" for="status1">Belum Terverifikasi</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="Terverifikasi" required>
                            <label class="form-check-label" for="status2">Terverifikasi</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>