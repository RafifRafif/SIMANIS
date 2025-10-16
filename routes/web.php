<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landingpage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

use App\Http\Controllers\BerandaController;
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

use App\Http\Controllers\KelolaPenggunaController;
Route::get('/kelola_pengguna', [KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');

use App\Http\Controllers\KelolaRegisController;
Route::get('/kelola_regis', [KelolaRegisController::class, 'index'])->name('kelola_regis');

use App\Http\Controllers\KelolaBerandaController;
Route::get('/kelola_beranda', [KelolaBerandaController::class, 'index'])->name('kelola_Beranda');

use App\Http\Controllers\ArsipRisikoController;
Route::get('/arsip_risiko', [ArsipRisikoController::class, 'index'])->name('arsip_risiko');

use App\Http\Controllers\RegistrasiController;
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');

use App\Http\Controllers\ArsipOpenController;
Route::get('/arsip_open', [ArsipOpenController::class, 'index'])->name('arsip_open');

use App\Http\Controllers\ArsipClosedController;
Route::get('/arsip_closed', [ArsipClosedController::class, 'index'])->name('arsip_closed');