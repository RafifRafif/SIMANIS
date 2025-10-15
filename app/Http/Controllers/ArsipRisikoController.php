<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipRisikoController extends Controller
{
    public function index()
    {
        return view('pages.arsip_risiko');
    }
}