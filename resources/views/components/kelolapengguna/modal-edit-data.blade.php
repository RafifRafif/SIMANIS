<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="edit-nik" name="nik" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-unit" class="form-label">Unit Kerja</label>
                        <select class="form-select" id="edit-unit" name="role1">
                            <option value="">Pilih Unit Kerja</option>
                            @foreach ($unitKerja as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                            @endforeach
                        </select>
                        <p style="font-size: 0.9rem; color: red; margin-top: 5px;">
                            *Kosongkan kolom Unit Kerja jika pengguna hanya memiliki peran sebagai Auditor.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label for="edit-role" class="form-label">Role</label>
                        <select class="form-select" id="edit-role" name="role2" required>
                            <option value="p4m">P4M</option>
                            <option value="kepala_unit">Kepala Unit</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="auditor">Auditor</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('editForm');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const nik = this.getAttribute('data-nik');
            const nama = this.getAttribute('data-nama');
            const unit = this.getAttribute('data-unit');
            const role = this.getAttribute('data-role');

            // Isi form
            editForm.action = `/kelola_pengguna/update/${id}`;
            document.getElementById('edit-nik').value = nik;
            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-unit').value = unit ?? '';
            document.getElementById('edit-role').value = role ?? '';
        });
    });
});
</script>
