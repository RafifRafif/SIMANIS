@extends('layouts.pengguna')

@section('title', 'Kelola Form Regis')

@section('content')
    {{-- Kelola Regis CSS --}}
    <link rel="stylesheet" href="{{ asset('css/kelola_regis.css') }}">
    <h3 class="mt-3 mb-4">Kelola Form Regis</h3>

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
                                data-bs-target="#tambahDataModal">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>JUR EL</td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>JUR IF</td>
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
                                data-bs-target="#tambahDataModal">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Proses/Aktifitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pengelolaan SDM Jurusan </td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>Sarana dan Prasarana</td>
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
                                data-bs-target="#tambahDataModal">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Risiko Strategis </td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>Risiko Reputasi</td>
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
                                data-bs-target="#tambahDataModal">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Risiko Integritas </td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>Risiko Operasional</td>
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
                                data-bs-target="#tambahDataModal">
                                <i class="fa-solid fa-plus me-1"></i>Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>IKU Terkait</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>IKU 1 </td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>IKU 2</td>
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
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-btn').forEach(button => {
                const collapseEl = document.querySelector(button.dataset.bsTarget);
                const bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false }); // biar bisa manual

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