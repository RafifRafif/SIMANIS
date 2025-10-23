<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="edit-nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="edit-nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required>
                    </div>
                    <div class="mb-4">
                        <label for="role1" class="form-label">Role 1</label>
                        <select class="form-select" id="role1" name="role1" required>
                            <option value="" selected disabled>Pilih Role 1</option>
                            <option value="P4M">P4M</option>
                            <option value="Kepala Unit">Kepala Unit</option>
                            <option value="Manajemen">Manajemen</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="role2" class="form-label">Role 2</label>
                        <select class="form-select" id="role2" name="role2" required>
                            <option value="" selected disabled>Pilih Role 2</option>
                            <option value="auditors">Auditors</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div> 