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
                            @foreach ($unitKerja as $unit)
                                <option value="{{ $unit->id }}"
                                    data-key="{{ strtolower($unit->kode ?? $unit->nama_unit) }}">{{ $unit->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                        <p style="font-size: 0.9rem; color: red; margin-top: 5px;">
                            *Kosongkan kolom Unit Kerja jika pengguna hanya memiliki peran sebagai Auditor.
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const unitSelect = document.getElementById('role1'); // unit_kerja select
        const roleSelect = document.getElementById('role2'); // role select

        // helper: enable/disable role options by value
        function setRoleOptions(allowedValues) {
            // allowedValues = array of allowed role values e.g. ['p4m']
            Array.from(roleSelect.options).forEach(opt => {
                if (!opt.value) return; // skip placeholder
                opt.disabled = !allowedValues.includes(opt.value);
                // optionally hide disabled options:
                // opt.style.display = allowedValues.includes(opt.value) ? '' : 'none';
            });

            // if current selected role is disabled -> reset to placeholder
            if (roleSelect.selectedOptions.length > 0 && roleSelect.selectedOptions[0].disabled) {
                roleSelect.value = ''; // set to placeholder (value="")
            }
        }

        // mapping: unitNameLowerCase -> allowed role values (value attributes used in form)
        function allowedRolesForUnit(unitName) {
            if (!unitName) {
                return ['auditor']; // no unit chosen => only auditor
            }
            const name = unitName.toLowerCase();
            if (name.includes('p4m')) {
                return ['p4m'];
            }
            if (name.includes('manajemen')) {
                return ['manajemen'];
            }
            // other units
            return ['kepala_unit', 'auditor'];
        }

        // on initial load ensure roles follow selection (if editing modal prefilled)
        (function init() {
            const selectedUnitText = unitSelect.options[unitSelect.selectedIndex]?.text || '';
            setRoleOptions(allowedRolesForUnit(selectedUnitText));
        })();

        unitSelect.addEventListener('change', function () {
            const selectedText = this.options[this.selectedIndex]?.text || '';
            setRoleOptions(allowedRolesForUnit(selectedText));
        });
    });
</script>