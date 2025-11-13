<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\HeatmapColor;
use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Mitigasi;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $konten = KontenBeranda::all();
        $colors = HeatmapColor::all();   // ⬅️ ambil semua warna matriks

        $daftarTahun = Mitigasi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $registrasiIds = Mitigasi::where('tahun', $tahun)
            ->pluck('registrasi_id')
            ->unique()
            ->toArray();

        if (empty($registrasiIds)) {
            $probabilitasData = [
                'low' => 0,
                'medium' => 0,
                'high' => 0,
                'extreme' => 0,
            ];

            return view('pages.beranda', compact('konten', 'colors', 'probabilitasData', 'tahun', 'daftarTahun'));
        }

        $registrasiFiltered = Registrasi::whereIn('id_registrasi', $registrasiIds)->get();

        $total = $registrasiFiltered->count();
        $low = $registrasiFiltered->where('probabilitas', 'L')->count();
        $medium = $registrasiFiltered->where('probabilitas', 'M')->count();
        $high = $registrasiFiltered->where('probabilitas', 'H')->count();
        $extreme = $registrasiFiltered->where('probabilitas', 'E')->count();

        // Hitung persentase (hindari pembagian nol)
        $probabilitasData = [
            'low' => $total ? round(($low / $total) * 100, 2) : 0,
            'medium' => $total ? round(($medium / $total) * 100, 2) : 0,
            'high' => $total ? round(($high / $total) * 100, 2) : 0,
            'extreme' => $total ? round(($extreme / $total) * 100, 2) : 0,
        ];

        return view('pages.beranda', compact('konten', 'colors', 'probabilitasData', 'tahun', 'daftarTahun'));
    }
}
