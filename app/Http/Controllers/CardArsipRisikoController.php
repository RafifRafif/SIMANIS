<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardArsipRisikoController extends Controller
{
    public function index()
    {
        return view('pages.card_arsip_risiko');
    }
}