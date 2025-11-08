<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitigasi extends Model
{
    use HasFactory;

    protected $table = 'mitigasi';
    protected $primaryKey = 'id_mitigasi';

    protected $fillable = [
        'registrasi_id',
        'triwulan',
        'tahun',
        'isurisiko',
        'rencana_aksi',
        'tanggal_pelaksanaan',
        'hasil_tindak_lanjut',
        'tanggal_evaluasi',
        'status',
        'hasil_manajemen_risiko',
        'dokumen_pendukung'
    ];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'registrasi_id', 'id_registrasi');
    }
}
