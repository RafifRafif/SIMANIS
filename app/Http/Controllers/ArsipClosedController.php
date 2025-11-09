<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Registrasi;

class ArsipClosedController extends Controller
{
    public function index()
    {
        // Ambil semua unit kerja dari tabel untuk dropdown
        $unitKerja = UnitKerja::all();

        // Ambil semua registrasi yang memiliki mitigasi dengan status "Closed"
        $registrasi = Registrasi::with([
            'unitKerja',
            'prosesAktivitas',
            'kategoriRisiko',
            'jenisRisiko',
            'ikuTerkait',
            'mitigasis'
        ])
        ->whereHas('mitigasis', function ($query) {
            $query->whereRaw("LOWER(TRIM(status)) = 'closed'");
        })
        ->get();
        return view('pages.arsip_closed', compact('unitKerja', 'registrasi'));
    }
}