<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="unitkerja" class="form-label">Unit Kerja</label>
                        <input type="text" class="form-control" id="unitkerja" name="unitkerja" required>
                    </div>
                   
                    <div class="mb-4">
                        <label for="proses" class="form-label">proses</label>
                        <select class="form-select" id="proses" name="proses" required>
                            <option value="" selected disabled>Pilih proses</option>
                            <option value="P4M">Pelaksanaan Pembelajaran</option>
                            <option value="Kepala Unit">Pemasukan Barang</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="form-label">kategori Risiko</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" selected disabled>Pilih kategori</option>
                            <option value="strategis"> Strategis</option>
                            <option value="reputasi">Reputasi</option>
                            <option value="Kecurangan">Kecurangan</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="hukum">Hukum</option>
                            <option value="kepatuhan">Kepatuhan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_risiko" class="form-label">Jenis Risiko</label>
                        <select class="form-select" id="jenis_risiko" name="jenis_risiko" required>
                            <option value="" selected disabled>Pilih Jenis Risiko</option>
                            <option value="integritas"> Integritas</option>
                            <option value="operasional">Operasional</option>
                            <option value="kebijakan">Kebijakan/prosedur</option>
                            <option value="it">IT</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="isuresiko" class="form-label">Isu/resiko</label>
                        <input type="text" class="form-control" id="isuresiko" name="isuresiko" required>
                    </div>

                    <div class="mb-4">
                        <label for="jenis" class="form-label">Jenis Isu</label>
                        <select class="form-select" id="jenis" name="jenis" required>
                            <option value="" selected disabled>Pilih jenis</option>
                            <option value="internal">Internal</option>
                            <option value="eksternal">Eksternal</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="akar" class="form-label">Akar Permasalahan</label>
                        <input type="text" class="form-control" id="akar" name="akar" required>
                    </div>

                    <div class="mb-3">
                        <label for="dampak" class="form-label">Dampak</label>
                        <input type="text" class="form-control" id="dampak" name="dampak" required>
                    </div>

                    <div class="mb-4">
                        <label for="iku" class="form-label">IKU terkait</label>
                        <select class="form-select" id="iku" name="iku" required>
                            <option value="" selected disabled>Pilih IKU</option>
                            <option value="iku1">IKU-1</option>
                            <option value="iku2">IKU-2</option>
                            <option value="iku3">IKU-3</option>
                            <option value="iku4">IKU-4</option>
                            <option value="iku5">IKU-5</option>
                            <option value="iku6">IKU-6</option>
                            <option value="iku7">IKU-7</option>
                            <option value="iku8">IKU-8</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pihak" class="form-label">Pihak terkait</label>
                        <input type="text" class="form-control" id="pihak" name="pihak" required>
                    </div>

                    <div class="mb-3">
                        <label for="kontrol" class="form-label">kontrol/pencegahan</label>
                        <input type="text" class="form-control" id="kontrol" name="kontrol" required>
                    </div>

                    <div class="d-flex align-items-center gap-4 mt-3 mb-3">
                        <!-- Keparahan -->
                        <div class="d-flex align-items-center">
                          <label for="keparahan" class="me-2 fw-medium">Keparahan</label>
                          <select id="keparahan" name="keparahan" class="form-select form-select-sm w-auto">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      
                        <!-- Frekuensi -->
                        <div class="d-flex align-items-center gap-4">
                          <label for="frekuensi" class="me-2 fw-medium">Frekuensi</label>
                          <select id="frekuensi" name="frekuensi" class="form-select form-select-sm w-auto">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                          </select>
                        </div>
                      </div>
                      
                      
                      
 
                    <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>