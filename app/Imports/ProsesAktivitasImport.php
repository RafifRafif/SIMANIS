<?php

namespace App\Imports;

use App\Models\ProsesAktivitas;
use App\Models\UnitKerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProsesAktivitasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Validasi kolom di excel harus ada
        if (!isset($row['proses_aktivitas']) || empty($row['proses_aktivitas'])) {
            return null;
        }

        if (!isset($row['unit_kerja']) || empty($row['unit_kerja'])) {
            return null;
        }

        // Ambil unit kerja berdasarkan nama_unit
        $unit = UnitKerja::where('nama_unit', $row['unit_kerja'])->first();

        // Jika unit kerja tidak ditemukan, skip data
        if (!$unit) {
            return null;
        }

        // Cek duplikasi proses untuk unit kerja yang sama
        $existing = ProsesAktivitas::where('nama_proses', $row['proses_aktivitas'])
            ->where('unit_kerja_id', $unit->id)
            ->exists();

        if ($existing) {
            return null;
        }

        // Simpan data baru
        return new ProsesAktivitas([
            'nama_proses'   => $row['proses_aktivitas'],
            'unit_kerja_id' => $unit->id
        ]);
    }
}
