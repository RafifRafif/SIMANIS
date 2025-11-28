<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mitigasi;

class EvaluasiController extends Controller
{
    /**
     * Store Evaluasi
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'mitigasi_id' => 'required|exists:mitigasi,id_mitigasi',
            'triwulan' => 'required',
            'tahun' => 'required',
            'hasil_tindak_lanjut' => 'nullable|string',
            'tanggal_evaluasi' => 'nullable|date',
            'status_pelaksanaan' => 'required|string',
            'hasil_penerapan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|url',
        ]);

        Evaluasi::create([
            'mitigasi_id' => $request->mitigasi_id,
            'triwulan' => $request->triwulan,
            'tahun' => $request->tahun,
            'hasil_tindak_lanjut' => $request->hasil_tindak_lanjut,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'status_pelaksanaan' => $request->status_pelaksanaan,
            'hasil_penerapan' => $request->hasil_penerapan,
            'dokumen_pendukung' => $request->dokumen_pendukung,
        ]);

        return back()->with('success', 'Evaluasi berhasil ditambahkan.');
    }

    /**
     * Update Evaluasi
     */
    public function update(Request $request, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $request->validate([
            'mitigasi_id' => 'required|exists:mitigasi,id_mitigasi',
            'triwulan' => 'required',
            'tahun' => 'required',
            'hasil_tindak_lanjut' => 'nullable|string',
            'tanggal_evaluasi' => 'nullable|date',
            'status_pelaksanaan' => 'required|string',
            'hasil_penerapan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|url',
        ]);

        $evaluasi->update([
            'triwulan' => $request->triwulan,
            'tahun' => $request->tahun,
            'hasil_tindak_lanjut' => $request->hasil_tindak_lanjut,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'status_pelaksanaan' => $request->status_pelaksanaan,
            'hasil_penerapan' => $request->hasil_penerapan,
            'dokumen_pendukung' => $request->dokumen_pendukung,
        ]);

        return back()->with('success', 'Evaluasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $evaluasi->delete();

        return back()->with('success', 'Evaluasi berhasil dihapus.');
    }
}
