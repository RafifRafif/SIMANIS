<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';
    protected $primaryKey = 'id_registrasi';
    protected $fillable = [
        'unit_kerja_id',
        'proses_aktivitas_id',
        'kategori_risiko_id',
        'jenis_risiko_id',
        'iku_terkait_id',
        'isu_resiko',
        'jenis_isu',
        'akar_permasalahan',
        'dampak',
        'pihak_terkait',
        'kontrol_pencegahan',
        'keparahan',
        'frekuensi',
        'probabilitas',
        'status_registrasi',
    ];

    // Relasi ke tabel lain
    public function unitKerja() { return $this->belongsTo(UnitKerja::class, 'unit_kerja_id'); }
    public function prosesAktivitas() { return $this->belongsTo(ProsesAktivitas::class, 'proses_aktivitas_id'); }
    public function kategoriRisiko() { return $this->belongsTo(KategoriRisiko::class, 'kategori_risiko_id'); }
    public function jenisRisiko() { return $this->belongsTo(JenisRisiko::class, 'jenis_risiko_id'); }
    public function ikuTerkait() { return $this->belongsTo(IkuTerkait::class, 'iku_terkait_id'); }
}
