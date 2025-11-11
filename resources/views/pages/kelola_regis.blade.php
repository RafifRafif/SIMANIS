@extends('layouts.pengguna')

@section('title', 'Kelola Form Regis')

@push('modals')
    @include('components.kelolaformregis.modal-import-formregis')
    @include('components.kelolaformregis.modal-tambah-formregis-unitkerja')
    @include('components.kelolaformregis.modal-tambah-formregis-prosesaktivitas')
    @include('components.kelolaformregis.modal-tambah-formregis-kategoririsiko')
    @include('components.kelolaformregis.modal-tambah-formregis-jenisrisiko')
    @include('components.kelolaformregis.modal-tambah-formregis-iku')
    @include('components.kelolaformregis.modal-edit-formregis-unitkerja')
    @include('components.kelolaformregis.modal-edit-formregis-prosesaktivitas')
    @include('components.kelolaformregis.modal-edit-formregis-kategoririsiko')
    @include('components.kelolaformregis.modal-edit-formregis-jenisrisiko')
    @include('components.kelolaformregis.modal-edit-formregis-iku')
    @include('components.kelolaformregis.modal-hapus-formregis-iku')
    @include('components.kelolaformregis.modal-hapus-formregis-jenisrisiko')
    @include('components.kelolaformregis.modal-hapus-formregis-kategoririsiko')
    @include('components.kelolaformregis.modal-hapus-formregis-prosesaktivitas')
    @include('components.kelolaformregis.modal-hapus-formregis-unitkerja')
@endpush

@section('content')
    {{-- Kelola Regis CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kelola_regis.css') }}">

    {{-- Header Judul + Tombol Import --}}
    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <h3 class="mb-0">Kelola Form Regis</h3>
    </div>

    <div class="card shadow-sm border-0 p-3">

        {{-- Tombol + Tabel (vertikal dan bisa tutup) --}}
        <div class="d-flex flex-column gap-3">

            {{-- UNIT KERJA --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#unitKerja" aria-expanded="false">
                    Unit Kerja +
                </button>
                <div class="collapse mt-2" id="unitKerja">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Unit Kerja</h6>
                            <div class="d-flex ms-auto gap-2">
                                <!-- Tombol Import -->
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal" data-template="{{ asset('template/unitkerja.xlsx') }}"
                                    data-route="{{ route('formregis.import.unitkerja') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <!-- Tombol Tambah -->
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalUnit">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unitKerja as $index => $unit)
                                        <tr>
                                            <td class="centered">{{ $index + 1 }}</td>
                                            <td>{{ $unit->nama_unit }}</td>
                                            <td class="centered">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-primary edit-unit-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalUnit"
                                                    data-id="{{ $unit->id }}" data-nama="{{ $unit->nama_unit }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-sm btn-danger delete-unit-button"
                                                    data-bs-toggle="modal" data-bs-target="#hapusUnitKerjaModal"
                                                    data-id="{{ $unit->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PROSES/AKTIVITAS --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#prosesAktivitas" aria-expanded="false">
                    Proses/Aktivitas +
                </button>
                <div class="collapse mt-2" id="prosesAktivitas">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Proses/Aktivitas</h6>
                            <div class="d-flex ms-auto gap-2">
                                <!-- Tombol Import -->
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/proses_aktivitas.xlsx') }}"
                                    data-route="{{ route('formregis.import.proses') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <!-- Tombol Tambah -->
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalProsesAktivitas">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Proses/Aktivitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prosesAktivitas as $index => $proses)
                                        <tr>
                                            <td class="centered">{{ $index + 1 }}</td>
                                            <td>{{ $proses->nama_proses }}</td>
                                            <td class="centered">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-primary edit-proses-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalProsesAktivitas"
                                                    data-id="{{ $proses->id }}" data-nama="{{ $proses->nama_proses }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm delete-proses-button"
                                                    data-bs-toggle="modal" data-bs-target="#hapusProsesAktivitasModal"
                                                    data-id="{{ $proses->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KATEGORI RISIKO --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#kategoriRisiko" aria-expanded="false">
                    Kategori Risiko +
                </button>
                <div class="collapse mt-2" id="kategoriRisiko">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Kategori Risiko</h6>
                            <div class="d-flex ms-auto gap-2">
                                <!-- Tombol Import -->
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/kategori_risiko.xlsx') }}"
                                    data-route="{{ route('formregis.import.kategori') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>

                                <!-- Tombol Tambah -->
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalKategori">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriRisiko as $index => $kategori)
                                        <tr>
                                            <td class="centered">{{ $index + 1 }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td class="centered">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-primary edit-kategori-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalKategori"
                                                    data-id="{{ $kategori->id }}"
                                                    data-nama="{{ $kategori->nama_kategori }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm delete-kategori-button"
                                                    data-bs-toggle="modal" data-bs-target="#hapusKategoriRisikoModal"
                                                    data-id="{{ $kategori->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- JENIS RISIKO --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#jenisRisiko" aria-expanded="false">
                    Jenis Risiko +
                </button>
                <div class="collapse mt-2" id="jenisRisiko">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Jenis Risiko</h6>
                            <div class="d-flex ms-auto gap-2">
                                <!-- Tombol Import -->
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/jenis_risiko.xlsx') }}"
                                    data-route="{{ route('formregis.import.jenis') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>

                                <!-- Tombol Tambah -->
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalJenis">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisRisiko as $index => $jenis)
                                        <tr>
                                            <td class="centered">{{ $index + 1 }}</td>
                                            <td>{{ $jenis->nama_jenis }}</td>
                                            <td class="centered">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-primary edit-jenis-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalJenis"
                                                    data-id="{{ $jenis->id }}" data-nama="{{ $jenis->nama_jenis }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm delete-jenis-button"
                                                    data-bs-toggle="modal" data-bs-target="#hapusJenisRisikoModal"
                                                    data-id="{{ $jenis->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- IKU TERKAIT --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#ikuTerkait" aria-expanded="false">
                    IKU Terkait +
                </button>
                <div class="collapse mt-2" id="ikuTerkait">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">IKU Terkait</h6>
                            <div class="d-flex ms-auto gap-2">
                                <!-- Tombol Import -->
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal" data-template="{{ asset('template/iku.xlsx') }}"
                                    data-route="{{ route('formregis.import.iku') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>

                                <!-- Tombol Tambah -->
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalIku">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>IKU Terkait</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ikuTerkait as $index => $iku)
                                        <tr>
                                            <td class="centered">{{ $index + 1 }}</td>
                                            <td>{{ $iku->nama_iku }}</td>
                                            <td class="centered">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-primary edit-iku-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalIku"
                                                    data-id="{{ $iku->id }}" data-nama="{{ $iku->nama_iku }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm delete-iku-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusIkuModal"data-id="{{ $iku->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script ganti tanda + / - --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-btn').forEach(button => {
                const collapseEl = document.querySelector(button.dataset.bsTarget);
                const bsCollapse = new bootstrap.Collapse(collapseEl, {
                    toggle: false
                }); // biar bisa manual

                button.addEventListener('click', () => {
                    bsCollapse.toggle(); // toggle manual
                });

                collapseEl.addEventListener('show.bs.collapse', () => {
                    button.textContent = button.textContent.replace('+', '−');
                });

                collapseEl.addEventListener('hide.bs.collapse', () => {
                    button.textContent = button.textContent.replace('−', '+');
                });
            });
        });
    </script>

    {{-- Script untuk alert CRUD--}}
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


    {{-- Script Untuk Import --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const importButtons = document.querySelectorAll('.btn-import');
            const form = document.getElementById('importForm');
            const templateLink = document.getElementById('templateLink');

            importButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const route = this.getAttribute('data-route');
                    const template = this.getAttribute('data-template');

                    form.setAttribute('action', route);
                    templateLink.setAttribute('href', template);
                });
            });
        });
    </script>


@endsection
