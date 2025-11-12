<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Registrasi;
use App\Models\Mitigasi;

class ArsipOpenController extends Controller
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

        // Jalankan query (get() tetap di akhir, sama seperti kode lama)
        $registrasi = $registrasi->get();

        // Kirim data ke view
        return view('pages.arsip_open', compact('unitKerja', 'tahunList', 'registrasi'));
    }
}
