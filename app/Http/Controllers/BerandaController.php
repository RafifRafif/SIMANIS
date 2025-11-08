<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\HeatmapColor;   // ⬅️ tambahkan ini!
use Illuminate\Http\Request;
use App\Models\Registrasi;

class BerandaController extends Controller
{
    public function index()
    {
        $konten = KontenBeranda::all();
        $colors = HeatmapColor::all();   // ⬅️ ambil semua warna matriks
        $total = Registrasi::count();
        $low = Registrasi::where('probabilitas', 'L')->count();
        $medium = Registrasi::where('probabilitas', 'M')->count();
        $high = Registrasi::where('probabilitas', 'H')->count();
        $extreme = Registrasi::where('probabilitas', 'E')->count();

        // Hitung persentase (hindari pembagian nol)
        $probabilitasData = [
            'low' => $total ? round(($low / $total) * 100, 2) : 0,
            'medium' => $total ? round(($medium / $total) * 100, 2) : 0,
            'high' => $total ? round(($high / $total) * 100, 2) : 0,
            'extreme' => $total ? round(($extreme / $total) * 100, 2) : 0,
        ];

        return view('pages.beranda', compact('konten', 'colors', 'probabilitasData'));
    }
}
