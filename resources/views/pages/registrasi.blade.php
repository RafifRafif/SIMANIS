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
    @include('components.kelolaevaluasi.modal-tambah-evaluasi')
    @include('components.kelolaevaluasi.modal-hapus-evaluasi')
    @include('components.kelolaevaluasi.modal-edit-evaluasi')
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
                                <td>{{ $item->prosesAktivitas->nama_proses ?? '-' }}</td>
                                <td>{{ $item->kategoriRisiko->nama_kategori ?? '-' }}</td>
                                <td>{{ $item->jenisRisiko->nama_jenis ?? '-' }}</td>
                                <td>{{ $item->isu_resiko }}</td>
                                <td>{{ $item->jenis_isu }}</td>
                                <td>{{ $item->akar_permasalahan }}</td>
                                <td>{{ $item->dampak }}</td>
                                <td>{{ $item->ikuTerkait->nama_iku ?? '-' }}</td>
                                <td>{{ $item->pihak_terkait }}</td>
                                <td>{{ $item->kontrol_pencegahan }}</td>
                                <td>{{ $item->keparahan_detail }}</td>
                                <td>{{ $item->frekuensi_detail }}</td>
                                <td>{{ $item->probabilitas }}</td>
                                <td>{{ $item->status_registrasi }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-primary edit-button" data-id="{{ $item->id_registrasi }}"
                                            data-unitkerja="{{ $item->unit_kerja_id }}"
                                            data-proses="{{ $item->proses_aktivitas_id }}"
                                            data-kategori="{{ $item->kategori_risiko_id }}"
                                            data-jenis="{{ $item->jenis_risiko_id }}" data-isuresiko="{{ $item->isu_resiko }}"
                                            data-jenisisu="{{ $item->jenis_isu }}" data-akar="{{ $item->akar_permasalahan }}"
                                            data-dampak="{{ $item->dampak }}" data-iku="{{ $item->iku_terkait_id }}"
                                            data-pihak="{{ $item->pihak_terkait }}"
                                            data-kontrol="{{ $item->kontrol_pencegahan }}"
                                            data-keparahan="{{ $item->keparahan }}" data-frekuensi="{{ $item->frekuensi }}"
                                            data-probabilitas="{{ $item->probabilitas }}" data-bs-toggle="modal"
                                            data-bs-target="#editDataModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-sm btn-danger delete-registrasi-button" data-bs-toggle="modal"
                                            data-bs-target="#hapusRegistrasiModal" data-id="{{ $item->id_registrasi }}">
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
                                                $sudahAdaMitigasi = $item->mitigasis->count() >= 1;
                                            @endphp

                                            @if ($item->status_registrasi != 'Terverifikasi')
                                                <!-- Registrasi belum diverifikasi -->
                                                <button class="btn btn-secondary fw-bold" disabled>
                                                    <i class="fa-solid fa-lock"></i> Menunggu Verifikasi
                                                </button>

                                            @elseif ($sudahAdaMitigasi)
                                                <button class="btn btn-secondary fw-bold" disabled>
                                                    <i class="fa-solid fa-lock"></i> Mitigasi sudah ada
                                                </button>

                                            @else
                                                <button class="btn btn-primary fw-bold" 
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tambahDataMitigasiModal"
                                                    data-regid="{{ $item->id_registrasi }}" 
                                                    data-isurisiko="{{ $item->isu_resiko }}"
                                                    data-triwulan="{{ $item->mitigasis->pluck('triwulan')->implode(',') }}">
                                                    <i class="fa-solid fa-plus"></i> Tambah Mitigasi
                                                </button>
                                            @endif
                                        </div>

                                        <!-- Bagian mitigasi -->
                                        <table class="table table-sm table-bordered">
                                            <thead class="table-secondary text-center">
                                                <tr>
                                                    <th rowspan="2">Isu/Risiko</th>
                                                    <th colspan="2">Tindak Lanjut</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th>Rencana Aksi</th>
                                                    <th>Tanggal Pelaksanaan Rencana Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($item->mitigasis && $item->mitigasis->count())
                                                    @foreach($item->mitigasis as $m)
                                                        <tr>
                                                            <td>{{ $m->isurisiko }}</td>
                                                            <td>{{ $m->rencana_aksi }}</td>
                                                            <td>{{ $m->tanggal_pelaksanaan ? \Carbon\Carbon::parse($m->tanggal_pelaksanaan)->format('d M Y') : '-' }}</td>
                                                            <td class="text-center align-middle">
                                                                <div class="d-flex justify-content-center gap-1">
                                                                    <button class="btn btn-sm btn-primary edit-mitigasi"
                                                                        data-id="{{ $m->id_mitigasi }}"
                                                                        data-isurisiko="{{ $m->isurisiko }}"
                                                                        data-rencana="{{ $m->rencana_aksi }}"
                                                                        data-tanggal="{{ $m->tanggal_pelaksanaan }}"
                                                                        data-bs-toggle="modal" data-bs-target="#editDataMitigasiModal">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </button>

                                                                    <button class="btn btn-sm btn-danger delete-mitigasi-button"
                                                                        data-bs-toggle="modal" data-bs-target="#hapusMitigasiModal"
                                                                        data-id="{{ $m->id_mitigasi }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        {{-- =========================== --}}
                                                        {{-- Bagian Evaluasi (per mitigasi) --}}
                                                        {{-- =========================== --}}

                                                        <tr>
                                                            <td colspan="17" class="bg-white">

                                                                <div class="ms-4 mt-3">

                                                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                                                        @php
                                                                            $evaluasiTerakhir = $m->evaluasis->sortByDesc('id_evaluasi')->first();
                                                                            $evaluasiClosed = $evaluasiTerakhir && $evaluasiTerakhir->status_pelaksanaan === 'closed';
                                                                        @endphp

                                                                        @if ($evaluasiClosed)
                                                                            <!-- Jika evaluasi terakhir closed → tombol disable -->
                                                                            <button class="btn btn-secondary fw-bold" disabled>
                                                                                <i class="fa-solid fa-lock"></i> Evaluasi Sudah Closed
                                                                            </button>
                                                                        @else
                                                                            <!-- Jika belum closed → tombol aktif -->
                                                                            <button class="btn btn-primary fw-bold tambah-evaluasi-btn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#tambahEvaluasiModal"
                                                                                data-mitigasi="{{ $m->id_mitigasi }}"
                                                                                data-triwulan="{{ $m->evaluasis->pluck('triwulan')->implode(',') }}">
                                                                                <i class="fa-solid fa-plus"></i> Tambah Evaluasi
                                                                            </button>
                                                                        @endif
                                                                    </div>

                                                                    <table class="table table-sm table-bordered mb-0">
                                                                        <thead class="table-secondary text-center">
                                                                            <tr>
                                                                                <th>Triwulan</th>
                                                                                <th>Hasil Tindak Lanjut</th>
                                                                                <th>Tanggal Evaluasi</th>
                                                                                <th>Status Pelaksanaan</th>
                                                                                <th>Hasil Penerapan</th>
                                                                                <th>Dokumen</th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            @foreach ($m->evaluasis as $e)
                                                                                <tr>
                                                                                    <td class="centered">{{ $e->triwulan }}-{{ $e->tahun }}</td>
                                                                                    <td>{{ $e->hasil_tindak_lanjut }}</td>
                                                                                    <td class="centered">
                                                                                        {{ $e->tanggal_evaluasi ? \Carbon\Carbon::parse($e->tanggal_evaluasi)->format('d M Y') : '-' }}
                                                                                    </td>
                                                                                    <td class="centered">{{ ucfirst($e->status_pelaksanaan) }}</td>
                                                                                    <td>{{ $e->hasil_penerapan }}</td>

                                                                                    <td class="text-center align-middle">
                                                                                        @if ($e->dokumen_pendukung)
                                                                                            <a href="{{ $e->dokumen_pendukung }}" target="_blank"
                                                                                                class="btn btn-sm btn-secondary">
                                                                                                <i class="fa-solid fa-eye"></i>
                                                                                            </a>
                                                                                        @else
                                                                                            <span>-</span>
                                                                                        @endif
                                                                                    </td>

                                                                                    <td class="text-center">
                                                                                        <button class="btn btn-sm btn-primary edit-evaluasi-btn"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#editDataEvaluasiModal"
                                                                                            data-id="{{ $e->id_evaluasi }}"
                                                                                            data-mitigasi-id="{{ $e->mitigasi_id }}"
                                                                                            data-triwulan="{{ $e->triwulan }}"
                                                                                            data-tahun="{{ $e->tahun }}"
                                                                                            data-hasil="{{ $e->hasil_tindak_lanjut }}"
                                                                                            data-tanggal="{{ $e->tanggal_evaluasi }}"
                                                                                            data-status="{{ $e->status_pelaksanaan }}"
                                                                                            data-penerapan="{{ $e->hasil_penerapan }}"
                                                                                            data-dokumen="{{ $e->dokumen_pendukung }}">
                                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                                        </button>

                                                                                        <button class="btn btn-sm btn-danger delete-evaluasi-btn"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#hapusEvaluasiModal"
                                                                                            data-id="{{ $e->id_evaluasi }}">
                                                                                            <i class="fa-solid fa-trash"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                            @if ($m->evaluasis->isEmpty())
                                                                                <tr>
                                                                                    <td colspan="7" class="text-center text-muted">Belum ada evaluasi</td>
                                                                                </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                    {{-- Bagian Penilaian Auditor --}}
                                                                    @php
                                                                        $mitigasiTerakhir = $item->mitigasis->sortByDesc('id_mitigasi')->first();
                                                                    @endphp

                                                                    @if ($mitigasiTerakhir)
                                                                        <div class="mt-4">
                                                                            <table class="table table-sm table-bordered mb-0">
                                                                                <thead class="table-secondary text-center">
                                                                                    <tr>
                                                                                        <th>Triwulan</th>
                                                                                        <th>Catatan Hasil Review</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @forelse ($mitigasiTerakhir->penilaian as $p)
                                                                                        @php
                                                                                            $evaluasiTerkait = $mitigasiTerakhir->evaluasis->firstWhere('triwulan', $p->triwulan);
                                                                                            $tahunEvaluasi = $evaluasiTerkait ? $evaluasiTerkait->tahun : '-';
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td class="centered">{{ $p->triwulan }}-{{ $tahunEvaluasi }}</td>
                                                                                            <td>{{ $p->uraian ?? '-' }}</td>
                                                                                        </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td colspan="2" class="text-center text-muted">Belum ada review auditor</td>
                                                                                        </tr>
                                                                                    @endforelse
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
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
        });        
    </script>

    {{-- Script untuk alert CRUD --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
        document.querySelectorAll('.toggle-evaluasi').forEach(btn => {
            btn.addEventListener('click', function() {
                let target = document.querySelector(this.dataset.target);
                target.style.display = target.style.display === "none" ? "table-row" : "none";
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Saat tombol "Tambah Mitigasi" ditekan
            document.querySelectorAll('[data-bs-target="#tambahDataMitigasiModal"]').forEach(btn => {
                btn.addEventListener("click", function () {

                    let regid = this.getAttribute("data-regid");          // ID registrasi
                    let isu = this.getAttribute("data-isurisiko");        // Isu Risiko dari tabel

                    // Isi hidden input registrasi_id agar tersimpan
                    document.getElementById("registrasi_id_tambah").value = regid;

                    // Isi dropdown isu risiko di modal
                    let select = document.getElementById("select_isurisiko");
                    select.innerHTML = `
                        <option value="${isu}" selected>${isu}</option>
                    `;
                });
            });

        });
    </script>


@endsection