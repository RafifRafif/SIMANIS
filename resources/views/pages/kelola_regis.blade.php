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
        <button class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#importDataModal">
            <i class="fa-solid fa-upload"></i> Impor
        </button>
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
                            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal"
                                data-bs-target="#tambahDataModalUnit">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
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
                                    <tr>
                                        <td class="centered">1</td>
                                        <td>JUR EL</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalUnit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusUnitKerjaModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="centered">2</td>
                                        <td>JUR IF</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalUnit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusUnitKerjaModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PROSES/AKTIFITAS --}}
            <div>
                <button class="btn btn-secondary toggle-btn text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#prosesAktifitas" aria-expanded="false">
                    Proses/Aktifitas +
                </button>
                <div class="collapse mt-2" id="prosesAktifitas">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Proses/Aktifitas</h6>
                            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal"
                                data-bs-target="#tambahDataModalProsesAktivitas">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Proses/Aktifitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="centered">1</td>
                                        <td>Pengelolaan SDM Jurusan </td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalProsesAktivitas">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusJenisRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="centered">2</td>
                                        <td>Sarana dan Prasarana</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalProsesAktivitas">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusJenisRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
                            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal"
                                data-bs-target="#tambahDataModalKategori">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
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
                                    <tr>
                                        <td class="centered">1</td>
                                        <td>Risiko Strategis </td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalKategori">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusKategoriRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="centered">2</td>
                                        <td>Risiko Reputasi</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalKategori">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusKategoriRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
                            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal"
                                data-bs-target="#tambahDataModalJenis">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
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
                                    <tr>
                                        <td class="centered">1</td>
                                        <td>Risiko Integritas </td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalJenis">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusJenisRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="centered">2</td>
                                        <td>Risiko Operasional</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalJenis">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusJenisRisikoModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
                            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal"
                                data-bs-target="#tambahDataModalIKU">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
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
                                    <tr>
                                        <td class="centered">1</td>
                                        <td>IKU 1 </td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalIKU">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusIkuModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="centered">2</td>
                                        <td>IKU 2</td>
                                        <td class="centered">
                                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                                data-bs-target="#editDataModalIKU">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"data-bs-toggle="modal"
                                                data-bs-target="#hapusIkuModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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

@endsection
