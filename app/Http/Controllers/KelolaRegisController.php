<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormRegisImport;
use App\Models\UnitKerja;

class KelolaRegisController extends Controller
{
     public function index()
    {
        $unitKerjas = UnitKerja::all();
        return view('pages.kelola_regis', compact('unitKerjas'));
    }

    public function store(Request $request)
    {
        $request->validate(['unitkerja' => 'required']);
        UnitKerja::create(['nama_unit' => $request->unitkerja]);
        return back()->with('success', 'Unit Kerja berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['unitkerja' => 'required']);
        $unit = UnitKerja::findOrFail($id);
        $unit->update(['nama_unit' => $request->unitkerja]);
        return back()->with('success', 'Unit Kerja berhasil diubah!');
    }

    public function destroy($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $unit->delete();
        return back()->with('success', 'Unit Kerja berhasil dihapus!');
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
