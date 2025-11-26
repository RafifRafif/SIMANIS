<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\HeatmapColor;
use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Mitigasi;
use App\Models\Penilaian;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $konten = KontenBeranda::all();
        $colors = HeatmapColor::all();

        // daftar tahun untuk select
        $daftarTahun = Mitigasi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // ambil mitigasi yang ada di tahun itu (dipakai untuk probabilitas & penilaian)
        $mitigasiIds = Mitigasi::where('tahun', $tahun)
            ->pluck('id_mitigasi')
            ->toArray();

        // default probabilitasData (jika tidak ada registrasi untuk tahun itu)
        $probabilitasData = [
            'low' => 0,
            'medium' => 0,
            'high' => 0,
            'extreme' => 0,
        ];

        if (!empty($mitigasiIds)) {
            // ambil registrasi terkait mitigasi di tahun itu (tetap seperti logic kamu sebelumnya)
            $registrasiIds = Mitigasi::whereIn('id_mitigasi', $mitigasiIds)
                ->pluck('registrasi_id')
                ->unique()
                ->toArray();

            if (!empty($registrasiIds)) {
                $registrasiFiltered = Registrasi::whereIn('id_registrasi', $registrasiIds)->get();

                $total = $registrasiFiltered->count();
                $low = $registrasiFiltered->where('probabilitas', 'Low')->count();
                $medium = $registrasiFiltered->where('probabilitas', 'Medium')->count();
                $high = $registrasiFiltered->where('probabilitas', 'High')->count();
                $extreme = $registrasiFiltered->where('probabilitas', 'Extreme')->count();

                $probabilitasData = [
                    'low' => $total ? round(($low / $total) * 100, 2) : 0,
                    'medium' => $total ? round(($medium / $total) * 100, 2) : 0,
                    'high' => $total ? round(($high / $total) * 100, 2) : 0,
                    'extreme' => $total ? round(($extreme / $total) * 100, 2) : 0,
                ];
            }

            // --- Hitung Penilaian untuk mitigasi di tahun itu ---
            // jika mau menghitung tanpa filter tahun, ganti whereIn('mitigasi_id', $mitigasiIds) 
            // dengan query ke Penilaian langsung (tanpa whereIn).
        }

        return view('pages.beranda', compact(
            'konten',
            'colors',
            'probabilitasData',
            'tahun',
            'daftarTahun'
        ));
    }
}
