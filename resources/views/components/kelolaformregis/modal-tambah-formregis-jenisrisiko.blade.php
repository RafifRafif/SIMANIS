<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModalJenis" tabindex="-1" aria-labelledby="tambahDataLabelJenis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabelJenis">Tambah Jenis Risiko</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jenis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Risiko</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>