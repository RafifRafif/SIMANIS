<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Registrasi;
use App\Models\Mitigasi;

class ArsipClosedController extends Controller
{
    public function index(Request $request)
    {
         // Ambil semua unit kerja dari tabel untuk dropdown
        $unitKerja = UnitKerja::all();

        // Ambil semua tahun unik dari tabel mitigasi untuk dropdown
        $tahunList = Mitigasi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

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
        });

        // Tambahkan filter unit kerja kalau dipilih
        if ($request->filled('unit_kerja_id')) {
            $registrasi->where('unit_kerja_id', $request->unit_kerja_id);
        }

        // Tambahkan filter tahun kalau dipilih
        if ($request->filled('tahun')) {
            $registrasi->whereHas('mitigasis', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            });
        }

        $registrasi = $registrasi->get();
        return view('pages.arsip_closed', compact('unitKerja', 'tahunList', 'registrasi'));
    }
}