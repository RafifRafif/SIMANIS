rapih kan code tolong 
@extends('layouts.registrasi')

@section('title', 'Registrasi')

@push('modals')
    @include('components.kelolaregistrasi.modal-tambah-data')
    @include('components.kelolaregistrasi.modal-edit-data')
    @include('components.kelolamitigasi.tambah-mitigasi')
    @include('components.kelolamitigasi.edit-mitigasi')
@endpush

@section('content')
    <!-- Konten -->
    <h3 class="mt-3 mb-4">Registrasi Dan Mitigasi</h3>

    <!-- Pencarian dan Dropdown -->
    <div class="d-flex mb-4 gap-2">
     
        <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal"><i
                class="fa-solid fa-plus"></i>Tambah</button>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
            <table class="table table-hover align-middle table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>unit Kerja</th>
                        <th>Proses/Aktifitas</th>
                        <th>Kategori Risiko</th>
                        <th>Jenis Risiko</th>
                        <th>isu/Resiko</th>
                        <th>Jenis Isu</th>
                        <th>Akar Permasalahan</th>
                        <th>Dampak</th>
                        <th>IKU Terkait</th>
                        <th>Pihak Terkait</th>
                        <th>Kontrol/Pencegahan</th>
                        <th>Keparahan</th>
                        <th>Frekuensi</th>
                        <th>Probabilitas</th>
                        <th>Status registrasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <tr data-bs-toggle="collapse" data-bs-target="#mitigasi1" aria-expanded="false" class="toggle-row">
                            <td class="text-center" style="cursor: pointer;">
                                <span class="toggle-icon fw-bold">+</span>
                            </td>
                        <td>Prodi IF</td>
                        <td>Pelaksanaan Pembelajaran</td>
                        <td>Kepatuhan</td>
                        <td>IT</td>
                        <td>Kurangnya jumlah komputer umtuk perkuliahan</td>
                        <td>Internal</td>
                        <td>Penambahan Mahasiswa</td>
                        <td>Kesulitan menjalankan PBM</td>
                        <td>IKU-4</td>
                        <td>Dosen, Mahasiswa, Prodi</td>
                        <td>Mahasiswa menggunakan laptop pribadi</td>
                        <td>2</td>
                        <td>A</td>
                        <td>H</td>
                        <td>Belum Terverifikasi</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
<!-- TABEL MITIGASI-->
                    <tr class="collapse bg-light" id="mitigasi1">
                        <td colspan="17">
                            <div class="p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold mb-0">Mitigasi</h6>
                                    <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataMitigasiModal"><i
                                        class="fa-solid fa-plus"></i>Tambah Mitigasi</button>
                                </div>

                                <table class="table table-sm table-bordered">
                                    <thead class="table-secondary text-center">
                                        <tr>
                                            <th rowspan="2">Triwulan</th>
                                            <th rowspan="2">Isu/Risiko</th>
                                            <th colspan="2">Tindak Lanjut</th>
                                            <th colspan="2">Evaluasi</th>
                                            <th rowspan="2">Status Pelaksanaan Rencana Aksi</th>
                                            <th rowspan="2">Hasil Penerapan Manajemen Risiko</th>
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
                                        <tr>
                                            <td>I</td>
                                            <td>Kurangnya jumlah komputer untuk perkuliahan</td>
                                            <td>Pengadaan atau sewa</td>
                                            <td>2025-03-10</td>
                                            <td>Sewa laptop</td>
                                            <td>2025-03-10</td>
                                            <td>Closed</td>
                                            <td>Kebutuhan komputer perkuliahan terpenuhi</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                    data-bs-target="#editDatamitigasiModal">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
    

                    
                    
                    
                    {{-- JavaScript untuk ubah tanda + jadi - --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-row').forEach(row => {
            row.addEventListener('click', function() {
                const icon = this.querySelector('.toggle-icon');
                icon.textContent = icon.textContent === '+' ? '−' : '+';
            });
        });
    });


                    
                // --   
                  {{-- INI Contoh  
                  <tr>
                        <td>3</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr> --//
                    --}}
                </tbody>
            </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');
        
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil semua data dari atribut data-*
                    const nik = this.getAttribute('data-nik');
                    const nama = this.getAttribute('data-nama');
                    const role = this.getAttribute('data-role');
                    const unitkerja = this.getAttribute('data-unitkerja');
                    const proses = this.getAttribute('data-proses');
                    const kategori = this.getAttribute('data-kategori');
                    const jenis_risiko = this.getAttribute('data-jenis_risiko');
                    const isuresiko = this.getAttribute('data-isuresiko');
                    const jenis = this.getAttribute('data-jenis');
                    const akar = this.getAttribute('data-akar');
                    const dampak = this.getAttribute('data-dampak');
                    const iku = this.getAttribute('data-iku');
                    const pihak = this.getAttribute('data-pihak');
                    const kontrol = this.getAttribute('data-kontrol');
                    const keparahan = this.getAttribute('data-keparahan');
                    const frekuensi = this.getAttribute('data-frekuensi');
        
                    // Masukkan ke dalam field di modal edit
                    document.getElementById('edit-nik').value = nik || '';
                    document.getElementById('edit-nama').value = nama || '';
                    document.getElementById('edit-role').value = role || '';
                    document.getElementById('edit-unitkerja').value = unitkerja || '';
                    document.getElementById('edit-proses').value = proses || '';
                    document.getElementById('edit-kategori').value = kategori || '';
                    document.getElementById('edit-jenis_risiko').value = jenis_risiko || '';
                    document.getElementById('edit-isuresiko').value = isuresiko || '';
                    document.getElementById('edit-jenis').value = jenis || '';
                    document.getElementById('edit-akar').value = akar || '';
                    document.getElementById('edit-dampak').value = dampak || '';
                    document.getElementById('edit-iku').value = iku || '';
                    document.getElementById('edit-pihak').value = pihak || '';
                    document.getElementById('edit-kontrol').value = kontrol || '';
                    document.getElementById('edit-keparahan').value = keparahan || '';
                    document.getElementById('edit-frekuensi').value = frekuensi || '';
        
                    // Buka modal edit
                    const modal = new bootstrap.Modal(document.getElementById('editDataModal'));
                    modal.show();
                });
            });
        });
        </script>

        
        
@endsection
