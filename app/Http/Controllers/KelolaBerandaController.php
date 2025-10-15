<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaBerandaController extends Controller
{
    public function index()
    {
        return view('pages.kelola_beranda');
    }
}
