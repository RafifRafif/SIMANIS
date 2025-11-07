<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormRegisImport;
use App\Models\UnitKerja;
use App\Models\ProsesAktivitas;
use App\Models\KategoriRisiko;
use App\Models\JenisRisiko;
use App\Models\IkuTerkait;

class KelolaRegisController extends Controller
{
     public function index()
    {
        $unitKerja = UnitKerja::all();
        $prosesAktivitas = ProsesAktivitas::all();
        $kategoriRisiko = KategoriRisiko::all();
        $jenisRisiko = JenisRisiko::all();
        $ikuTerkait = IkuTerkait::all();
        return view('pages.kelola_regis', compact('unitKerja', 'prosesAktivitas', 'kategoriRisiko', 'jenisRisiko', 'ikuTerkait'));
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

    public function storeProses(Request $request)
    {
        $request->validate(['proses' => 'required']);
        ProsesAktivitas::create(['nama_proses' => $request->proses]);
        return back()->with('success', 'Proses/Aktivitas berhasil ditambahkan!');
    }

    public function updateProses(Request $request, $id)
    {
        $request->validate(['proses' => 'required']);
        $proses = ProsesAktivitas::findOrFail($id);
        $proses->update(['nama_proses' => $request->proses]);
        return back()->with('success', 'Proses/Aktivitas berhasil diubah!');
    }

    public function destroyProses($id)
    {
        $proses = ProsesAktivitas::findOrFail($id);
        $proses->delete();
        return back()->with('success', 'Proses/Aktivitas berhasil dihapus!');
    }

    public function storeKategori(Request $request)
    {
        $request->validate(['kategori' => 'required']);
        KategoriRisiko::create(['nama_kategori' => $request->kategori]);
        return back()->with('success', 'Kategori Risiko berhasil ditambahkan!');
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate(['kategori' => 'required']);
        $kategori = KategoriRisiko::findOrFail($id);
        $kategori->update(['nama_kategori' => $request->kategori]);
        return back()->with('success', 'Kategori Risiko berhasil diubah!');
    }

    public function destroyKategori($id)
    {
        $kategori = KategoriRisiko::findOrFail($id);
        $kategori->delete();
        return back()->with('success', 'Kategori Risiko berhasil dihapus!');
    }

    public function storeJenis(Request $request)
    {
        $request->validate(['jenis' => 'required']);
        JenisRisiko::create(['nama_jenis' => $request->jenis]);
        return back()->with('success', 'Jenis Risiko berhasil ditambahkan!');
    }

    public function updateJenis(Request $request, $id)
    {
        $request->validate(['jenis' => 'required']);
        $jenis = JenisRisiko::findOrFail($id);
        $jenis->update(['nama_jenis' => $request->jenis]);
        return back()->with('success', 'Jenis Risiko berhasil diubah!');
    }

    public function destroyJenis($id)
    {
        $jenis = JenisRisiko::findOrFail($id);
        $jenis->delete();
        return back()->with('success', 'Jenis Risiko berhasil dihapus!');
    }

    public function storeIku(Request $request)
    {
        $request->validate(['iku' => 'required']);
        IkuTerkait::create(['nama_iku' => $request->iku]);
        return back()->with('success', 'IKU Terkait berhasil ditambahkan!');
    }

    public function updateIku(Request $request, $id)
    {
        $request->validate(['iku' => 'required']);
        $iku = IkuTerkait::findOrFail($id);
        $iku->update(['nama_iku' => $request->iku]);
        return back()->with('success', 'IKU Terkait berhasil diubah!');
    }

    public function destroyIku($id)
    {
        $iku = IkuTerkait::findOrFail($id);
        $iku->delete();
        return back()->with('success', 'IKU Terkait berhasil dihapus!');
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
