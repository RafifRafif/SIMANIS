@extends('layouts.pengguna')
@section('title', 'Beranda')

@section('content')
    {{-- Beranda CSS --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <div class="container-fluid">
        <h3 class="mt-3 mb-4">Beranda</h3>

        <!-- Card Penilaian Mitigasi -->
        <div class="row mb-3">
            <!-- Card 1 -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 d-flex flex-column" style="border: 1px solid #E5E7EB; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.10);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Status Pelaksanaan Evaluasi</h6>
                        <span class="fs-4" style="color: #A6D96A;">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                    </div>
                    <h2 class="mt-2 mb-2" style="font-weight: 700; color: #A6D96A;">{{ $evaluasi_closed?? 0 }}</h2>
                    <p class="mb-0">Closed</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 d-flex flex-column" style="border: 1px solid #E5E7EB; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.10);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Status Pelaksanaan Evaluasi</h6>
                        <span class="fs-4" style="color: #F46D43;">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </span>
                    </div>
                    <h2 class="mt-2 mb-2" style="font-weight: 700; color: #F46D43;">{{ $evaluasi_menurun?? 0}}</h2>
                    <p class="mb-0">Open (Menurun)</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 d-flex flex-column" style="border 1px solid #E5E7EB;border-radius: 12px; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.10);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Status Pelaksanaan Evaluasi</h6>
                        <span class="fs-4" style="color: #DC362E;">
                            <i class="bi bi-x-circle-fill"></i>
                        </span>
                    </div>
                    <h2 class="mt-2 mb-2" style="font-weight: 700; color: #DC362E;">{{ $evaluasi_meningkat ?? 0}}</h2>
                    <p class="mb-0">Open (Meningkat)</p>
                </div>
            </div>
        </div>

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
                        <p class="mb-3 d-flex align-items-center">
                            <span
                                style="display:inline-block; width:18px; height:18px; background-color:#D73026; border-radius:50%; margin-right:6px;"></span>
                            E (Extreme)
                        </p>
                        <p class="d-flex align-items-center" style="color: red;">* Selera Risiko Polibatam = 13</p>
                    </div>
                </div>
            </div> <!-- Card 2: Status Probabilitas Risiko -->
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">Status Probabilitas Risiko</h5>
                    <form method="GET" action="{{ route('beranda') }}">
                        <select class="form-select form-select-sm" name="tahun" style="width: auto;"
                            onchange="this.form.submit()">
                            @foreach ($daftarTahun as $t)
                                <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>
                                    {{ $t }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="bar-container">
                    <div class="bar-label">Low</div>
                    <div class="bar low" style="width: {{ $probabilitasData['low'] }}%;">
                        {{ $probabilitasData['low'] }}%
                    </div>
                </div>

                <div class="bar-container">
                    <div class="bar-label">Medium</div>
                    <div class="bar medium" style="width: {{ $probabilitasData['medium'] }}%;">
                        {{ $probabilitasData['medium'] }}%
                    </div>
                </div>

                <div class="bar-container">
                    <div class="bar-label">High</div>
                    <div class="bar high" style="width: {{ $probabilitasData['high'] }}%;">
                        {{ $probabilitasData['high'] }}%
                    </div>
                </div>

                <div class="bar-container">
                    <div class="bar-label">Extreme</div>
                    <div class="bar extreme" style="width: {{ $probabilitasData['extreme'] }}%;">
                        {{ $probabilitasData['extreme'] }}%
                    </div>
                </div>

            </div>

            @forelse ($konten as $item)
                <div class="card card-illustration p-3 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100">
                    @if ($item->file)
                        <a href="{{ asset($item->file) }}" target="_blank">{{ $item->judul }}</a>
                    @else
                        <p class="text-center mt-2">{{ $item->judul }}</p>
                    @endif
                </div>
            @empty
                <div class="text-center text-muted mt-3">
                    <p>Belum ada konten yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const colorMap = {
                "L": "#A6D96A",
                "M": "#FCE08B",
                "H": "#F46D43",
                "E": "#D73026"
            };

            // Data warna dari database yang dikirim controller
            const savedColors = @json($colors);

            // Kalau data kosong, hentikan
            if (!savedColors || !Array.isArray(savedColors)) return;

            // Iterasi setiap warna yang disimpan
            savedColors.forEach(item => {
                const row = item.row;
                const col = item.col;
                const level = item.color_level; // pastikan nama kolom di DB kamu 'color_level'

                const cell = document.querySelector(`[data-row="${row}"][data-col="${col}"]`);
                if (cell) {
                    const hex = colorMap[level] ?? level; // kalau bukan L/M/H/E, anggap hex
                    cell.style.backgroundColor = hex;
                    cell.textContent = level;
                }
            });
        });
    </script>
@endsection