<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
               <!-- Form edit -->
               <form id="editForm" method="POST">
                @csrf
                <!-- ini akan diubah jadi PUT oleh JavaScript -->
                <input type="hidden" name="_method" id="edit-method" value="PUT">
                <input type="hidden" id="edit-id" name="id">
                    
                     <!-- edit unit kerja -->
                    <div class="mb-4">
                        <label class="form-label">Unit Kerja</label>
                        <select class="form-select" id="edit-unitkerja" name="unit_kerja_id" required>
                            <option value="" selected disabled>Pilih Unit Kerja</option>
                            @foreach ($unitKerja as $u)
                                <option value="{{ $u->id }}">{{ $u->nama_unit }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-4">
                        <label class="form-label">Proses/Aktivitas</label>
                        <select class="form-select" id="edit-proses" name="proses" required>
                            <option value="" disabled selected>-- Pilih Proses/Aktivitas --</option>
                            <option value="manual">Tambah Proses/Aktivitas Manual</option>
                            @foreach ($proses as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_proses }}</option>
                            @endforeach
                        </select>
                    
                        <input type="text"
                            class="form-control mt-2"
                            id="edit-proses-manual"
                            name="proses_manual_text"
                            placeholder="Masukkan Proses/Aktivitas"
                            style="display: none;">
                    </div>
                    
                    

                    <div class="mb-4">
                        <label class="form-label">Kategori Risiko</label>
                        <select class="form-select" id="edit-kategori" name="kategori_risiko_id" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Risiko</label>
                        <select class="form-select" id="edit-jenis" name="jenis_risiko_id" required>
                            <option value="" selected disabled>Pilih Jenis Risiko</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isu / Risiko</label>
                        <input type="text" class="form-control" id="edit-isurisiko" name="isu_resiko" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Isu</label>
                        <select class="form-select" id="edit-jenisisu" name="jenis_isu" required>
                            <option value="" selected disabled>Pilih Jenis Isu</option>
                            <option value="Internal">Internal</option>
                            <option value="Eksternal">Eksternal</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Akar Permasalahan</label>
                        <input type="text" class="form-control" id="edit-akar" name="akar_permasalahan" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dampak</label>
                        <input type="text" class="form-control" id="edit-dampak" name="dampak" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">IKU Terkait</label>
                        <select class="form-select" id="edit-iku" name="iku_terkait_id" required>
                            <option value="" selected disabled>Pilih IKU</option>
                            @foreach ($iku as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_iku }} - {{ $i->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pihak Terkait</label>
                        <input type="text" class="form-control" id="edit-pihak" name="pihak_terkait" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kontrol Pencegahan</label>
                        <input type="text" class="form-control" id="edit-kontrol" name="kontrol_pencegahan" required>
                    </div>

                    <div class="d-flex align-items-center gap-4 mt-3 mb-3">
                        <!-- edit-keparahan -->
                            <div class="d-flex align-items-center">
                                <label for="edit-keparahan" class="me-2 fw-medium">Keparahan</label>
                                <select id="edit-keparahan" name="keparahan" class="form-select form-select-sm" style="min-width: 70px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
    
                            <div class="d-flex align-items-center">
                                <label for="edit-frekuensi" class="me-2 fw-medium">Frekuensi</label>
                                <select id="edit-frekuensi" name="frekuensi" class="form-select form-select-sm" style="min-width: 70px;">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div> 

