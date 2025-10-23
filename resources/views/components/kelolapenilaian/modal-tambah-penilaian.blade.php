<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahPenilaianAuditorModal" tabindex="-1" aria-labelledby="tambahPenilaianAuditorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenilaianAuditorLabel">Tambah Penilaian Auditor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="form-label" class="form-label">Penilaian</label>
                        <select class="form-select" id="penilaian" name="penilaian" required>
                            <option value="" selected disabled>Pilih Penilaian</option>
                            <option value="terlampaui">Terlampaui</option>
                            <option value="tercapai">Tercapai</option>
                            <option value="tidaktercapai">Tidak Tercapai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="form-label" class="form-label">Uraian</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan Uraian Penilaian"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>