<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipOpenController extends Controller
{
    public function index()
    {
        return view('pages.arsip_open');
    }
}