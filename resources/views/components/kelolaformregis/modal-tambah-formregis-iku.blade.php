<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModalIKU" tabindex="-1" aria-labelledby="tambahDataLabelIKU" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabelIKU">Tambah IKU Terkait</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('iku.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="iku" class="form-label">IKU Terkait</label>
                        <input type="text" class="form-control" id="iku" name="iku" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>