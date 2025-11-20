<!-- Modal Edit Mitigasi -->
<div class="modal fade" id="editDataMitigasiModal" tabindex="-1" aria-labelledby="editDataMitigasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataMitigasiLabel">Edit Mitigasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editMitigasiForm" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_id">

                    <div class="mb-3">
                        <label for="edit_triwulan" class="form-label">Triwulan</label>
                        <select class="form-select" id="edit_triwulan" name="triwulan" required>
                            <option value="" disabled>Pilih Triwulan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="edit_tahun" name="tahun" placeholder="Masukan Tahun" required
                            pattern="\d{4}" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            title="Masukkan tahun (4 digit)">
                    </div>

                    <div class="mb-3">
                        <label for="edit_isurisiko" class="form-label">Isu/Risiko</label>
                        <input type="text" class="form-control" id="edit_isurisiko" name="isurisiko">
                    </div>

                    <div class="mb-3">
                        <label for="edit_rencanaaksi" class="form-label">Rencana Aksi (Kebijakan, Panduan, SOP, alat, Training, dll)</label>
                        <input type="text" class="form-control" id="edit_rencanaaksi" name="rencana_aksi" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_tanggalpelaksanaan" class="form-label">Tanggal Pelakasanaan Rencana Aksi</label>
                        <input type="date" class="form-control" id="edit_tanggalpelaksanaan" name="tanggal_pelaksanaan">
                    </div>

                    <div class="mb-3">
                        <label for="edit_hasiltindaklanjut" class="form-label">Hasil Tindak Lanjut</label>
                        <input type="text" class="form-control" id="edit_hasiltindaklanjut" name="hasil_tindak_lanjut">
                    </div>

                    <div class="mb-3">
                        <label for="edit_tanggalevaluasi" class="form-label">Tanggal Evaluasi</label>
                        <input type="date" class="form-control" id="edit_tanggalevaluasi" name="tanggal_evaluasi">
                    </div>

                    <div class="mb-3">
                        <label for="edit_statuspelaksanaan" class="form-label">Status Pelaksanaan Rencana Aksi</label>
                        <select class="form-select" id="edit_statuspelaksanaan" name="status" required>
                            <option value="" disabled>Pilih Status</option>
                            <option value="opened">Opened</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_hasilpenerapan" class="form-label">Hasil Penerapan Manajemen Risiko</label>
                        <input type="text" class="form-control" id="edit_hasilpenerapan" name="hasil_manajemen_risiko">
                    </div>

                    <div class="mb-3">
                        <label for="edit_dokumenpendukung" class="form-label">Dokumen Pendukung</label>
                        <input type="url" class="form-control" id="edit_dokumenpendukung" name="dokumen_pendukung">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
