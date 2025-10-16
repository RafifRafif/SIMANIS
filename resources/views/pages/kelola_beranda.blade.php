@extends('layouts.pengguna')

@section('title', 'Kelola Beranda')

@push('modals')
    @include('components.kelolaberanda.modal-tambah-konten')
    @include('components.kelolaberanda.modal-edit-konten')
    @include('components.kelolaberanda.modal-hapus-konten')
@endpush

@section('content')

    <style>
        .color-option:hover {
            transform: scale(1.15);
            transition: 0.15s;
        }
    </style>

    <div class="container-fluid">

        <h3 class="mt-3 mb-4">Kelola Beranda</h3>

        <!-- Heatmap Risiko -->
        <div class="card shadow-sm mb-4">
            <div class="card-body position-relative">
                <h5 class="mb-3 fw-semibold">Heatmap Risiko</h5>

                <div class="d-flex align-items-start flex-wrap">
                    <!-- Tabel Heatmap -->
                    <table id="heatmapTable" class="table table-bordered text-center align-middle me-4"
                        style="width:auto; position: relative;">
                        <thead>
                            <tr>
                                <th class="bg-light"></th> <!-- Kosong untuk pojok kiri atas -->
                                @for ($col = 1; $col <= 5; $col++)
                                    <th class="bg-light">{{ $col }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['A', 'B', 'C', 'D', 'E'] as $row)
                                <tr>
                                    <th class="bg-light">{{ $row }}</th>
                                    @for ($col = 1; $col <= 5; $col++)
                                        <td data-row="{{ $row }}" data-col="{{ $col }}"
                                            class="heatmap-cell" style="width:45px;height:45px;cursor:pointer;">
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <!-- Keterangan -->
                    <div>
                        <p class="mb-1 d-flex align-items-center">
                            <span
                                style="display:inline-block; width:18px; height:18px; background-color:#A6D96A; border-radius:50%; margin-right:6px;"></span>
                            L (Low)
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <span
                                style="display:inline-block; width:18px; height:18px; background-color:#FCE08B; border-radius:50%; margin-right:6px;"></span>
                            M (Medium)
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <span
                                style="display:inline-block; width:18px; height:18px; background-color:#F46D43; border-radius:50%; margin-right:6px;"></span>
                            H (High)
                        </p>
                        <p class="mb-0 d-flex align-items-center">
                            <span
                                style="display:inline-block; width:18px; height:18px; background-color:#D73026; border-radius:50%; margin-right:6px;"></span>
                            E (Extreme)
                        </p>
                    </div>
                </div>


                <!-- Popup Pilihan Warna -->
                <div id="colorPickerPopup" class="card p-2 shadow-sm position-absolute d-none"
                    style="width: 90px; z-index:1000;">
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <div class="color-option rounded-circle" data-color="L"
                            style="width:25px; height:25px; background-color:#A6D96A; cursor:pointer;"></div>
                        <div class="color-option rounded-circle" data-color="M"
                            style="width:25px; height:25px; background-color:#FCE08B; cursor:pointer;"></div>
                        <div class="color-option rounded-circle" data-color="H"
                            style="width:25px; height:25px; background-color:#F46D43; cursor:pointer;"></div>
                        <div class="color-option rounded-circle" data-color="E"
                            style="width:25px; height:25px; background-color:#D73026; cursor:pointer;"></div>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button class="btn btn-secondary fw-medium ms-auto">Batal</button>
                    <button class="btn btn-primary fw-medium ms-auto">Simpan</button>
                </div>
            </div>
        </div>

        <!-- Konten Beranda -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">Konten Beranda</h5>
                    <button class="btn btn-primary fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                        <i class="fa-solid fa-plus"></i> Tambah
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="width:50px;">No</th>
                                <th style="width:100px;">Gambar</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th style="width:100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset('images/gu.jpg') }}" alt="gambar1" width="60"></td>
                                <td class="text-start">Manual Book Registrasi dan Mitigasi Risiko</td>
                                <td>manualbook.pdf</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusDataModal"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="{{ asset('images/gu.jpg') }}" alt="gambar2" width="60"></td>
                                <td class="text-start">Definisi & Pemetaan Risiko</td>
                                <td>definisirisko.pdf</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusDataModal"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Interaktif -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cells = document.querySelectorAll(".heatmap-cell");
            const popup = document.getElementById("colorPickerPopup");
            let activeCell = null;

            const colors = {
                "L": "#A6D96A",
                "M": "#FCE08B",
                "H": "#F46D43",
                "E": "#D73026"
            };

            // Klik sel → tampilkan popup tepat di dekat sel
            cells.forEach(cell => {
                cell.addEventListener("click", (e) => {
                    e.stopPropagation();
                    activeCell = cell;

                    const cellRect = cell.getBoundingClientRect();
                    const containerRect = cell.closest(".card-body").getBoundingClientRect();

                    // Posisi popup sedikit di kanan bawah sel
                    const top = cellRect.top - containerRect.top + cell.offsetHeight + 5;
                    const left = cellRect.left - containerRect.left + cell.offsetWidth + 5;

                    popup.style.top = `${top}px`;
                    popup.style.left = `${left}px`;
                    popup.classList.remove("d-none");
                });
            });

            // Klik warna → ubah warna sel
            popup.querySelectorAll(".color-option").forEach(option => {
                option.addEventListener("click", () => {
                    const level = option.dataset.color;
                    if (activeCell) {
                        activeCell.style.backgroundColor = colors[level];
                        activeCell.textContent = level;
                        popup.classList.add("d-none");
                    }
                });
            });

            // Klik di luar popup → sembunyikan
            document.addEventListener("click", (e) => {
                if (!popup.contains(e.target) && !e.target.classList.contains("heatmap-cell")) {
                    popup.classList.add("d-none");
                }
            });
        });
    </script>
@endsection
