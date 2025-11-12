<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $fillable = [
        'mitigasi_id',
        'triwulan_tahun',
        'penilaian',
        'uraian'
    ];

    public function mitigasi()
    {
        return $this->belongsTo(Mitigasi::class, 'mitigasi_id', 'id_mitigasi');
    }
}
