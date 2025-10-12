@extends('layouts.pengguna')

@section('title', 'Kelola Pengguna')

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
            <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal"><i class="fa-solid fa-plus"></i>Tambah</button>
        </div>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-bordered">
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
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>106042</td>
                        <td>Evaliata Br. Sembiring, S.Kom., M.Cs.</td>
                        <td>P4M</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Tambah Data Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-4">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="" selected disabled>Pilih Role</option>
                                        <option value="P4M">P4M</option>
                                        <option value="Kepala Unit">Kepala Unit</option>
                                        <option value="Manajemen">Manajemen</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100"></i>Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Data -->
            <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDataLabel">Edit Data Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST">
                                <div class="mb-3">
                                    <label for="edit-nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="edit-nik" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="edit-nama" name="nama" required>
                                </div>
                                <div class="mb-4">
                                    <label for="edit-role" class="form-label">Role</label>
                                    <select class="form-select" id="edit-role" name="role" required>
                                        <option value="" disabled selected>Pilih Role</option>
                                        <option value="P4M">P4M</option>
                                        <option value="Kepala Unit">Kepala Unit</option>
                                        <option value="Manajemen">Manajemen</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Perbarui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
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