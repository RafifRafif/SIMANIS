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
        <form action="{{ route('kelola_pengguna') }}" method="GET" class="d-flex w-25">
            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary btn-sm ms-2" style="height: 35px; padding: 0 15px;">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

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
                    <th>Unit Kerja</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">{{ $user->unitKerja->nama_unit ?? '-' }}</td>
                        <td class="text-center">
                            {{ $user->role === 'p4m' ? 'P4M' : ucwords(str_replace('_', ' ', $user->role)) }}
                        </td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#editDataModal" data-id="{{ $user->id }}" data-nik="{{ $user->username }}"
                                data-nama="{{ $user->name }}" data-unit="{{ $user->unit_kerja_id }}"
                                data-role="{{ $user->role }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Tombol Hapus -->
                            <button class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal"
                                data-bs-target="#hapusDataModal" data-id="{{ $user->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- alert bawaan browser --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
                setTimeout(function () {
                    alert("{{ session('success') }}");
                }, 300);
            @endif

            @if(session('error'))
                setTimeout(function () {
                    alert("{{ session('error') }}");
                }, 300);
            @endif
            });
    </script>

@endsection