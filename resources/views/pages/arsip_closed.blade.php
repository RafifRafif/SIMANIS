@extends('layouts.pengguna')

@section('title', 'Arsip Closed')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/arsip_open_closed.css') }}">

    <!-- Konten -->
    <h3 class="mt-3 mb-4">Status Closed</h3>

    <div class="d-flex flex-wrap align-items-center gap-2">
        <label class="me-3">Urutkan berdasarkan</label>

        <!-- Dropdown Unit Kerja -->
        <select id="unitkerja" class="form-select w-auto dropdown-fixed">
            <option value="">Unit Kerja</option>
            @foreach($unitKerja as $unit)
                <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
            @endforeach
        </select>

        <!-- Dropdown Tahun -->
        <select id="tahun" class="form-select w-auto dropdown-fixed">
            <option value="">Tahun</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
        </select>

        <button id="btnSearch" class="btn btn-primary btn-sm btn-search ms-2" style="height: 35px; padding: 0 15px;">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
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
                        @forelse ($registrasi as $item)
                            {{-- Baris utama (registrasi) --}}
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
                                <td>{{ $item->keparahan }}</td>
                                <td>{{ $item->frekuensi }}</td>
                                <td>{{ $item->probabilitas }}</td>
                                <td>{{ $item->status_registrasi }}</td>
                            </tr>

                        <!-- TABEL MITIGASI -->
                        <tr class="collapse-row collapse bg-light" id="mitigasi{{ $item->id_registrasi }}">
                            <td colspan="17">
                                <div class="p-3">
                                    <!-- Header Mitigasi -->
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
                                                                <a href="{{ $m->dokumen_pendukung }}" target="_blank" class="btn btn-sm btn-secondary">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9" class="text-center text-muted">Belum ada mitigasi</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="17" class="text-center text-muted">Tidak ada registrasi ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- /card -->

    <script>
        const btnSearch = document.getElementById('btnSearch');
        const unitkerja = document.getElementById('unitkerja');
        const kategori = document.getElementById('kategori');
        const jenis = document.getElementById('jenis');
        const hasilDiv = document.getElementById('hasilFilter');

        btnSearch.addEventListener('click', () => {
            // ambil TEKS dari dropdown (bukan value)
            const unitkerjaVal = unitkerja.options[unitkerja.selectedIndex].text.toLowerCase();
            const kategoriVal = kategori.options[kategori.selectedIndex].text.toLowerCase();
            const jenisVal = jenis.options[jenis.selectedIndex].text.toLowerCase();

            // cari semua baris di tabel (kecuali baris collapse)
            const rows = document.querySelectorAll("tr.data-row");

            rows.forEach(row => {
                const unitkerjaText = row.cells[1].textContent.toLowerCase();
                const kategoriText = row.cells[3].textContent.toLowerCase();
                const jenisText = row.cells[4].textContent.toLowerCase();

                const cocok =
                    (unitkerjaVal === "unit kerja" || unitkerjaText.includes(unitkerjaVal)) &&
                    (kategoriVal === "kategori risiko" || kategoriText.includes(kategoriVal)) &&
                    (jenisVal === "jenis risiko" || jenisText.includes(jenisVal));

                row.style.display = cocok ? "" : "none";

                const nextRow = row.nextElementSibling;
                if (nextRow && nextRow.classList.contains("collapse-row")) {
                    nextRow.style.display = cocok ? "" : "none";
                }
            });
        });

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
    </script>
@endsection
