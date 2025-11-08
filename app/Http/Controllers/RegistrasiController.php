<?php

namespace App\Http\Controllers;

use App\Models\IkuTerkait;
use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\UnitKerja;
use App\Models\ProsesAktivitas;
use App\Models\KategoriRisiko;
use App\Models\JenisRisiko;
use App\Models\Iku;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    // 🔹 Menampilkan semua data registrasi
    public function index()
    {
        $userId = auth()->id(); // ambil id user yang sedang login

        $registrasi = Registrasi::with(['unitKerja', 'prosesAktivitas', 'kategoriRisiko', 'jenisRisiko', 'ikuterkait'])
            ->where('user_id', $userId) // ✅ filter berdasarkan user
            ->get();

        // Ambil data dropdown untuk form tambah/edit
        $unitKerja = UnitKerja::all();
        $proses = ProsesAktivitas::all();
        $kategori = KategoriRisiko::all();
        $jenis = JenisRisiko::all();
        $iku = IkuTerkait::all();

        return view('pages.registrasi', compact('registrasi', 'unitKerja', 'proses', 'kategori', 'jenis', 'iku'));
    }

    // 🔹 Menyimpan data baru
    public function store(Request $request)
    {


        $validated = $request->validate([
            'unit_kerja_id' => 'required',
            'proses_aktivitas_id' => 'required',
            'kategori_risiko_id' => 'required',
            'jenis_risiko_id' => 'required',
            'iku_terkait_id' => 'required',
            'isu_resiko' => 'required',
            'jenis_isu' => 'required',
            'akar_permasalahan' => 'required',
            'dampak' => 'required',
            'pihak_terkait' => 'required',
            'kontrol_pencegahan' => 'required',
            'keparahan' => 'required',
            'frekuensi' => 'required',
        ]);

        // Matriks probabilitas
        $matrix = [
            'A' => [1 => 'M', 2 => 'H', 3 => 'H', 4 => 'E', 5 => 'E'],
            'B' => [1 => 'L', 2 => 'M', 3 => 'H', 4 => 'E', 5 => 'E'],
            'C' => [1 => 'L', 2 => 'M', 3 => 'M', 4 => 'H', 5 => 'E'],
            'D' => [1 => 'L', 2 => 'L', 3 => 'M', 4 => 'H', 5 => 'H'],
            'E' => [1 => 'L', 2 => 'L', 3 => 'L', 4 => 'M', 5 => 'H'],
        ];

        $keparahan = (int) $request->keparahan;
        $frekuensi = $request->frekuensi;

        $validated['probabilitas'] = $matrix[$frekuensi][$keparahan] ?? 'L';

        // Tambahkan default value untuk status_registrasi
        $validated['status_registrasi'] = 'Belum Terverifikasi';
        $validated['user_id'] = Auth::id();

        Registrasi::create($validated);

        return redirect()->route('registrasi.index')
            ->with('success', 'Data registrasi berhasil ditambahkan!');
    }



    // 🔹 Mengupdate data registrasi
    public function update(Request $request, $id)
    {
        $registrasi = Registrasi::findOrFail($id);

        $validated = $request->validate([
            'unit_kerja_id' => 'required',
            'proses_aktivitas_id' => 'required',
            'kategori_risiko_id' => 'required',
            'jenis_risiko_id' => 'required',
            'iku_terkait_id' => 'required',
            'isu_resiko' => 'required',
            'jenis_isu' => 'required',
            'akar_permasalahan' => 'required',
            'dampak' => 'required',
            'pihak_terkait' => 'required',
            'kontrol_pencegahan' => 'required',
            'keparahan' => 'required',
            'frekuensi' => 'required',
        ]);

        // hitung ulang probabilitas (biar sama kayak di store)
        $matrix = [
            'A' => [1 => 'M', 2 => 'H', 3 => 'H', 4 => 'E', 5 => 'E'],
            'B' => [1 => 'L', 2 => 'M', 3 => 'H', 4 => 'E', 5 => 'E'],
            'C' => [1 => 'L', 2 => 'M', 3 => 'M', 4 => 'H', 5 => 'E'],
            'D' => [1 => 'L', 2 => 'L', 3 => 'M', 4 => 'H', 5 => 'H'],
            'E' => [1 => 'L', 2 => 'L', 3 => 'L', 4 => 'M', 5 => 'H'],
        ];

        $keparahan = (int) $request->keparahan;
        $frekuensi = $request->frekuensi;
        $validated['probabilitas'] = $matrix[$frekuensi][$keparahan] ?? 'L';

        $registrasi->update($validated);

        return redirect()->route('registrasi.index')->with('success', 'Data registrasi berhasil diperbarui!');
    }


    // 🔹 Menghapus data
    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'Data registrasi berhasil dihapus!');
    }
}
