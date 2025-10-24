<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FormRegisImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Lewati baris header
        foreach ($rows->skip(1) as $row) {
            // Contoh: simpan ke database (sesuaikan nama tabel & kolom)
            // Model::create([
            //     'nama' => $row[0],
            //     'kategori' => $row[1],
            //     'tingkat_risiko' => $row[2],
            // ]);
        }
    }
}
