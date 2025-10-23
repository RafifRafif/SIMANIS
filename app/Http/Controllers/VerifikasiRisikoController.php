<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiRisikoController extends Controller
{
    public function index()
    {
        return view('pages.verifikasi_risiko');
    }
}