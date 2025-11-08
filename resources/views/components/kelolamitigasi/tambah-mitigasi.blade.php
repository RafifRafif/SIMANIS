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
                        <select class="form-select" name="triwulan" required>
                            <option value="" selected disabled>Triwulan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="tahun" placeholder="Tahun" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="isurisiko" placeholder="Isu/Risiko">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="rencana_aksi" placeholder="Rencana Aksi" required>
                        <input type="date" class="form-control mt-2" name="tanggal_pelaksanaan">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="hasil_tindak_lanjut" placeholder="Hasil Tindak Lanjut">
                        <input type="date" class="form-control mt-2" name="tanggal_evaluasi">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="status" required>
                            <option value="" selected disabled>Status</option>
                            <option value="opened">Opened</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="hasil_manajemen_risiko" placeholder="Hasil Manajemen Risiko">
                    </div>
                    <div class="mb-3">
                        <input type="url" class="form-control" name="dokumen_pendukung" placeholder="Dokumen Pendukung">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
