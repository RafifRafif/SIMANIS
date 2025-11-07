<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModalProsesAktivitas" tabindex="-1" aria-labelledby="editDataLabelProsesAktivitas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabelProsesAktivitas">Edit Proses/Aktivitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editProsesForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-proses" class="form-label">Proses/Aktivitas</label>
                        <input type="text" class="form-control" id="edit-proses" name="proses" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.edit-proses-button').forEach(button => {
        button.addEventListener('click', function() {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        document.getElementById('edit-proses').value = nama;
        document.getElementById('editProsesForm').action = `/proses/update/${id}`;
        });
    });
    });
</script>