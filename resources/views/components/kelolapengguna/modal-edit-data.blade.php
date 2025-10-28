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
                    <div class="mb-3">
                        <label for="role1" class="form-label">Unit Kerja</label>
                        <select class="form-select" id="role1" name="role1" required>
                            <option value="" selected disabled>Pilih Unit Kerja</option>
                            <option value="P4M">P4M</option>
                            <option value="JUR IF">JUR IF</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="PRODI RKS">PRODI RKS</option>
                            <option value="KAPOKJA">KAPOKJA</option>
                        </select>
                        <p style="font-size: 0.9rem; color: red; margin-top: 5px;">
                            *Jika Anda mengisi Unit Kerja, pengguna ini juga akan menjadi Kepala Unit.
                        </p>
                    </div>
                    <div class="mb-4">
                        <label for="role2" class="form-label">Role</label>
                        <select class="form-select" id="role2" name="role2" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="p4m">P4M</option>
                            <option value="kepala unit">Kepala Unit</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="auditors">Auditors</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div> 