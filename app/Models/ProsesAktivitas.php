<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesAktivitas extends Model
{
    use HasFactory;

    protected $table = 'proses_aktivitas';
    
    protected $fillable = ['nama_proses'];
}
