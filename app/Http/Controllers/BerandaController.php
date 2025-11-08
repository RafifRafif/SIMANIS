<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\HeatmapColor;   // ⬅️ tambahkan ini!
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $konten = KontenBeranda::all();
        $colors = HeatmapColor::all();   // ⬅️ ambil semua warna matriks
        return view('pages.beranda', compact('konten', 'colors'));
    }
}
