<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipClosedController extends Controller
{
    public function index()
    {
        return view('pages.arsip_closed');
    }
}