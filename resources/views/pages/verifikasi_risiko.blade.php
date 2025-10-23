@extends('layouts.pengguna')

@section('title', 'Verifikasi Risiko')

@push('modals')
    @include('components.verifikasirisiko.modal-edit-status')
@endpush

@section('content')
    <!-- Konten -->
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <h3 class="mt-3 mb-4">Verifikasi Risiko</h3>

    <!-- Card Wrapper -->
    <div class="card shadow-sm border-1">
        <div class="card-body">
            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-hover align-middle table-bordered">
                    <thead class="table-secondary text-center">
                        <tr>
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
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <!-- /card-body -->
    </div> <!-- /card -->
@endsection
