@extends('layouts.pengguna')

@section('title', 'Arsip Open')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/arsip_open_closed.css') }}">

    <!-- Konten -->
    <h3 class="mt-3 mb-4">Status Open</h3>

    <div class="d-flex flex-wrap align-items-center gap-2">
        <label class="me-3">Urutkan berdasarkan</label>

        <!-- Dropdown Unit Kerja -->
        <select id="unitkerja" class="form-select w-auto dropdown-fixed">
            <option value="">Unit Kerja</option>
            <option value="jur_el">Jur EL</option>
            <option value="jur_if">Jur IF</option>
            <option value="jur_mb">Jur MB</option>
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
                        <tr class="data-row">
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary toggle-collapse" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#mitigasi1" aria-expanded="false"
                                    aria-controls="mitigasi1">+
                                </button>
                            </td>
                            <td>Jur IF</td>
                            <td>Pelaksanaan Pembelajaran</td>
                            <td>Kepatuhan</td>
                            <td>integritas</td>
                            <td>Kurangnya jumlah komputer untuk perkuliahan</td>
                            <td class="centered">Internal</td>
                            <td>Penambahan Mahasiswa</td>
                            <td>Kesulitan menjalankan PBM</td>
                            <td class="centered">IKU-4</td>
                            <td>Dosen, Mahasiswa, Prodi</td>
                            <td>Mahasiswa menggunakan laptop pribadi</td>
                            <td class="centered">2</td>
                            <td class="centered">A</td>
                            <td class="centered">H</td>
                            <td class="centered">Terverifikasi</td>
                        </tr>

                        <!-- TABEL MITIGASI -->
                        <tr class="collapse-row collapse bg-light" id="mitigasi1">
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
                                            </tr>
                                            <tr>
                                                <th>Rencana Aksi</th>
                                                <th>Tanggal Pelaksanaan Rencana Aksi</th>
                                                <th>Hasil Tindak Lanjut</th>
                                                <th>Tanggal Evaluasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="centered">1-2025</td>
                                                <td>Kurangnya jumlah komputer untuk perkuliahan</td>
                                                <td>Pengadaan atau sewa</td>
                                                <td class="centered">2025-03-10</td>
                                                <td>Sewa laptop</td>
                                                <td class="centered">2025-03-10</td>
                                                <td class="centered">Open</td>
                                                <td>Kebutuhan komputer perkuliahan terpenuhi</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
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
    </script>
@endsection
