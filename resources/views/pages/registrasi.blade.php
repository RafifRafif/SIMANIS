@extends('layouts.registrasi')

@section('title', 'Registrasi')

@push('modals')
    @include('components.kelolaregistrasi.modal-tambah-data')
    @include('components.kelolaregistrasi.modal-edit-data')
    @include('components.kelolaregistrasi.modal-hapus-data')
    @include('components.kelolamitigasi.tambah-mitigasi')
    @include('components.kelolamitigasi.edit-mitigasi')
    @include('components.kelolapenilaian.modal-tambah-penilaian')
@endpush

@section('content')
    <!-- Konten -->
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <h3 class="mt-3 mb-3">Registrasi Dan Mitigasi</h3>
    <h6 class="fw-bold mb-3">Unit Kerja: <span style="color: #1E376C;">Prodi IF</span></h6>

    <!-- Pencarian dan Dropdown -->
    <div class="d-flex mb-4 gap-2">
        <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            <i class="fa-solid fa-plus"></i>Tambah
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
                            <th>Kontrol/Pencegahan</th>
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
                                <td>{{ $item->keparahan }}</td>
                                <td>{{ $item->frekuensi }}</td>
                                <td>{{ $item->probabilitas }}</td>
                                <td>{{ $item->status_registrasi }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-sm btn-primary edit-button"
                                            data-id="{{ $item->id_registrasi }}"
                                            data-unitkerja="{{ $item->unit_kerja_id }}"
                                            data-proses="{{ $item->proses_aktivitas_id }}"
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
                        
                                        <form action="{{ route('registrasi.destroy', $item->id_registrasi) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Hapus data ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        
                            <!-- Collapse Mitigasi -->
                            <tr class="collapse bg-light" id="mitigasi{{ $item->id_registrasi }}">
                                <td colspan="17">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#tambahDataMitigasiModal">
                                                <i class="fa-solid fa-plus"></i> Tambah Mitigasi
                                            </button>
                                        </div>
                        
                                        <!-- nanti bagian mitigasi dinamis di sini -->
                                        <table class="table table-sm table-bordered">
                                            <thead class="table-secondary text-center">
                                                <tr>
                                                    <th>Triwulan</th>
                                                    <th>Isu/Risiko</th>
                                                    <th>Rencana Aksi</th>
                                                    <th>Tanggal Pelaksanaan</th>
                                                    <th>Hasil Tindak Lanjut</th>
                                                    <th>Tanggal Evaluasi</th>
                                                    <th>Status</th>
                                                    <th>Hasil Manajemen Risiko</th>
                                                    <th>Dokumen Pendukung</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td colspan="10" class="text-center">Belum ada mitigasi</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                                    </table>
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
                    const isurisiko = this.getAttribute('data-isurisiko');
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
                    document.getElementById('edit-isurisiko').value = isurisiko || '';
                    document.getElementById('edit-jenisisu').value = jenisisu || '';
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