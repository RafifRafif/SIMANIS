@extends('layouts.pengguna')

@section('title', 'Penilaian Auditor')

@push('modals')
    @include('components.kelolapenilaian.modal-tambah-penilaian')
    @include('components.kelolapenilaian.modal-edit-penilaian')
    @include('components.kelolapenilaian.modal-hapus-penilaian')
@endpush

@section('content')
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/arsip_open_closed.css') }}">
    <!-- Konten -->
    <h3 class="mt-3 mb-4">Penilaian Auditor</h3>

    <div class="d-flex flex-wrap align-items-center gap-2">
        <label class="me-3">Urutkan berdasarkan</label>

        <!-- Dropdown Unit Kerja dan Tahun -->
        <form action="{{ route('penilaian') }}" method="GET" class="d-flex align-items-center gap-2">
            <select name="unit_kerja_id" id="unitkerja" class="form-select w-auto dropdown-fixed">
                <option value="">Pilih Unit Kerja</option>
                @foreach ($unitKerja as $uk)
                    <option value="{{ $uk->id }}" {{ request('unit_kerja_id') == $uk->id ? 'selected' : '' }}>
                        {{ $uk->nama_unit }}
                    </option>
                @endforeach
            </select>

            <select name="tahun" id="tahun" class="form-select w-auto dropdown-fixed">
                <option value="">Pilih Tahun</option>
                @foreach ($tahunList as $tahun)
                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                        {{ $tahun }}
                    </option>
                @endforeach
            </select>

            <button id="btnSearch" class="btn btn-primary btn-sm btn-search ms-2" style="height: 35px; padding: 0 15px;">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    <div id="hasilFilter" class="mt-4"></div>

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
                            <th>Kontrol/Pencegahan</th>
                            <th>Keparahan</th>
                            <th>Frekuensi</th>
                            <th>Probabilitas</th>
                            <th>Status Registrasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrasis as $index => $r)
                                        <tr>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary toggle-collapse" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#mitigasi{{ $r->id_registrasi }}"
                                                    aria-expanded="false" aria-controls="mitigasi{{ $r->id_registrasi }}">+
                                                </button>
                                            </td>
                                            <td>{{ $r->unitKerja->nama_unit ?? '-' }}</td>
                                            <td>{{ $r->prosesAktivitas->nama_proses ?? '-' }}</td>
                                            <td>{{ $r->kategoriRisiko->nama_kategori ?? '-' }}</td>
                                            <td>{{ $r->jenisRisiko->nama_jenis ?? '-' }}</td>
                                            <td>{{ $r->isu_resiko }}</td>
                                            <td>{{ $r->jenis_isu }}</td>
                                            <td>{{ $r->akar_permasalahan }}</td>
                                            <td>{{ $r->dampak }}</td>
                                            <td>{{ $r->ikuTerkait->nama_iku ?? '-' }}</td>
                                            <td>{{ $r->pihak_terkait }}</td>
                                            <td>{{ $r->kontrol_pencegahan }}</td>
                                            <td class="centered">{{ $r->keparahan }}</td>
                                            <td class="centered">{{ $r->frekuensi }}</td>
                                            <td class="centered">{{ $r->probabilitas }}</td>
                                            <td class="centered">{{ $r->status_registrasi }}</td>
                                        </tr>

                                        {{-- Bagian Mitigasi --}}
                                        <tr class="collapse bg-light" id="mitigasi{{ $r->id_registrasi }}">
                                            <td colspan="17">
                                                <div class="p-3">
                                                    <table class="table table-sm table-bordered">
                                                        <thead class="table-secondary text-center">
                                                            <tr>
                                                                <th rowspan="2">Triwulan</th>
                                                                <th rowspan="2">Isu/Risiko</th>
                                                                <th colspan="2">Tindak Lanjut</th>
                                                                <th colspan="2">Evaluasi</th>
                                                                <th rowspan="2">Status Pelaksanaan</th>
                                                                <th rowspan="2">Hasil Penerapan</th>
                                                                <th rowspan="2">Dokumen Pendukung</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Rencana Aksi</th>
                                                                <th>Tanggal Pelaksanaan</th>
                                                                <th>Hasil Tindak Lanjut</th>
                                                                <th>Tanggal Evaluasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($r->mitigasis as $m)
                                                                <tr>
                                                                    <td class="centered">{{ $m->triwulan }}-{{ $m->tahun }}</td>
                                                                    <td>{{ $m->isurisiko }}</td>
                                                                    <td>{{ $m->rencana_aksi }}</td>
                                                                    <td class="centered">{{ $m->tanggal_pelaksanaan }}</td>
                                                                    <td>{{ $m->hasil_tindak_lanjut }}</td>
                                                                    <td class="centered">{{ $m->tanggal_evaluasi }}</td>
                                                                    <td class="centered">{{ $m->status }}</td>
                                                                    <td>{{ $m->hasil_manajemen_risiko }}</td>
                                                                    <td class="text-center align-middle">
                                                                        @if ($m->dokumen_pendukung)
                                                                            <a href="{{ asset('storage/' . $m->dokumen_pendukung) }}"
                                                                                target="_blank" class="btn btn-sm btn-secondary">
                                                                                <i class="fa-solid fa-eye"></i>
                                                                            </a>
                                                                        @else
                                                                            <span>-</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="9" class="text-center text-muted">Belum ada data
                                                                        mitigasi</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>

                                                    {{-- Bagian Penilaian Auditor --}}
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        @if ($r->mitigasis->count() > 0)

                                                        {{-- Jika belum ada penilaian → tombol aktif --}}
                                                        @if ($m->penilaian->count() == 0)
                                                            <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                                                data-bs-target="#tambahPenilaianAuditorModal"
                                                                data-mitigasi-id="{{ $m->id_mitigasi }}">
                                                                <i class="fa-solid fa-plus"></i> Tambah Penilaian
                                                            </button>
                                                        @else
                                                            {{-- Sudah ada penilaian → tombol dimatikan --}}
                                                            <button class="btn btn-secondary fw-bold" disabled>
                                                                <i class="fa-solid fa-lock"></i> Penilaian Sudah Ada
                                                            </button>
                                                        @endif
                                                    
                                                    @else
                                                        {{-- Tidak ada mitigasi --}}
                                                        <button class="btn btn-secondary fw-bold" disabled>
                                                            <i class="fa-solid fa-lock"></i> Belum Ada Mitigasi
                                                        </button>
                                                    @endif
                                                    


                                                    </div>
                                                    <table class="table table-sm table-bordered mb-0">
                                                        <thead class="table-secondary text-center">
                                                            <tr>
                                                                <th>Triwulan</th>
                                                                <th>Penilaian</th>
                                                                <th>Uraian</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $penilaian = $m->penilaian ?? collect();
                                                            @endphp

                                                            @forelse ($penilaian as $p)
                                                                <tr>
                                                                    <td class="centered">{{ $p->triwulan_tahun }}</td>
                                                                    <td class="centered">
                                                                        @php
                                                                            // Mapping untuk ubah value database ke format tampilan
                                                                            $label =
                                                                                [
                                                                                    'tercapai' => 'Open (Menurun)',
                                                                                    'terlampaui' => 'Closed',
                                                                                    'tidaktercapai' => 'Open (Meningkat)',
                                                                                ][$p->penilaian] ?? ucfirst($p->penilaian);
                                                                        @endphp
                                                                        {{ $label }}
                                                                    </td>
                                                                    <td>{{ $p->uraian ?? '-' }}</td>
                                                                    <td class="text-center">
                                                                        <button class="btn btn-sm btn-primary edit-button"
                                                                            data-bs-toggle="modal" data-bs-target="#editPenilaianAuditorModal"
                                                                            data-id="{{ $p->id_penilaian }}"
                                                                            data-mitigasi-id="{{ $p->mitigasi_id }}"
                                                                            data-triwulan="{{ $p->triwulan_tahun }}"
                                                                            data-penilaian="{{ $p->penilaian }}" data-uraian="{{ $p->uraian }}">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </button>

                                                                        <button class="btn btn-sm btn-danger delete-registrasi-button"
                                                                            data-bs-toggle="modal" data-bs-target="#hapusPenilaianAuditorModal"
                                                                            data-id="{{ $p->id_penilaian }}">
                                                                            <i class="fa-solid fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">
                                                                        Belum ada penilaian auditor
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                            </div>
                            </td>
                            </tr>
                        @endforeach
            </tbody>
            </table>

        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Bagian tombol + / − ---
            document.querySelectorAll('.toggle-collapse').forEach(button => {
                const targetSelector = button.getAttribute('data-bs-target');
                const target = document.querySelector(targetSelector);

                // Pastikan collapse dikenali oleh Bootstrap
                const collapseInstance = new bootstrap.Collapse(target, {
                    toggle: false
                });

                // Saat terbuka → ubah ke "−"
                target.addEventListener('shown.bs.collapse', () => {
                    button.textContent = '−';
                });

                // Saat tertutup → ubah ke "+"
                target.addEventListener('hidden.bs.collapse', () => {
                    button.textContent = '+';
                });
            });

            // --- Bagian tombol Edit ---
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Ambil semua data dari atribut data-*
                    const nik = this.getAttribute('data-nik');
                    const nama = this.getAttribute('data-nama');
                    const role = this.getAttribute('data-role');
                    const unitkerja = this.getAttribute('data-unitkerja');
                    const proses = this.getAttribute('data-proses');
                    const kategori = this.getAttribute('data-kategori');
                    const jenis_risiko = this.getAttribute('data-jenis');
                    const isuresiko = this.getAttribute('data-isuresiko');
                    const jenis = this.getAttribute('data-jenisisu');
                    const akar = this.getAttribute('data-akar');
                    const dampak = this.getAttribute('data-dampak');
                    const iku = this.getAttribute('data-iku');
                    const pihak = this.getAttribute('data-pihak');
                    const kontrol = this.getAttribute('data-kontrol');
                    const keparahan = this.getAttribute('data-keparahan');
                    const frekuensi = this.getAttribute('data-frekuensi');

                    // Masukkan ke field di modal edit
                    document.getElementById('edit-nik').value = nik || '';
                    document.getElementById('edit-nama').value = nama || '';
                    document.getElementById('edit-role').value = role || '';
                    document.getElementById('edit-unitkerja').value = unitkerja || '';
                    document.getElementById('edit-proses').value = proses || '';
                    document.getElementById('edit-kategori').value = kategori || '';
                    document.getElementById('edit-jenis').value = jenis || '';
                    document.getElementById('edit-isuresiko').value = isuresiko || '';
                    document.getElementById('edit-jenisisu').value = jenisisu || '';
                    document.getElementById('edit-akar').value = akar || '';
                    document.getElementById('edit-dampak').value = dampak || '';
                    document.getElementById('edit-iku').value = iku || '';
                    document.getElementById('edit-pihak').value = pihak || '';
                    document.getElementById('edit-kontrol').value = kontrol || '';
                    document.getElementById('edit-keparahan').value = keparahan || '';
                    document.getElementById('edit-frekuensi').value = frekuensi || '';

                    // Buka modal edit
                    const modal = new bootstrap.Modal(document.getElementById(
                        'editPenilaianAuditorModal'));
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

@endsection
