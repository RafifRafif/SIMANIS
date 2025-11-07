<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModalIKU" tabindex="-1" aria-labelledby="editDataLabelIKU" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabelIKU">Edit IKU Terkait</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editIkuForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-iku" class="form-label">IKU Terkait</label>
                        <input type="text" class="form-control" id="edit-iku" name="iku" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.edit-iku-button').forEach(button => {
        button.addEventListener('click', function() {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        document.getElementById('edit-iku').value = nama;
        document.getElementById('editIkuForm').action = `/iku/update/${id}`;
        });
    });
    });
</script>