<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelola_pengguna.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="role1" class="form-label">Unit Kerja</label>
                        <select class="form-select" id="role1" name="role1">
                            <option value="" selected disabled>Pilih Unit Kerja</option>
                            @foreach ($unitKerjas as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                            @endforeach
                        </select>
                        <p style="font-size: 0.9rem; color: red; margin-top: 5px;">
                            *Jika Anda mengisi Unit Kerja, pengguna ini juga akan menjadi Kepala Unit.
                        </p>
                    </div>
                    <div class="mb-4">
                        <label for="role2" class="form-label">Role</label>
                        <select class="form-select" id="role2" name="role2" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="p4m">P4M</option>
                            <option value="kepala_unit">Kepala Unit</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="auditor">Auditor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>