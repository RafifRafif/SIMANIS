<!-- Modal Tambah Data -->
<style>
    .form-control,
    .form-select {
        border-radius: 8px;
        height: 42px;
        padding: 8px 12px;
        font-size: 0.95rem;
    }

    /* Hilangkan tampilan default ikon agar seragam di semua browser */
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        right: 10px;
        top: 83%;
        transform: translateY(-50%);
        /* ini yang bikin ikon sejajar vertikal */
        cursor: pointer;
    }

    .mb-3 {
        position: relative;
    }
</style>
<div class="modal fade" id="tambahDataMitigasiModal" tabindex="-1" aria-labelledby="tambahDataMitigasiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataMitigasiLabel">Tambah Mitigasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <div class="mb-3">
                            <select class="form-select" id="triwulan" name="triwulan" required>
                                <option value="" selected disabled>Triwulan</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun " required>
                    </div>

                    <div class="mb-3">
                        <label for="isurisiko" class="form-label">Isu/Risiko</label>
                        <input type="text" class="form-control" id="isurisiko" name="isurisiko" required>
                    </div>

                    <div class="mb-3">
                        <label for="rencanaaksi" class="form-label">Tindak Lanjut</label>
                        <input type="text" class="form-control mb-2" id="rencanaaksi" name="rencanaaksi"
                            placeholder="Rencana Aksi" required>
                        <input type="date" class="form-control" id="tanggalpelaksanaan" name="tanggalpelaksanaan"
                            placeholder="Tanggal Pelaksanaan" required>
                    </div>

                    <div class="mb-3">
                        <label for="evaluasi" class="form-label">Evaluasi</label>
                        <input type="text" class="form-control mb-2" id="hasiltibndaklanjut" name="hasiltindaklanjut"
                            placeholder="Hasil Tindak Lanjut" required>
                        <input type="date" class="form-control" id="tanggalevaluasi" name="tanggalevaluasi"
                            placeholder="Tanggal Evaluasi" required>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <select class="form-select" id="statuspelaksanaan" name="statuspelaksanaan" required>
                                <option value="" selected disabled>Status Pelaksanaan</option>
                                <option value="opened">Opened</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" id="hasilpenerapan" name="hasilpenerapan"
                            placeholder="Hasil Penerapan Manajemen Risiko " required>
                    </div>
                    <div class="mb-3">
                        <label for="dokumenpendukung" class="form-label">Dokumen Pendukung</label>
                        <input type="url" class="form-control" id="dokumenpendukung" name="dokumenpendukung"
                            placeholder="Tambah Dokumen Pendukung" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>