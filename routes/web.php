<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landingpage');
});

/* Route::get('/login', function () {
    return view('auth.login');
})->name('login'); */

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\BerandaController;
/* Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda'); */
Route::get('/beranda', [BerandaController::class, 'index'])
    ->name('beranda')
    ->middleware('auth');

/* use App\Http\Controllers\KelolaPenggunaController;
Route::get('/kelola_pengguna', [KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');
 */

use App\Http\Controllers\KelolaPenggunaController;

Route::get('/kelola_pengguna', [KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');
Route::post('/kelola_pengguna/store', [KelolaPenggunaController::class, 'store'])->name('kelola_pengguna.store');
Route::post('/kelola_pengguna/update/{id}', [KelolaPenggunaController::class, 'update'])->name('kelola_pengguna.update');
Route::delete('/kelola_pengguna/delete/{id}', [KelolaPenggunaController::class, 'destroy'])->name('kelola_pengguna.destroy');

/* use App\Http\Controllers\KelolaRegisController;
Route::get('/kelola_regis', [KelolaRegisController::class, 'index'])->name('kelola_regis');
Route::post('/kelola_regis/import', [KelolaRegisController::class, 'import'])->name('formregis.import');
 */
use App\Http\Controllers\KelolaRegisController;

Route::get('/kelola_regis', [KelolaRegisController::class, 'index'])->name('kelola_regis');
Route::post('/kelola_regis/import', [KelolaRegisController::class, 'import'])->name('formregis.import');

// CRUD Unit Kerja
Route::post('/unitkerja/store', [KelolaRegisController::class, 'store'])->name('unitkerja.store');
Route::post('/unitkerja/update/{id}', [KelolaRegisController::class, 'update'])->name('unitkerja.update');
Route::delete('/unitkerja/delete/{id}', [KelolaRegisController::class, 'destroy'])->name('unitkerja.destroy');

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

use App\Http\Controllers\VerifikasiRisikoController;
Route::get('/verifikasi_risiko', [VerifikasiRisikoController::class, 'index'])->name('verifikasi_risiko');

use App\Http\Controllers\PenilaianController;
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');