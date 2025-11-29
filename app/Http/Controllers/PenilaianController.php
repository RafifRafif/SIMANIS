<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\UnitKerja;
use App\Models\Mitigasi;
use App\Models\Evaluasi;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua unit kerja
        $unitKerja = UnitKerja::all();

        // Ambil semua tahun unik dari mitigasi
        $tahunList = Evaluasi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Query dasar
        $query = Registrasi::with([
            'unitKerja',
            'prosesAktivitas',
            'kategoriRisiko',
            'jenisRisiko',
            'ikuTerkait',
            'mitigasis.evaluasis.penilaian',
            'mitigasis.evaluasis'
        ])

        ->where('status_registrasi', 'Terverifikasi')
        ->whereHas('mitigasis');

        // Filter berdasarkan Unit Kerja (kalau dipilih)
        if ($request->filled('unit_kerja_id')) {
            $query->where('unit_kerja_id', $request->unit_kerja_id);
        }

        // Filter berdasarkan Tahun (kalau dipilih)
        if ($request->filled('tahun')) {
            $query->whereHas('mitigasis.evaluasis', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            });
        }

        // Ambil hasil
        $registrasis = $query->get();

        // Kirim ke view
        return view('pages.penilaian', compact('registrasis', 'unitKerja', 'tahunList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evaluasi_id' => 'required|exists:evaluasi,id_evaluasi',
            'uraian' => 'nullable|string'
        ]);

        $evaluasi = Evaluasi::findOrFail($request->evaluasi_id);
        $triwulanTahun = $evaluasi->triwulan . '-' . $evaluasi->tahun;

        Penilaian::create([
            'evaluasi_id' => $evaluasi->id_evaluasi,
            'triwulan_tahun' => $triwulanTahun,
            'uraian' => $request->uraian
        ]);

        return redirect()->back()->with('success', 'Review auditor berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_penilaian' => 'required|exists:penilaian,id_penilaian',
            'uraian' => 'nullable|string'
        ]);

        $penilaian = Penilaian::findOrFail($request->id_penilaian);
        $penilaian->update([
            'uraian' => $request->uraian
        ]);

        return redirect()->back()->with('success', 'Review auditor berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect()->back()->with('success', 'Review auditor berhasil dihapus!');
    }

}
