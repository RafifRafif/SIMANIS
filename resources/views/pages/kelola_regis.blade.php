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

            {{-- 1. UNIT KERJA --}}
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
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal" data-template="{{ asset('template/unitkerja.xlsx') }}"
                                    data-route="{{ route('formregis.import.unitkerja') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalUnit">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('kelola_regis') }}" method="GET" class="d-flex w-25 mb-3">
                            <input type="text" name="search_unit" class="form-control" placeholder="Cari Unit Kerja..."
                                value="{{ request('search_unit') }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Unit Kerja</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unitKerja as $index => $unit)
                                        <tr>
                                            <td class="text-center">
                                                {{-- Checkbox Per Baris --}}
                                                <input type="checkbox" class="form-check-input check-unit"
                                                    value="{{ $unit->id }}">
                                                {{ $unitKerja->firstItem() + $index }}
                                            </td>
                                            <td>{{ $unit->nama_unit }}</td>
                                            <td class="centered">
                                                <button class="btn btn-sm btn-primary edit-unit-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalUnit"
                                                    data-id="{{ $unit->id }}" data-nama="{{ $unit->nama_unit }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>

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
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            {{-- CHECKBOX PILIH SEMUA --}}
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="select-all-unit">
                                    <label class="form-check-label" for="select-all-unit">
                                        Pilih Semua
                                    </label>
                                </div>
                                {{-- Tombol Hapus Semua --}}
                                <button type="button" id="delete-selected-unit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                            {{-- NAVIGASI PAGINASI --}}
                            @if ($unitKerja->hasPages())
                                <div class="d-flex align-items-center gap-1">
                                    <a class="btn btn-sm btn-light {{ $unitKerja->onFirstPage() ? 'disabled' : '' }}"
                                        href="{{ $unitKerja->previousPageUrl() }}">
                                        &larr;
                                    </a>
                                    @foreach ($unitKerja->getUrlRange(1, $unitKerja->lastPage()) as $page => $url)
                                        <a class="btn btn-sm {{ $page == $unitKerja->currentPage() ? 'btn-primary' : 'btn-light' }}"
                                            href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    @endforeach
                                    <a class="btn btn-sm btn-light {{ !$unitKerja->hasMorePages() ? 'disabled' : '' }}"
                                        href="{{ $unitKerja->nextPageUrl() }}">
                                        &rarr;
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. PROSES/AKTIVITAS --}}
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
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/proses_aktivitas.xlsx') }}"
                                    data-route="{{ route('formregis.import.proses') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalProsesAktivitas">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('kelola_regis') }}" method="GET" class="d-flex w-25 mb-3">
                            <input type="text" name="search_proses" class="form-control"
                                placeholder="Cari Proses/Aktivitas..." value="{{ request('search_proses') }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Proses/Aktivitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prosesAktivitas as $index => $proses)
                                        <tr>
                                            <td class="text-center">
                                                {{-- Checkbox per baris --}}
                                                <input type="checkbox" class="form-check-input check-proses"
                                                    value="{{ $proses->id }}">
                                                {{ $prosesAktivitas->firstItem() + $index }}
                                            </td>
                                            <td>{{ $proses->nama_proses }}</td>
                                            <td class="centered">
                                                <button class="btn btn-sm btn-primary edit-proses-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalProsesAktivitas"
                                                    data-id="{{ $proses->id }}"
                                                    data-nama="{{ $proses->nama_proses }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
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
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="select-all-proses">
                                    <label class="form-check-label" for="select-all-proses">Pilih Semua</label>
                                </div>
                                <button type="button" id="delete-selected-proses" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                            @if ($prosesAktivitas->hasPages())
                                <div class="d-flex align-items-center gap-1">
                                    <a class="btn btn-sm btn-light {{ $prosesAktivitas->onFirstPage() ? 'disabled' : '' }}"
                                        href="{{ $prosesAktivitas->previousPageUrl() }}">&larr;</a>
                                    @foreach ($prosesAktivitas->getUrlRange(1, $prosesAktivitas->lastPage()) as $page => $url)
                                        <a class="btn btn-sm {{ $page == $prosesAktivitas->currentPage() ? 'btn-primary' : 'btn-light' }}"
                                            href="{{ $url }}">{{ $page }}</a>
                                    @endforeach
                                    <a class="btn btn-sm btn-light {{ !$prosesAktivitas->hasMorePages() ? 'disabled' : '' }}"
                                        href="{{ $prosesAktivitas->nextPageUrl() }}">&rarr;</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. KATEGORI RISIKO --}}
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
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/kategori_risiko.xlsx') }}"
                                    data-route="{{ route('formregis.import.kategori') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalKategori">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('kelola_regis') }}" method="GET" class="d-flex w-25 mb-3">
                            <input type="text" name="search_kategori" class="form-control"
                                placeholder="Cari Kategori Risiko..." value="{{ request('search_kategori') }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Kategori Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriRisiko as $index => $kategori)
                                        <tr>
                                            <td class="text-center">
                                                {{-- Checkbox Per Baris --}}
                                                <input type="checkbox" class="form-check-input check-kategori"
                                                    value="{{ $kategori->id }}">
                                                {{ $kategoriRisiko->firstItem() + $index }}
                                            </td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td class="centered">
                                                <button class="btn btn-sm btn-primary edit-kategori-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalKategori"
                                                    data-id="{{ $kategori->id }}"
                                                    data-nama="{{ $kategori->nama_kategori }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
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
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="select-all-kategori">
                                    <label class="form-check-label" for="select-all-kategori">Pilih Semua</label>
                                </div>
                                <button type="button" id="delete-selected-kategori" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                            @if ($kategoriRisiko->hasPages())
                                <div class="d-flex align-items-center gap-1">
                                    <a class="btn btn-sm btn-light {{ $kategoriRisiko->onFirstPage() ? 'disabled' : '' }}"
                                        href="{{ $kategoriRisiko->previousPageUrl() }}">&larr;</a>
                                    @foreach ($kategoriRisiko->getUrlRange(1, $kategoriRisiko->lastPage()) as $page => $url)
                                        <a class="btn btn-sm {{ $page == $kategoriRisiko->currentPage() ? 'btn-primary' : 'btn-light' }}"
                                            href="{{ $url }}">{{ $page }}</a>
                                    @endforeach
                                    <a class="btn btn-sm btn-light {{ !$kategoriRisiko->hasMorePages() ? 'disabled' : '' }}"
                                        href="{{ $kategoriRisiko->nextPageUrl() }}">&rarr;</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. JENIS RISIKO --}}
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
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal"
                                    data-template="{{ asset('template/jenis_risiko.xlsx') }}"
                                    data-route="{{ route('formregis.import.jenis') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalJenis">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('kelola_regis') }}" method="GET" class="d-flex w-25 mb-3">
                            <input type="text" name="search_jenis" class="form-control"
                                placeholder="Cari Jenis Risiko..." value="{{ request('search_jenis') }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Jenis Risiko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisRisiko as $index => $jenis)
                                        <tr>
                                            <td class="text-center">
                                                {{-- Checkbox Per Baris --}}
                                                <input type="checkbox" class="form-check-input check-jenis"
                                                    value="{{ $jenis->id }}">
                                                {{ $jenisRisiko->firstItem() + $index }}
                                            </td>
                                            <td>{{ $jenis->nama_jenis }}</td>
                                            <td class="centered">
                                                <button class="btn btn-sm btn-primary edit-jenis-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalJenis"
                                                    data-id="{{ $jenis->id }}" data-nama="{{ $jenis->nama_jenis }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
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
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="select-all-jenis">
                                    <label class="form-check-label" for="select-all-jenis">Pilih Semua</label>
                                </div>
                                <button type="button" id="delete-selected-jenis" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                            @if ($jenisRisiko->hasPages())
                                <div class="d-flex align-items-center gap-1">
                                    <a class="btn btn-sm btn-light {{ $jenisRisiko->onFirstPage() ? 'disabled' : '' }}"
                                        href="{{ $jenisRisiko->previousPageUrl() }}">&larr;</a>
                                    @foreach ($jenisRisiko->getUrlRange(1, $jenisRisiko->lastPage()) as $page => $url)
                                        <a class="btn btn-sm {{ $page == $jenisRisiko->currentPage() ? 'btn-primary' : 'btn-light' }}"
                                            href="{{ $url }}">{{ $page }}</a>
                                    @endforeach
                                    <a class="btn btn-sm btn-light {{ !$jenisRisiko->hasMorePages() ? 'disabled' : '' }}"
                                        href="{{ $jenisRisiko->nextPageUrl() }}">&rarr;</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- 5. IKU TERKAIT --}}
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
                                <button class="btn btn-success fw-bold btn-import" data-bs-toggle="modal"
                                    data-bs-target="#importDataModal" data-template="{{ asset('template/iku.xlsx') }}"
                                    data-route="{{ route('formregis.import.iku') }}">
                                    <i class="fa-solid fa-upload"></i> Import
                                </button>
                                <button class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModalIku">
                                    <i class="fa-solid fa-plus me-1"></i>Tambah
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('kelola_regis') }}" method="GET" class="d-flex w-25 mb-3">
                            <input type="text" name="search_iku" class="form-control" placeholder="Cari IKU..."
                                value="{{ request('search_iku') }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>IKU Terkait</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ikuTerkait as $index => $iku)
                                        <tr>
                                            <td class="text-center">
                                                {{-- Checkbox Per baris --}}
                                                <input type="checkbox" class="form-check-input check-iku"
                                                    value="{{ $iku->id }}">
                                                {{ $ikuTerkait->firstItem() + $index }}
                                            </td>
                                            <td>{{ $iku->nama_iku }}</td>
                                            <td class="centered">
                                                <button class="btn btn-sm btn-primary edit-iku-button"
                                                    data-bs-toggle="modal" data-bs-target="#editDataModalIku"
                                                    data-id="{{ $iku->id }}" data-nama="{{ $iku->nama_iku }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete-iku-button"
                                                    data-bs-toggle="modal" data-bs-target="#hapusIkuModal"
                                                    data-id="{{ $iku->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="select-all-iku">
                                    <label class="form-check-label" for="select-all-iku">Pilih Semua</label>
                                </div>
                                <button type="button" id="delete-selected-iku" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                            @if ($ikuTerkait->hasPages())
                                <div class="d-flex align-items-center gap-1">
                                    <a class="btn btn-sm btn-light {{ $ikuTerkait->onFirstPage() ? 'disabled' : '' }}"
                                        href="{{ $ikuTerkait->previousPageUrl() }}">&larr;</a>
                                    @foreach ($ikuTerkait->getUrlRange(1, $ikuTerkait->lastPage()) as $page => $url)
                                        <a class="btn btn-sm {{ $page == $ikuTerkait->currentPage() ? 'btn-primary' : 'btn-light' }}"
                                            href="{{ $url }}">{{ $page }}</a>
                                    @endforeach
                                    <a class="btn btn-sm btn-light {{ !$ikuTerkait->hasMorePages() ? 'disabled' : '' }}"
                                        href="{{ $ikuTerkait->nextPageUrl() }}">&rarr;</a>
                                </div>
                            @endif
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

    {{-- Script untuk alert CRUD --}}
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

    {{-- Script Keep Open Collapse --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let opened = "{{ session('collapse_open') }}";

            if (opened) {
                let el = document.getElementById(opened);
                if (el) {
                    let collapse = new bootstrap.Collapse(el, {
                        show: true
                    });

                    //ubah tombol + jadi -
                    let btn = document.querySelector(`[data-bs-target="#${opened}"]`);
                    if (btn) btn.textContent = btn.textContent.replace('+', '−');
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.collapse').forEach(collapse => {

                // kalau dibuka, simpan ke session
                collapse.addEventListener('show.bs.collapse', function() {
                    fetch("/save-collapse", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            open: collapse.id
                        })
                    });
                });

                // kalau ditutup, hapus session
                collapse.addEventListener('hide.bs.collapse', function() {
                    fetch("/save-collapse", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            open: null
                        })
                    });
                });

            });
        });
    </script>

    {{-- Script untuk Multi-Select & Hapus Semua --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Konfigurasi untuk 5 Tabel
            const configs = [{
                    name: 'Unit Kerja',
                    masterId: '#select-all-unit',
                    btnId: '#delete-selected-unit',
                    checkboxClass: '.check-unit',
                    route: "{{ route('unitkerja.delete-selected') }}"
                },
                {
                    name: 'Proses/Aktivitas',
                    masterId: '#select-all-proses',
                    btnId: '#delete-selected-proses',
                    checkboxClass: '.check-proses',
                    route: "{{ route('proses.delete-selected') }}"
                },
                {
                    name: 'Kategori Risiko',
                    masterId: '#select-all-kategori',
                    btnId: '#delete-selected-kategori',
                    checkboxClass: '.check-kategori',
                    route: "{{ route('kategori.delete-selected') }}"
                },
                {
                    name: 'Jenis Risiko',
                    masterId: '#select-all-jenis',
                    btnId: '#delete-selected-jenis',
                    checkboxClass: '.check-jenis',
                    route: "{{ route('jenis.delete-selected') }}"
                },
                {
                    name: 'IKU',
                    masterId: '#select-all-iku',
                    btnId: '#delete-selected-iku',
                    checkboxClass: '.check-iku',
                    route: "{{ route('iku.delete-selected') }}"
                }
            ];

            // Loop setiap konfigurasi
            configs.forEach(config => {
                const masterCheckbox = document.querySelector(config.masterId);
                const deleteBtn = document.querySelector(config.btnId);

                if (!masterCheckbox || !deleteBtn) return; // Skip jika elemen tidak ada

                // 1. Event Listener: Pilih Semua
                masterCheckbox.addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll(config.checkboxClass);
                    checkboxes.forEach(cb => {
                        cb.checked = this.checked;
                    });
                });

                // 2. Event Listener: Tombol Hapus
                deleteBtn.addEventListener('click', function() {
                    // Ambil semua checkbox yang tercentang
                    const checkedBoxes = document.querySelectorAll(config.checkboxClass + ':checked');

                    // Validasi jika kosong
                    if (checkedBoxes.length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Peringatan',
                            text: 'Silakan pilih data ' + config.name +
                                ' yang ingin dihapus terlebih dahulu.'
                        });
                        return;
                    }

                    // Konfirmasi User
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda akan menghapus " + checkedBoxes.length + " data " + config
                            .name + " terpilih.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kumpulkan ID
                            let ids = [];
                            checkedBoxes.forEach(cb => ids.push(cb.value));

                            // Submit Form Dinamis
                            submitForm(config.route, ids);
                        }
                    });
                });
            });

            // Fungsi Helper untuk Membuat dan Submit Form
            function submitForm(actionUrl, ids) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;

                // Input CSRF Token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = "{{ csrf_token() }}";
                form.appendChild(csrfToken);

                // Input Method DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                // Input Array IDs
                ids.forEach(id => {
                    const inputId = document.createElement('input');
                    inputId.type = 'hidden';
                    inputId.name = 'ids[]';
                    inputId.value = id;
                    form.appendChild(inputId);
                });

                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>

@endsection