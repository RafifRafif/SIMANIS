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
        $request->merge(['modal' => 'tambahUnit']);
        $request->validate([
            'unitkerja' => 'required|unique:unit_kerja,nama_unit',
        ], [
            'unitkerja.required' => 'Nama Unit Kerja wajib diisi!',
            'unitkerja.unique' => 'Unit Kerja sudah ada!',
        ]);

        UnitKerja::create(['nama_unit' => $request->unitkerja]);
        return redirect()->route('kelola_regis')->with('success', 'Unit Kerja berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'modal' => 'editUnit',
            'edit_id' => $id,
        ]);

        $validated = $request->validate([
            'unitkerja' => 'required|unique:unit_kerja,nama_unit,' . $id,
        ], [
            'unitkerja.required' => 'Unit Kerja wajib diisi!',
            'unitkerja.unique' => 'Unit Kerja sudah ada!',
        ]);

        $unit = UnitKerja::findOrFail($id);
        $unit->update(['nama_unit' => $validated['unitkerja']]);

        return redirect()->route('kelola_regis')->with('success', 'Unit Kerja berhasil diubah!');
    }


    public function destroy($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $unit->delete();
        return redirect()->route('kelola_regis')->with('success', 'Unit Kerja berhasil dihapus!');
    }

    public function storeProses(Request $request)
    {
        $request->merge(['modal' => 'tambahProses']);
        $request->validate([
            'proses' => 'required|unique:proses_aktivitas,nama_proses',
        ], [
            'proses.required' => 'Proses/Aktivitas wajib diisi!',
            'proses.unique' => 'Proses/Aktivitas sudah ada!',
        ]);

        ProsesAktivitas::create(['nama_proses' => $request->proses]);
        return redirect()->route('kelola_regis')->with('success', 'Proses/Aktivitas berhasil ditambahkan!');
    }

    public function updateProses(Request $request, $id)
    {
        // pastikan kita menyimpan penanda modal + id yang sedang diedit
        $request->merge([
            'modal' => 'editProses',
            'edit_id' => $id,
        ]);

        $validated = $request->validate([
            'proses' => 'required|unique:proses_aktivitas,nama_proses,' . $id,
        ], [
            'proses.required' => 'Proses/Aktivitas wajib diisi!',
            'proses.unique' => 'Proses/Aktivitas sudah ada!',
        ]);

        $proses = ProsesAktivitas::findOrFail($id);
        $proses->update(['nama_proses' => $validated['proses']]);

        return redirect()->route('kelola_regis')->with('success', 'Proses/Aktivitas berhasil diubah!');
    }



    public function destroyProses($id)
    {
        $proses = ProsesAktivitas::findOrFail($id);
        $proses->delete();
        return redirect()->route('kelola_regis')->with('success', 'Proses/Aktivitas berhasil dihapus!');
    }

    public function storeKategori(Request $request)
    {
        $request->merge(['modal' => 'tambahKategori']);
        $request->validate([
            'kategori' => 'required|unique:kategori_risiko,nama_kategori',
        ], [
            'kategori.required' => 'Nama Kategori Risiko wajib diisi!',
            'kategori.unique' => 'Kategori Risiko sudah ada!',
        ]);

        KategoriRisiko::create(['nama_kategori' => $request->kategori]);
        return redirect()->route('kelola_regis')->with('success', 'Kategori Risiko berhasil ditambahkan!');
    }

    public function updateKategori(Request $request, $id)
    {
        $request->merge([
            'modal' => 'editKategori',
            'edit_id' => $id,
        ]);

        $validated = $request->validate([
            'kategori' => 'required|unique:kategori_risiko,nama_kategori,' . $id,
        ], [
            'kategori.required' => 'Nama Kategori Risiko wajib diisi!',
            'kategori.unique' => 'Kategori Risiko sudah ada!',
        ]);

        $kategori = KategoriRisiko::findOrFail($id);
        $kategori->update(['nama_kategori' => $validated['kategori']]);

        return redirect()->route('kelola_regis')->with('success', 'Kategori Risiko berhasil diubah!');
    }
    public function destroyKategori($id)
    {
        $kategori = KategoriRisiko::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kelola_regis')->with('success', 'Kategori Risiko berhasil dihapus!');
    }

    public function storeJenis(Request $request)
    {
        $request->merge(['modal' => 'tambahJenis']);
        $request->validate([
            'jenis' => 'required|unique:jenis_risiko,nama_jenis',
        ], [
            'jenis.required' => 'Nama Jenis Risiko wajib diisi!',
            'jenis.unique' => 'Jenis Risiko sudah ada!',
        ]);

        JenisRisiko::create(['nama_jenis' => $request->jenis]);
        return redirect()->route('kelola_regis')->with('success', 'Jenis Risiko berhasil ditambahkan!');
    }

    public function updateJenis(Request $request, $id)
    {
        $request->merge([
            'modal' => 'editJenis',
            'edit_id' => $id,
        ]);

        $validated = $request->validate([
            'jenis' => 'required|unique:jenis_risiko,nama_jenis,' . $id,
        ], [
            'jenis.required' => 'Nama Jenis Risiko wajib diisi!',
            'jenis.unique' => 'Jenis Risiko sudah ada!',
        ]);

        $jenis = JenisRisiko::findOrFail($id);
        $jenis->update(['nama_jenis' => $validated['jenis']]);

        return redirect()->route('kelola_regis')->with('success', 'Jenis Risiko berhasil diubah!');
    }

    public function destroyJenis($id)
    {
        $jenis = JenisRisiko::findOrFail($id);
        $jenis->delete();
        return redirect()->route('kelola_regis')->with('success', 'Jenis Risiko berhasil dihapus!');
    }

    public function storeIku(Request $request)
    {
        $request->merge(['modal' => 'tambahIku']);
        $request->validate([
            'iku' => 'required|unique:iku_terkait,nama_iku',
        ], [
            'iku.required' => 'Nama IKU wajib diisi!',
            'iku.unique' => 'IKU Terkait sudah ada!',
        ]);

        IkuTerkait::create(['nama_iku' => $request->iku]);
        return redirect()->route('kelola_regis')->with('success', 'IKU Terkait berhasil ditambahkan!');
    }

    public function updateIku(Request $request, $id)
    {
        $request->merge([
            'modal' => 'editIku',
            'edit_id' => $id,
        ]);

        $validated = $request->validate([
            'iku' => 'required|unique:iku_terkait,nama_iku,' . $id,
        ], [
            'iku.required' => 'Nama IKU wajib diisi!',
            'iku.unique' => 'IKU Terkait sudah ada!',
        ]);

        $iku = IkuTerkait::findOrFail($id);
        $iku->update(['nama_iku' => $validated['iku']]);

        return redirect()->route('kelola_regis')->with('success', 'IKU Terkait berhasil diubah!');
    }

    public function destroyIku($id)
    {
        $iku = IkuTerkait::findOrFail($id);
        $iku->delete();
        return redirect()->route('kelola_regis')->with('success', 'IKU Terkait berhasil dihapus!');
    }

    // Import Unit Kerja
    public function importUnitKerja(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        try {
            Excel::import(new \App\Imports\UnitKerjaImport, $request->file('file'));
            return redirect()->route('kelola_regis')->with('success', 'Data Unit Kerja berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Gagal mengimpor Unit Kerja: ' . $e->getMessage());
        }
    }

    // Import Proses/Aktivitas
    public function importProses(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        try {
            Excel::import(new \App\Imports\ProsesAktivitasImport, $request->file('file'));
            return redirect()->route('kelola_regis')->with('success', 'Data Proses/Aktivitas berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Gagal mengimpor Proses/Aktivitas: ' . $e->getMessage());
        }
    }

    // Import Kategori Risiko
    public function importKategori(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        try {
            Excel::import(new \App\Imports\KategoriRisikoImport, $request->file('file'));
            return redirect()->route('kelola_regis')->with('success', 'Data Kategori Risiko berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Gagal mengimpor Kategori Risiko: ' . $e->getMessage());
        }
    }

    // Import Jenis Risiko
    public function importJenis(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        try {
            Excel::import(new \App\Imports\JenisRisikoImport, $request->file('file'));
            return redirect()->route('kelola_regis')->with('success', 'Data Jenis Risiko berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Gagal mengimpor Jenis Risiko: ' . $e->getMessage());
        }
    }

    // Import IKU Terkait
    public function importIku(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        try {
            Excel::import(new \App\Imports\IkuTerkaitImport, $request->file('file'));
            return redirect()->route('kelola_regis')->with('success', 'Data IKU Terkait berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('kelola_regis')->with('error', 'Gagal mengimpor IKU Terkait: ' . $e->getMessage());
        }
    }

}
