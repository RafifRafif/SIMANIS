<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landingpage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/beranda', function () {
    return view('pages.beranda');
});

use App\Http\Controllers\KelolaPenggunaController;
Route::get('/kelola_pengguna', [KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');