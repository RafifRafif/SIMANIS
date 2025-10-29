<!-- Modal Import Data -->
<div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="importDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title fw-bold" id="importDataModalLabel">Import Data Form Regis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <form action="{{ route('formregis.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="small text-muted mb-3">
                        Pastikan file Excel Anda sesuai dengan format yang disediakan.
                        <br>
                        <a href="{{ asset('template/unitkerja.xlsx') }}" download class="text-decoration-none">
                            <i class="fa-solid fa-file-excel me-1 text-success"></i>
                            Unduh Template Excel
                        </a>
                    </p>

                    <div class="mb-3">
                        <label for="file_import" class="form-label fw-semibold">Pilih File Excel</label>
                        <input type="file" name="file" id="file_import"
                            class="form-control" accept=".xls,.xlsx" required>
                        <small class="text-muted d-block mt-1">
                            Format yang diterima: .xls atau .xlsx
                        </small>
                    </div>
                </div>

                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-upload me-1"></i> Upload & Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
