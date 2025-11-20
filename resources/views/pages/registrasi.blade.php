@extends('layouts.registrasi')

@section('title', 'Registrasi')

@push('modals')
    @include('components.kelolaregistrasi.modal-tambah-data')
    @include('components.kelolaregistrasi.modal-edit-data')
    @include('components.kelolaregistrasi.modal-hapus-data')
    @include('components.kelolamitigasi.tambah-mitigasi')
    @include('components.kelolamitigasi.edit-mitigasi')
    @include('components.kelolamitigasi.hapus-mitigasi')
    @include('components.kelolapenilaian.modal-tambah-penilaian')
    @include('components.kelolapenilaian.modal-edit-penilaian')
    @include('components.kelolapenilaian.modal-hapus-penilaian')
@endpush

@section('content')
    <!-- Konten -->
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <h3 class="mt-3 mb-3">Registrasi Dan Mitigasi</h3>
    <h6 class="fw-bold mb-3">
        Unit Kerja: <span style="color: #1E376C;">{{ Auth::user()->unitKerja->nama_unit ?? '-' }}</span>
    </h6>

    <!-- Pencarian dan Dropdown -->
    <div class="d-flex mb-4 gap-2">
        <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            <i class="fa-solid fa-plus"></i> Tambah
        </button>
    </div>

    <!-- Card Wrapper -->
    <div class="card shadow-sm border-1">
        <div class="card-body">
            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-hover align-middle table-bordered">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th>#</th>
                            <th>Unit Kerja</th>
                            <th>Proses/Aktifitas</th>
                            <th>Kategori Risiko</th>
                            <th>Jenis Risiko</th>
                            <th>Isu/Risiko</th>
                            <th>Jenis Isu</th>
                            <th>Akar Permasalahan</th>
                            <th>Dampak</th>
                            <th>IKU Terkait</th>
                            <th>Pihak Terkait</th>
                            <th>Kontrol/Pencegahan Saat Ini/Sistem Saat Ini</th>
                            <th>Keparahan</th>
                            <th>Frekuensi</th>
                            <th>Probabilitas</th>
                            <th>Status Registrasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrasi as $item)
                            <tr>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary toggle-collapse" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#mitigasi{{ $item->id_registrasi }}"
                                        aria-expanded="false" aria-controls="mitigasi{{ $item->id_registrasi }}">
                                        +
                                    </button>
                                </td>
                                <td>{{ $item->unitKerja->nama_unit ?? '-' }}</td>
                                <td>{{ $item->proses_aktivitas_id ? $item->prosesAktivitas->nama_proses : $item->proses_manual }}</td>
                                <td>{{ $item->kategoriRisiko->nama_kategori ?? '-' }}</td>
                                <td>{{ $item->jenisRisiko->nama_jenis ?? '-' }}</td>
                                <td>{{ $item->isu_resiko }}</td>
                                <td>{{ $item->jenis_isu }}</td>
                                <td>{{ $item->akar_permasalahan }}</td>
                                <td>{{ $item->dampak }}</td>
                                <td>{{ $item->ikuTerkait->nama_iku ?? '-' }}</td>
                                <td>{{ $item->pihak_terkait }}</td>
                                <td>{{ $item->kontrol_pencegahan }}</td>
                                <td>{{ $item->keparahan }}</td>
                                <td>{{ $item->frekuensi }}</td>
                                <td>{{ $item->probabilitas }}</td>
                                <td>{{ $item->status_registrasi }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-primary edit-button"
                                            data-id="{{ $item->id_registrasi }}"
                                            data-unitkerja="{{ $item->unit_kerja_id }}"
                                            data-prosesid="{{ $item->proses_aktivitas_id }}"
                                            data-prosesmanual="{{ $item->proses_manual }}"
                                            data-kategori="{{ $item->kategori_risiko_id }}"
                                            data-jenis="{{ $item->jenis_risiko_id }}"
                                            data-isuresiko="{{ $item->isu_resiko }}"
                                            data-jenisisu="{{ $item->jenis_isu }}"
                                            data-akar="{{ $item->akar_permasalahan }}"
                                            data-dampak="{{ $item->dampak }}"
                                            data-iku="{{ $item->iku_terkait_id }}"
                                            data-pihak="{{ $item->pihak_terkait }}"
                                            data-kontrol="{{ $item->kontrol_pencegahan }}"
                                            data-keparahan="{{ $item->keparahan }}"
                                            data-frekuensi="{{ $item->frekuensi }}"
                                            data-probabilitas="{{ $item->probabilitas }}"
                                            data-bs-toggle="modal" data-bs-target="#editDataModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-sm btn-danger delete-registrasi-button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#hapusRegistrasiModal"
                                            data-id="{{ $item->id_registrasi }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Collapse Mitigasi -->
                            <tr class="collapse bg-light" id="mitigasi{{ $item->id_registrasi }}">
                                <td colspan="17">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            @php
                                                $sudahClosed = $item->mitigasis->contains('status', 'closed');
                                            @endphp

                                            @if ($item->status_registrasi != 'Terverifikasi')
                                                <!-- Registrasi belum diverifikasi -->
                                                <button class="btn btn-secondary fw-bold" disabled>
                                                    <i class="fa-solid fa-lock"></i> Menunggu Verifikasi
                                                </button>

                                            @elseif (!$sudahClosed)
                                                <!-- Sudah diverifikasi dan mitigasi belum closed -->
                                                <button class="btn btn-primary fw-bold"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tambahDataMitigasiModal"
                                                    data-regid="{{ $item->id_registrasi }}"
                                                    data-isurisiko="{{ $item->isu_resiko }}">
                                                    <i class="fa-solid fa-plus"></i> Tambah Mitigasi
                                                </button>

                                            @else
                                                <!-- Sudah diverifikasi tapi mitigasi sudah closed -->
                                                <button class="btn btn-secondary fw-bold" disabled>
                                                    <i class="fa-solid fa-lock"></i> Mitigasi Sudah Closed
                                                </button>
                                            @endif
                                        </div>

                                        <!-- Bagian mitigasi -->
                                        <table class="table table-sm table-bordered">
                                            <thead class="table-secondary text-center">
                                                <tr>
                                                    <th rowspan="2">Triwulan</th>
                                                    <th rowspan="2">Isu/Risiko</th>
                                                    <th colspan="2">Tindak Lanjut</th>
                                                    <th colspan="2">Evaluasi</th>
                                                    <th rowspan="2">Status Pelaksanaan Rencana Aksi</th>
                                                    <th rowspan="2">Hasil Penerapan Manajemen Risiko</th>
                                                    <th rowspan="2">Dokumen Pendukung</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th>Rencana Aksi</th>
                                                    <th>Tanggal Pelaksanaan Rencana Aksi</th>
                                                    <th>Hasil Tindak Lanjut</th>
                                                    <th>Tanggal Evaluasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($item->mitigasis && $item->mitigasis->count())
                                                    @foreach($item->mitigasis as $m)
                                                        <tr>
                                                            <td>{{ $m->triwulan }} / {{ $m->tahun }}</td>
                                                            <td>{{ $m->isurisiko }}</td>
                                                            <td>{{ $m->rencana_aksi }}</td>
                                                            <td>{{ $m->tanggal_pelaksanaan ?? '-' }}</td>
                                                            <td>{{ $m->hasil_tindak_lanjut ?? '-' }}</td>
                                                            <td>{{ $m->tanggal_evaluasi ?? '-' }}</td>
                                                            <td>{{ ucfirst($m->status) }}</td>
                                                            <td>{{ $m->hasil_manajemen_risiko ?? '-' }}</td>
                                                            <td class="text-center align-middle">
                                                                @if($m->dokumen_pendukung)
                                                                    <a href="{{ $m->dokumen_pendukung }}" target="_blank" 
                                                                       class="btn btn-sm btn-secondary">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    <button class="btn btn-sm btn-primary edit-mitigasi"
                                                                        data-id="{{ $m->id_mitigasi }}"
                                                                        data-triwulan="{{ $m->triwulan }}"
                                                                        data-tahun="{{ $m->tahun }}"
                                                                        data-isurisiko="{{ $m->isurisiko }}"
                                                                        data-rencana="{{ $m->rencana_aksi }}"
                                                                        data-tanggal="{{ $m->tanggal_pelaksanaan }}"
                                                                        data-hasil="{{ $m->hasil_tindak_lanjut }}"
                                                                        data-evaluasi="{{ $m->tanggal_evaluasi }}"
                                                                        data-status="{{ $m->status }}"
                                                                        data-manajemen="{{ $m->hasil_manajemen_risiko }}"
                                                                        data-dok="{{ $m->dokumen_pendukung }}"
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#editDataMitigasiModal">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </button>
                                                                    

                                                                    <button class="btn btn-sm btn-danger delete-mitigasi-button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#hapusMitigasiModal"
                                                                        data-id="{{ $m->id_mitigasi }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="16" class="text-center text-muted">Belum Ada Mitigasi.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        {{-- Bagian Penilaian Auditor --}}
                                        @php
                                            $closedMitigasi = $item->mitigasis->where('status', 'closed');
                                        @endphp

                                        @if ($closedMitigasi->count())
                                            <div class="mt-4">

                                                <table class="table table-sm table-bordered mb-0">
                                                    <thead class="table-secondary text-center">
                                                        <tr>
                                                            <th>Triwulan</th>
                                                            <th>Penilaian</th>
                                                            <th>Uraian</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($closedMitigasi as $cm)
                                                            @forelse ($cm->penilaian as $p)
                                                                <tr>
                                                                    <td class="centered">{{ $p->triwulan_tahun }}</td>
                                                                    <td class="centered">
                                                                        @php
                                                                            $label = [
                                                                                'tercapai' => 'Tercapai',
                                                                                'terlampaui' => 'Terlampaui',
                                                                                'tidaktercapai' => 'Tidak Tercapai',
                                                                            ][$p->penilaian] ?? ucfirst($p->penilaian);
                                                                        @endphp
                                                                        {{ $label }}
                                                                    </td>
                                                                    <td>{{ $p->uraian ?? '-' }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="3" class="text-center text-muted">Belum ada penilaian auditor</td>
                                                                </tr>
                                                            @endforelse
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Bagian tombol + / − ---
            document.querySelectorAll('.toggle-collapse').forEach(button => {
                const targetSelector = button.getAttribute('data-bs-target');
                const target = document.querySelector(targetSelector);

                const collapseInstance = new bootstrap.Collapse(target, {
                    toggle: false
                });

                target.addEventListener('shown.bs.collapse', () => {
                    button.textContent = '−';
                });

                target.addEventListener('hidden.bs.collapse', () => {
                    button.textContent = '+';
                });
            });

            // --- Bagian tombol Edit Registrasi ---
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById('editForm');
                    form.action = `/registrasi/${id}`;
                    document.getElementById('edit-method').value = 'PUT';
                    document.getElementById('edit-id').value = id;

                    document.getElementById('edit-unitkerja').value = this.getAttribute('data-unitkerja') || '';
                    document.getElementById('edit-proses').value = this.getAttribute('data-proses') || '';
                    document.getElementById('edit-kategori').value = this.getAttribute('data-kategori') || '';
                    document.getElementById('edit-jenis').value = this.getAttribute('data-jenis') || '';
                    document.getElementById('edit-isurisiko').value = this.getAttribute('data-isuresiko') || '';
                    document.getElementById('edit-jenisisu').value = this.getAttribute('data-jenisisu') || '';
                    document.getElementById('edit-akar').value = this.getAttribute('data-akar') || '';
                    document.getElementById('edit-dampak').value = this.getAttribute('data-dampak') || '';
                    document.getElementById('edit-iku').value = this.getAttribute('data-iku') || '';
                    document.getElementById('edit-pihak').value = this.getAttribute('data-pihak') || '';
                    document.getElementById('edit-kontrol').value = this.getAttribute('data-kontrol') || '';
                    document.getElementById('edit-keparahan').value = this.getAttribute('data-keparahan') || '';
                    document.getElementById('edit-frekuensi').value = this.getAttribute('data-frekuensi') || '';

                    const modal = new bootstrap.Modal(document.getElementById('editDataModal'));
                    modal.show();
                });
            });

            // --- Tombol tambah mitigasi ---
            const tambahButtons = document.querySelectorAll('button[data-bs-target="#tambahDataMitigasiModal"]');
            tambahButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const regId = this.getAttribute('data-regid');
                    document.getElementById('registrasi_id_tambah').value = regId;

                    const isu = this.getAttribute('data-isurisiko');
                    const select = document.getElementById('select_isurisiko');
                    select.innerHTML = `<option value="${isu}" selected>${isu}</option>`;
                });
            });
        });

        // --- Edit Modal Mitigasi ---
        document.querySelectorAll('.edit-mitigasi').forEach(button => {
            button.addEventListener('click', function () {
                if (this.classList.contains('disabled')) {
            return; // gak buka modal kalau status closed
        }
        
                const id = this.getAttribute('data-id');
                const form = document.getElementById('editMitigasiForm');
                form.action = '/mitigasi/' + id;

                // Isi form dengan data dari tombol
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_triwulan').value = this.getAttribute('data-triwulan');
                document.getElementById('edit_tahun').value = this.getAttribute('data-tahun');
                document.getElementById('edit_isurisiko').value = this.getAttribute('data-isurisiko');
                document.getElementById('edit_rencanaaksi').value = this.getAttribute('data-rencana');
                document.getElementById('edit_tanggalpelaksanaan').value = this.getAttribute('data-tanggal');
                document.getElementById('edit_hasiltindaklanjut').value = this.getAttribute('data-hasil');
                document.getElementById('edit_tanggalevaluasi').value = this.getAttribute('data-evaluasi');
                document.getElementById('edit_statuspelaksanaan').value = this.getAttribute('data-status');
                document.getElementById('edit_hasilpenerapan').value = this.getAttribute('data-manajemen');
                document.getElementById('edit_dokumenpendukung').value = this.getAttribute('data-dok');
            });
        });
    </script>

    {{-- Script untuk alert CRUD --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @php
                $success = session()->pull('success');
                $error = session()->pull('error');
            @endphp

            @if ($success)
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ $success }}',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            @endif

            @if ($error)
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ $error }}',
                    showConfirmButton: true,
                });
            @endif
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        
            function toggleManualInput(dropdown, manualInput) {
                if (dropdown.value === "manual") {
                    manualInput.style.display = "block";
                    manualInput.name = "proses";
                    dropdown.removeAttribute("name");
                } else {
                    manualInput.style.display = "none";
                    manualInput.value = "";
                    manualInput.removeAttribute("name");
                    dropdown.setAttribute("name", "proses");
                }
            }
        
            // =============== ADD FORM ===============
            const addDropdown = document.getElementById("proses_aktivitas");
            const addManual = document.getElementById("proses_manual_input");
        
            if (addDropdown) {
                addDropdown.addEventListener("change", function () {
                    toggleManualInput(addDropdown, addManual);
                });
            }
        
            // =============== EDIT FORM ===============
            const editDropdown = document.getElementById("edit-proses");
            const editManual = document.getElementById("edit-proses-manual");
        
            if (editDropdown) {
                // Saat modal kebuka → cek apakah nilai yang digunakan itu manual
                let isManual = editDropdown.dataset.manual === "true"; 
                if (isManual) {
                    editDropdown.value = "manual"; 
                }
                toggleManualInput(editDropdown, editManual);
        
                editDropdown.addEventListener("change", function () {
                    toggleManualInput(editDropdown, editManual);
                });
            }
        
        });
    </script>

@endsection
