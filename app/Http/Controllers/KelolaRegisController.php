<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaRegisController extends Controller
{
    public function index()
    {
        return view('pages.kelola_regis');
    }
}
