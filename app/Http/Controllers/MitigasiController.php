<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitigasi;

class MitigasiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'registrasi_id' => 'required|exists:registrasi,id_registrasi',
            'triwulan' => 'required',
            'tahun' => 'required',
            'isurisiko' => 'nullable|string',
            'rencana_aksi' => 'required|string',
            'tanggal_pelaksanaan' => 'nullable|date',
            'hasil_tindak_lanjut' => 'nullable|string',
            'tanggal_evaluasi' => 'nullable|date',
            'status' => 'required|string',
            'hasil_manajemen_risiko' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|url',
        ]);

        Mitigasi::create($data);

        return back()->with('success', 'Mitigasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $mitigasi = Mitigasi::findOrFail($id);

        $data = $request->validate([
            'triwulan' => 'required',
            'tahun' => 'required',
            'isurisiko' => 'nullable|string',
            'rencana_aksi' => 'required|string',
            'tanggal_pelaksanaan' => 'nullable|date',
            'hasil_tindak_lanjut' => 'nullable|string',
            'tanggal_evaluasi' => 'nullable|date',
            'status' => 'required|string',
            'hasil_manajemen_risiko' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|url',
        ]);

        $mitigasi->update($data);

        return back()->with('success', 'Mitigasi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $mitigasi = Mitigasi::findOrFail($id);
        $mitigasi->delete();

        return back()->with('success', 'Mitigasi berhasil dihapus.');
    }
}
