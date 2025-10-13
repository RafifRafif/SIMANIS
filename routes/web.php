<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landingpage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/beranda', function () {
    return view('pages.beranda_pengguna');
});

use App\Http\Controllers\KelolaPenggunaController;
Route::get('/kelola_pengguna', [KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');

use App\Http\Controllers\KelolaRegisController;
Route::get('/kelola_regis', [KelolaRegisController::class, 'index'])->name('kelola_regis');

use App\Http\Controllers\CardArsipRisikoController;
Route::get('/card_arsip_risiko', [CardArsipRisikoController::class, 'index'])->name('card_arsip_risiko');