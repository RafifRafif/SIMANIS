<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;

class VerifikasiRisikoController extends Controller
{
    public function index()
    {
        $registrasi = Registrasi::where('status_registrasi', 'Belum Terverifikasi')->get();
        return view('pages.verifikasi_risiko', compact('registrasi'));
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