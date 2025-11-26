<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahPenilaianAuditorModal" tabindex="-1" aria-labelledby="tambahPenilaianAuditorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenilaianAuditorLabel">Tambah Review Auditor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penilaian.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mitigasi_id" id="mitigasi_id">

                    <div class="mb-3">
                        <label class="form-label">Catatan Hasil Review</label>
                        <textarea name="uraian" class="form-control" rows="3" placeholder="Masukkan Catatan Hasil Review"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('tambahPenilaianAuditorModal');
            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const mitigasiId = button.getAttribute('data-mitigasi-id');
                modal.querySelector('#mitigasi_id').value = mitigasiId;
            });
        });
    </script>