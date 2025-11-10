<!-- Modal Edit Data Unit Kerja -->
<div class="modal fade" id="editDataModalUnit" tabindex="-1" aria-labelledby="editDataLabelUnit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDataLabelUnit">Edit Unit Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="editUnitForm" method="POST"
            action="{{ old('edit_id') ? route('unitkerja.update', old('edit_id')) : '' }}">
        @csrf
        <input type="hidden" name="modal" value="editUnit">
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit-unitkerja" class="form-label">Unit Kerja</label>
            <input type="text"
                   class="form-control @error('unitkerja') is-invalid @enderror"
                   id="edit-unitkerja"
                   name="unitkerja"
                   value="{{ old('unitkerja') }}"
                   required>

            @error('unitkerja')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Buka otomatis modal edit kalau error --}}
@if ($errors->any() && old('modal') === 'editUnit')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const editModal = new bootstrap.Modal(document.getElementById('editDataModalUnit'));
      editModal.show();
    });
  </script>
@endif

{{-- Script untuk Isi data modal edit --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.edit-unit-button').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        document.getElementById('edit-unitkerja').value = nama;
        document.getElementById('editUnitForm').action = `/unitkerja/update/${id}`;
      });
    });
  });
</script>
