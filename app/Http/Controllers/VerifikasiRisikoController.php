<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;

class VerifikasiRisikoController extends Controller
{
    public function index(Request $request)
    {
        $unitKerja = \App\Models\UnitKerja::all();

        $registrasi = Registrasi::where('status_registrasi', 'Belum Terverifikasi')->get();

        if ($request->filled('unit_kerja_id')) {
            $registrasi = $registrasi->where('unit_kerja_id', $request->unit_kerja_id);
        }

        return view('pages.verifikasi_risiko', compact('registrasi', 'unitKerja'));
    }


    public function updateStatus(Request $request, $id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update([
            'status_registrasi' => $request->status,
        ]);

        return redirect()->route('verifikasi_risiko')->with('success', 'Status risiko berhasil diubah!');
    }
}