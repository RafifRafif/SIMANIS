<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitigasi;

class ArsipRisikoController extends Controller
{
    public function index()
    {
        // Ambil semua data mitigasi
        $mitigasi = Mitigasi::with('registrasi')->get()->groupBy('registrasi_id');

        $openedCount = 0;
        $closedCount = 0;

        foreach ($mitigasi as $regId => $items) {
            $statuses = $items->pluck('status')->map(fn($s) => strtolower(trim($s)));

            if ($statuses->contains('closed')) {
                $closedCount++;
            } else {
                $openedCount++;
            }
        }

        return view('pages.arsip_risiko', compact('openedCount', 'closedCount'));
    }
}