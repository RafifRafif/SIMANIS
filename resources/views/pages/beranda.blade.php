@extends('layouts.pengguna')
@section('title', 'Beranda')

@section('content')
    {{-- Beranda CSS --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">

    <div class="container-fluid">
        <h3 class="mt-3 mb-4">Beranda</h3>

        <div class="dashboard-grid">
            <!-- Card 1: Heatmap Risiko -->
            <div class="card p-3 d-flex flex-column">
                <h5>Heatmap Risiko</h5>

                <!-- Bungkus tabel dan keterangan jadi satu baris -->
                <div class="d-flex align-items-start">
                    <!-- Tabel Heatmap -->
                    <table id="heatmapTable" class="table table-bordered text-center align-middle me-4"
                        style="width:auto; position: relative;">
                        <thead>
                            <tr>
                                <th class="bg-light"></th>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="1. Tidak Signifikan (dampaknya hanya di area tersebut)">1</th>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="2. Kecil (dampaknya sampai satu bagian/departemen)">2</th>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="3. Sedang (dampaknya sampai satu institusi)">3</th>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="4. Besar (akibatnya sampai ke Customer)">4</th>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="5. Bencana (dampaknya sampai ke pemerintah dan atau Customer)">5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="A. Hampir Pasti (beberapa kali tiap peristiwa/ tiap hari terjadi)">A</th>
                                @for ($col = 1; $col <= 5; $col++)
                                    <td data-row="A" data-col="{{ $col }}" class="heatmap-cell"
                                        style="width:45px;height:45px;cursor:pointer;"></td>
                                @endfor
                            </tr>
                            <tr>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="B. Mungkin Sekali (>1 kali tiap bulan)">B</th>
                                @for ($col = 1; $col <= 5; $col++)
                                    <td data-row="B" data-col="{{ $col }}" class="heatmap-cell"
                                        style="width:45px;height:45px;cursor:pointer;"></td>
                                @endfor
                            </tr>
                            <tr>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="C. Mungkin (Dalam Setahun ada 1–5 kali)">C</th>
                                @for ($col = 1; $col <= 5; $col++)
                                    <td data-row="C" data-col="{{ $col }}" class="heatmap-cell"
                                        style="width:45px;height:45px;cursor:pointer;"></td>
                                @endfor
                            </tr>
                            <tr>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="D. Jarang (dalam setahun hanya 1 kali)">D</th>
                                @for ($col = 1; $col <= 5; $col++)
                                    <td data-row="D" data-col="{{ $col }}" class="heatmap-cell"
                                        style="width:45px;height:45px;cursor:pointer;"></td>
                                @endfor
                            </tr>
                            <tr>
                                <th class="bg-light" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="E. Sangat Jarang (hampir tidak pernah terjadi, dalam 5 tahun hanya 1 kali)">E
                                </th>
                                @for ($col = 1; $col <= 5; $col++)
                                    <td data-row="E" data-col="{{ $col }}" class="heatmap-cell"
                                        style="width:45px;height:45px;cursor:pointer;"></td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>

                    <!-- Keterangan di samping kanan -->
                    <div class="ms-3">
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
            </div> <!-- Card 2: Status Probabilitas Risiko -->
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">Status Probabilitas Risiko</h5>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option selected>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="bar-container">
                    <div class="bar-label">Low</div>
                    <div class="bar low">74%</div>
                </div>
                <div class="bar-container">
                    <div class="bar-label">Medium</div>
                    <div class="bar medium">81%</div>
                </div>
                <div class="bar-container">
                    <div class="bar-label">High</div>
                    <div class="bar high">32%</div>
                </div>
                <div class="bar-container">
                    <div class="bar-label">Extreme</div>
                    <div class="bar extreme">15%</div>
                </div>
            </div>

            <!-- Card Manual Book -->
            <div class="card card-illustration p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/manualbook.png') }}" alt="Manual Book">
                <a href="#">Manual Book Registrasi & Mitigasi Risiko</a>
            </div>

            <!-- Card Definisi Risiko -->
            <div class="card card-illustration p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/definisirisiko.png') }}" alt="Definisi Risiko">
                <a href="#">Definisi & Pemetaan Risiko</a>
            </div>

            <!-- Card IKU -->
            <div class="card card-illustration p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/IKU.png') }}" alt="Indikator Kinerja Utama">
                <a href="#">Indikator Kinerja Utama (IKU)</a>
            </div>

            <!-- Card Matriks -->
            <div class="card card-illustration p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/matriks.png') }}" alt="Matriks Probabilitas Dampak Isu & Risiko">
                <a href="#">Matriks Probabilitas Dampak Isu & Risiko</a>
            </div>
        </div>
    </div>

@endsection