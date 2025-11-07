<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModalJenis" tabindex="-1" aria-labelledby="editDataLabelJenis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabelJenis">Edit Jenis Risiko</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editJenisForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-jenis" class="form-label">Jenis Risiko</label>
                        <input type="text" class="form-control" id="edit-jenis" name="jenis" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.edit-jenis-button').forEach(button => {
        button.addEventListener('click', function() {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        document.getElementById('edit-jenis').value = nama;
        document.getElementById('editJenisForm').action = `/jenis/update/${id}`;
        });
    });
    });
</script>