<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\HeatmapColor;
use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Mitigasi;
use App\Models\Penilaian;
use App\Models\Evaluasi;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun pilihan
        $tahun = $request->get('tahun', Evaluasi::max('tahun'));

        $konten = KontenBeranda::all();
        $colors = HeatmapColor::all();

        // Dropdown tahun
        $daftarTahun = Evaluasi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Mengambil MITIGASI yang punya evaluasi di tahun itu
        $mitigasiIds = Evaluasi::where('tahun', $tahun)
            ->pluck('mitigasi_id')
            ->unique()
            ->toArray();

        // Persiapan default semua data
        $probabilitasData = [
            'low' => 0,
            'medium' => 0,
            'high' => 0,
            'extreme' => 0,
        ];

        $evaluasi_closed = 0;
        $evaluasi_menurun = 0;
        $evaluasi_meningkat = 0;

        if (!empty($mitigasiIds)) {

            // Mengambil registrasi berdasarkan mitigasi
            $registrasiIds = Mitigasi::whereIn('id_mitigasi', $mitigasiIds)
                ->pluck('registrasi_id')
                ->unique()
                ->toArray();

            // Hitung Probabilitas Risiko
            if (!empty($registrasiIds)) {
                $registrasiFiltered = Registrasi::whereIn('id_registrasi', $registrasiIds)->get();

                $total = $registrasiFiltered->count();

                $low = $registrasiFiltered->where('probabilitas', 'Low')->count();
                $medium = $registrasiFiltered->where('probabilitas', 'Medium')->count();
                $high = $registrasiFiltered->where('probabilitas', 'High')->count();
                $extreme = $registrasiFiltered->where('probabilitas', 'Extreme')->count();

                $probabilitasData = [
                    'low' => $total ? round(($low / $total) * 100, 2) : 0,
                    'medium' => $total ? round(($medium / $total) * 100, 2) : 0,
                    'high' => $total ? round(($high / $total) * 100, 2) : 0,
                    'extreme' => $total ? round(($extreme / $total) * 100, 2) : 0,
                ];
            }

            // Hitung Status Evaluasi per Mitigasi (tahun terpilih)
            $mitigasiTahunIni = Mitigasi::with([
                'evaluasis' => function ($q) use ($tahun) {
                    $q->where('tahun', $tahun);
                }
            ])->whereIn('id_mitigasi', $mitigasiIds)->get();

            foreach ($mitigasiTahunIni as $m) {

                // Ambil evaluasi terbaru berdasarkan triwulan (STRING tapi angka)
                $last = $m->evaluasis
                    ->sortByDesc(function ($row) {
                        return (int) $row->triwulan; 
                    })
                    ->first();

                if ($last) {
                    $status = strtolower(trim($last->status_pelaksanaan)); // normalize

                    if ($status === 'closed') {
                        $evaluasi_closed++;
                    } elseif ($status === 'opened-menurun') {
                        $evaluasi_menurun++;
                    } elseif ($status === 'opened-meningkat') {
                        $evaluasi_meningkat++;
                    }
                }
            }
        }

        return view('pages.beranda', compact(
            'konten',
            'colors',
            'probabilitasData',
            'tahun',
            'daftarTahun',
            'evaluasi_closed',
            'evaluasi_menurun',
            'evaluasi_meningkat'
        ));
    }

}
