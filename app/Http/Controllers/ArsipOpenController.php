<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Registrasi;

class ArsipOpenController extends Controller
{
    public function index()
    {
        // Ambil semua unit kerja dari tabel untuk dropdown
        $unitKerja = UnitKerja::all();

        // Ambil semua registrasi yang memiliki mitigasi dengan status "Open"
        $registrasi = Registrasi::with([
            'unitKerja',
            'prosesAktivitas',
            'kategoriRisiko',
            'jenisRisiko',
            'ikuTerkait',
            'mitigasis'
        ])
        ->whereHas('mitigasis') // pastikan punya mitigasi
        ->whereDoesntHave('mitigasis', function ($query) {
            $query->whereRaw("LOWER(TRIM(status)) = 'closed'");
        })
        ->get();
        return view('pages.arsip_open', compact('unitKerja', 'registrasi'));
    }
}