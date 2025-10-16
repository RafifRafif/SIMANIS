@extends('layouts.pengguna')

@section('title', 'Kelola Pengguna')

@push('modals')
    @include('components.kelolapengguna.modal-tambah-data')
    @include('components.kelolapengguna.modal-edit-data')
    @include('components.kelolapengguna.modal-hapus-data')
@endpush

@section('content')
    <!-- Konten -->
    <h3 class="mt-3 mb-4">Kelola Pengguna</h3>

    <!-- Pencarian dan Dropdown -->
    <div class="d-flex mb-4 gap-2">
        <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Cari...">
            <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <select class="form-select w-auto">
            <option selected>Kategori</option>
            <option value="1">P4M</option>
            <option value="2">Kepala Unit</option>
            <option value="3">Manajemen</option>
        </select>
        <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal"><i
                class="fa-solid fa-plus"></i>Tambah</button>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-secondary text-center">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">106042</td>
                    <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                    <td class="text-center">Manajemen</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                            data-bs-target="#editDataModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusDataModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">106042</td>
                    <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                    <td class="text-center">P4M</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                            data-bs-target="#editDataModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusDataModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">106042</td>
                    <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                    <td class="text-center">P4M</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                            data-bs-target="#editDataModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusDataModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nik = this.getAttribute('data-nik');
                    const nama = this.getAttribute('data-nama');
                    const role = this.getAttribute('data-role');

                    document.getElementById('edit-nik').value = nik;
                    document.getElementById('edit-nama').value = nama;
                    document.getElementById('edit-role').value = role;
                })
            })
        })
    </script>
@endsection
