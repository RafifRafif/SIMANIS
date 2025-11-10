<?php

namespace App\Imports;

use App\Models\ProsesAktivitas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProsesAktivitasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Pastikan kolom di Excel ada dan tidak kosong
        if (!isset($row['proses_aktivitas']) || empty($row['proses_aktivitas'])) {
            return null;
        }

        // Cegah duplikasi berdasarkan kolom 'nama_unit'
        if (ProsesAktivitas::where('nama_proses', $row['proses_aktivitas'])->exists()) {
            return null;
        }

        // Simpan data baru
        return new ProsesAktivitas([
            'nama_proses' => $row['proses_aktivitas'],
        ]);
    }
}
