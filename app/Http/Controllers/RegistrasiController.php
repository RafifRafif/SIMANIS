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
    // Menampilkan semua data registrasi
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

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_kerja_id' => 'required',
            'proses' => 'required|string|max:255', // gabungkan dropdown/manual
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

         // Handle proses dropdown/manual
       $prosesInput = $request->proses;

// Jika input mengandung angka + nama (otomatis dari datalist)
if (preg_match('/^(\d+)\s*-\s*(.+)$/', $prosesInput, $match)) {
    $validated['proses_aktivitas_id'] = (int) $match[1];
    $validated['proses_manual'] = null;
} 
// Jika input angka murni → tetap FK
else if (is_numeric($prosesInput)) {
    $validated['proses_aktivitas_id'] = (int) $prosesInput;
    $validated['proses_manual'] = null;
} 
// Selain itu → treat as manual
else {
    $validated['proses_aktivitas_id'] = null;
    $validated['proses_manual'] = $prosesInput;
}


        // Matriks probabilitas
        $matrix = [
            'A' => [1 => 'Medium', 2 => 'High', 3 => 'High', 4 => 'Extreme', 5 => 'Extreme'],
            'B' => [1 => 'Low', 2 => 'Medium', 3 => 'High', 4 => 'Extreme', 5 => 'Extreme'],
            'C' => [1 => 'Low', 2 => 'Medium', 3 => 'Medium', 4 => 'Extreme', 5 => 'Extreme'],
            'D' => [1 => 'Low', 2 => 'Low', 3 => 'Medium', 4 => 'High', 5 => 'High'],
            'E' => [1 => 'Low', 2 => 'Low', 3 => 'Low', 4 => 'Medium', 5 => 'High'],
        ];

        $keparahan = (int) $request->keparahan;
        $frekuensi = $request->frekuensi;

        $validated['probabilitas'] = $matrix[$frekuensi][$keparahan] ?? 'Low';

        // Tambahkan default value untuk status_registrasi
        $validated['status_registrasi'] = 'Belum Terverifikasi';
        $validated['user_id'] = Auth::id();

        Registrasi::create($validated);

        return redirect()->route('registrasi.index')
            ->with('success', 'Data registrasi berhasil ditambahkan!');
    }

    // Mengupdate data registrasi
    public function update(Request $request, $id)
    {
        $registrasi = Registrasi::findOrFail($id);

        $validated = $request->validate([
            'unit_kerja_id' => 'required',
            'proses' => 'required|max:255',
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

       // Handle proses dropdown/manual
       $prosesInput = $request->proses;

// Jika input mengandung angka + nama (otomatis dari datalist)
if (preg_match('/^(\d+)\s*-\s*(.+)$/', $prosesInput, $match)) {
    $validated['proses_aktivitas_id'] = (int) $match[1];
    $validated['proses_manual'] = null;
} 
// Jika input angka murni → tetap FK
else if (is_numeric($prosesInput)) {
    $validated['proses_aktivitas_id'] = (int) $prosesInput;
    $validated['proses_manual'] = null;
} 
// Selain itu → treat as manual
else {
    $validated['proses_aktivitas_id'] = null;
    $validated['proses_manual'] = $prosesInput;
}

        // hitung ulang probabilitas (biar sama kayak di store)
        $matrix = [
            'A' => [1 => 'Medium', 2 => 'High', 3 => 'High', 4 => 'Extreme', 5 => 'Extreme'],
            'B' => [1 => 'Low', 2 => 'Medium', 3 => 'High', 4 => 'Extreme', 5 => 'Extreme'],
            'C' => [1 => 'Low', 2 => 'Medium', 3 => 'Medium', 4 => 'High', 5 => 'Extreme'],
            'D' => [1 => 'Low', 2 => 'Low', 3 => 'Medium', 4 => 'High', 5 => 'High'],
            'E' => [1 => 'Low', 2 => 'Low', 3 => 'Low', 4 => 'Medium', 5 => 'High'],
        ];

        $keparahan = (int) $request->keparahan;
        $frekuensi = $request->frekuensi;
        $validated['probabilitas'] = $matrix[$frekuensi][$keparahan] ?? 'Low';

        $registrasi->update($validated);

        return redirect()->route('registrasi.index')->with('success', 'Data registrasi berhasil diperbarui!');
    }
    
    // Menghapus data
    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'Data registrasi berhasil dihapus!');
    }
}