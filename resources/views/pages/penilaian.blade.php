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
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary toggle-collapse" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#mitigasi1" aria-expanded="false"
                                    aria-controls="mitigasi1">+
                                </button>
                            </td>
                            <td>Prodi IF</td>
                            <td>Pelaksanaan Pembelajaran</td>
                            <td>Kepatuhan</td>
                            <td>IT</td>
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
                        <tr class="collapse bg-light" id="mitigasi1">
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
                                            <tr>
                                                <td class="centered">1-2025</td>
                                                <td>Kurangnya jumlah komputer untuk perkuliahan</td>
                                                <td>Pengadaan atau sewa</td>
                                                <td class="centered">2025-03-10</td>
                                                <td>Sewa laptop</td>
                                                <td class="centered">2025-03-10</td>
                                                <td class="centered">Closed</td>
                                                <td>Kebutuhan komputer perkuliahan terpenuhi</td>
                                                <td class="text-center align-middle">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button class="btn btn-sm btn-secondary">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- TABEL PENILAIAN AUDITOR -->
                                    <div class="mt-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#tambahPenilaianAuditorModal">
                                                <i class="fa-solid fa-plus"></i> Tambah Penilaian
                                            </button>
                                        </div>

                                        <table class="table table-sm table-bordered mb-0"">
                                            <thead class="table-secondary text-center">
                                                <tr>
                                                    <th rowspan="2">Triwulan</th>
                                                    <th rowspan="2">Penilaian</th>
                                                    <th>Uraian</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="centered">1-2025</td>
                                                    <td class="centered">Tercapai</td>
                                                    <td>Unit kerja telah melakukan sewa laptop tambahan sesuai rekomendasi
                                                        auditor.</td>
                                                    <td class="text-center align-middle">
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                            data-bs-target="#editPenilaianAuditorModal">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#hapusPenilaianAuditorModal">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
                    const modal = new bootstrap.Modal(document.getElementById('editPenilaianAuditorModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection