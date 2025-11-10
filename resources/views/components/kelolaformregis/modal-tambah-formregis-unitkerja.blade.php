<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModalUnit" tabindex="-1" aria-labelledby="tambahDataLabelUnit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataLabelUnit">Tambah Unit Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('unitkerja.store') }}" method="POST">
        @csrf
        <input type="hidden" name="modal" value="tambahUnit">
        <div class="modal-body">
          <div class="mb-3">
            <label for="unitkerja" class="form-label">Unit Kerja</label>
            <input type="text"
                   class="form-control @error('unitkerja') is-invalid @enderror"
                   id="unitkerja"
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

{{-- Buka otomatis modal tambah jika error --}}
@if ($errors->any() && old('modal') === 'tambahUnit')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const tambahModal = new bootstrap.Modal(document.getElementById('tambahDataModalUnit'));
      tambahModal.show();
    });
  </script>
@endif
