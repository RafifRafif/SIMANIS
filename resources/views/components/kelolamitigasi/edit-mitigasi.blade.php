<!-- Modal Tambah Data -->
<div class="modal fade" id="editDataMitigasiModal" tabindex="-1" aria-labelledby="editDataMitigasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataMitigasiLabel">Edit Mitigasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <div class="mb-3">
                            <select class="form-select" id="triwulan" name="triwulan" required>
                              <option value="" selected disabled>triwulan</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>
                          </div>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun " required>
                    </div>

                    <div class="mb-3">
                        <label for="isuresiko" class="form-label">Isu/resiko</label>
                        <input type="text" class="form-control" id="isuresiko" name="isuresiko" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="rencanaaksi" class="form-label">Tindak Lanjut</label>
                        <input type="text" class="form-control mb-2" id="rencanaaksi" name="rencanaaksi" placeholder="Rencana Aksi" required>
                        <input type="date" class="form-control" id="tanggalpelaksanaan" name="tanggalpelaksanaan" placeholder="Tanggal Pelaksanaan" required>
                    </div>

                    <div class="mb-3">
                        <label for="evaluasi" class="form-label">Evaluasi</label>
                        <input type="text" class="form-control mb-2" id="hasiltibndaklanjut" name="hasiltindaklanjut" placeholder="Hasil Tindak Lanjut" required>
                        <input type="date" class="form-control" id="tanggalevaluasi" name="tanggalevaluasi" placeholder="Tanggal Evaluasi" required>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <select class="form-select" id="statuspelaksanaan" name="statuspelaksanaan" required>
                              <option value="" selected disabled>Status Pelaksanaan</option>
                              <option value="opened">Opened</option>
                              <option value="closed">Closed</option>
                            </select>
                          </div>
                        <input type="text" class="form-control" id="hasilpenerapan" name="hasilpenerapan" placeholder="Hasil Penerapan Manajemen Risiko " required>
                    </div>
                    

 
                    <button type="submit" class="btn btn-primary w-100"></i>Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>