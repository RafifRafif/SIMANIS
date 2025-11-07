<!-- Modal Edit Data Unit Kerja -->
<div class="modal fade" id="editDataModalUnit" tabindex="-1" aria-labelledby="editDataLabelUnit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDataLabelUnit">Edit Unit Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="editUnitForm" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit-unitkerja" class="form-label">Unit Kerja</label>
            <input type="text" class="form-control" id="edit-unitkerja" name="unitkerja" required>
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
  const editButtons = document.querySelectorAll('.edit-unit-button');
  const editForm = document.getElementById('editUnitForm');

  editButtons.forEach(button => {
    button.addEventListener('click', function () {
      const id = this.getAttribute('data-id');
      const nama = this.getAttribute('data-nama');

      // ubah action form dan isi input
      editForm.action = `/unitkerja/update/${id}`;
      document.getElementById('edit-unitkerja').value = nama;
    });
  });
});
</script>
