<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;

class ArsipClosedController extends Controller
{
    public function index()
    {
        // Ambil semua unit kerja dari tabel
        $unitKerja = UnitKerja::all();
        return view('pages.arsip_closed', compact('unitKerja'));
    }
}