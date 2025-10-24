<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormRegisImport;

class KelolaRegisController extends Controller
{
    public function index()
    {
        return view('pages.kelola_regis');
    }

    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        try {
            Excel::import(new FormRegisImport, $request->file('file'));

            return redirect()->route('kelola_regis')->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
