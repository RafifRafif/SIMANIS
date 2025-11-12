<!-- Modal Edit Data -->
<div class="modal fade" id="editPenilaianAuditorModal" tabindex="-1" aria-labelledby="editPenilaianAuditorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPenilaianAuditorLabel">Edit Penilaian Auditor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Form update penilaian --}}
                <form action="{{ route('penilaian.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- hidden input --}}
                    <input type="hidden" name="id_penilaian" id="edit-id-penilaian">
                    <input type="hidden" name="mitigasi_id" id="edit-mitigasi-id">

                    <div class="mb-3">
                        <label class="form-label">Penilaian</label>
                        <select class="form-select" id="edit-penilaian" name="penilaian" required>
                            <option value="" disabled>Pilih Penilaian</option>
                            <option value="terlampaui">Terlampaui</option>
                            <option value="tercapai">Tercapai</option>
                            <option value="tidaktercapai">Tidak Tercapai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uraian</label>
                        <textarea class="form-control" id="edit-uraian" name="uraian" rows="3"
                            placeholder="Masukkan Uraian Penilaian"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editPenilaianAuditorModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Ambil data dari tombol
        const id = button.getAttribute('data-id');
        const mitigasiId = button.getAttribute('data-mitigasi-id');
        const penilaian = button.getAttribute('data-penilaian');
        const uraian = button.getAttribute('data-uraian');

        // Masukkan ke field modal
        editModal.querySelector('#edit-id-penilaian').value = id;
        editModal.querySelector('#edit-mitigasi-id').value = mitigasiId;
        editModal.querySelector('#edit-penilaian').value = penilaian;
        editModal.querySelector('#edit-uraian').value = uraian;
    });
});
</script>
