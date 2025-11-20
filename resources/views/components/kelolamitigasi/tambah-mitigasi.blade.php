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
                <h5 class="modal-title">Tambah Mitigasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('mitigasi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="registrasi_id" id="registrasi_id_tambah">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Triwulan</label>
                        <select class="form-select" name="triwulan" required>
                            <option value="" selected disabled>Pilih Triwulan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun" required
                            pattern="\d{4}" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            title="Masukkan tahun (4 digit)">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isu/Risiko</label>
                        <select class="form-select" name="isurisiko" id="select_isurisiko" required>
                            <option value="">Memuat...</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rencana Aksi (Kebijakan, Panduan, SOP, alat, Training, dll)</label>
                        <input type="text" class="form-control" name="rencana_aksi" placeholder="Masukan Rencana Aksi"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pelakasanaan Rencana Aksi</label>
                        <input type="date" class="form-control" name="tanggal_pelaksanaan">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hasil Tindak Lanjut</label>
                        <input type="text" class="form-control" name="hasil_tindak_lanjut"
                            placeholder="Masukan Hasil Tindak Lanjut">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Evaluasi</label>
                        <input type="date" class="form-control" name="tanggal_evaluasi">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Pelaksanaan Rencana Aksi</label>
                        <select class="form-select" name="status" required>
                            <option value="" selected disabled>Status</option>
                            <option value="opened">Opened</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hasil Penerapan Manajemen Risiko</label>
                        <input type="text" class="form-control" name="hasil_manajemen_risiko"
                            placeholder="Masukan Hasil Manajemen Risiko">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dokumen Pendukung</label>
                        <input type="url" class="form-control" name="dokumen_pendukung"
                            placeholder="Tambahkan Dokumen Pendukung">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>