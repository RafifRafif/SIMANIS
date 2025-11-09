<?php

use App\Http\Controllers\RegistrasiController;
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
Route::post('/ubah-sandi', [AuthController::class, 'changePassword'])->name('ubah.sandi');

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

// CRUD Proses/Aktivitas
Route::post('/proses/store', [KelolaRegisController::class, 'storeProses'])->name('proses.store');
Route::post('/proses/update/{id}', [KelolaRegisController::class, 'updateProses'])->name('proses.update');
Route::delete('/proses/delete/{id}', [KelolaRegisController::class, 'destroyProses'])->name('proses.destroy');

// CRUD Kategori Risiko
Route::post('/kategori/store', [KelolaRegisController::class, 'storeKategori'])->name('kategori.store');
Route::post('/kategori/update/{id}', [KelolaRegisController::class, 'updateKategori'])->name('kategori.update');
Route::delete('/kategori/delete/{id}', [KelolaRegisController::class, 'destroyKategori'])->name('kategori.destroy');

// CRUD Jenis Risiko
Route::post('/jenis/store', [KelolaRegisController::class, 'storeJenis'])->name('jenis.store');
Route::post('/jenis/update/{id}', [KelolaRegisController::class, 'updateJenis'])->name('jenis.update');
Route::delete('/jenis/delete/{id}', [KelolaRegisController::class, 'destroyJenis'])->name('jenis.destroy');

// CRUD IKU Terkait
Route::post('/iku/store', [KelolaRegisController::class, 'storeIku'])->name('iku.store');
Route::post('/iku/update/{id}', [KelolaRegisController::class, 'updateIku'])->name('iku.update');
Route::delete('/iku/delete/{id}', [KelolaRegisController::class, 'destroyIku'])->name('iku.destroy');

use App\Http\Controllers\KelolaBerandaController;
Route::get('/kelola_beranda', [KelolaBerandaController::class, 'index'])->name('kelola_beranda');
Route::post('/kelola_beranda/save-colors', [KelolaBerandaController::class, 'saveColors'])
    ->name('kelola_beranda.save_colors');
Route::post('/kelola_beranda/store', [KelolaBerandaController::class, 'storeKonten'])
    ->name('kelola_beranda.store');
Route::put('/kelola-beranda/{id}', [KelolaBerandaController::class, 'update'])->name('kelola-beranda.update');
Route::delete('/kelola-beranda/{id}', [KelolaBerandaController::class, 'destroy'])->name('kelola-beranda.destroy');

use App\Http\Controllers\ArsipRisikoController;
Route::get('/arsip_risiko', [ArsipRisikoController::class, 'index'])->name('arsip_risiko');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::put('/registrasi/{id}', [RegistrasiController::class, 'update'])->name('registrasi.update');
Route::delete('/registrasi/{id}', [RegistrasiController::class, 'destroy'])->name('registrasi.destroy');

use App\Http\Controllers\MitigasiController;

Route::get('/mitigasi', [MitigasiController::class, 'index'])->name('mitigasi.index');
Route::post('/mitigasi', [MitigasiController::class, 'store'])->name('mitigasi.store');
Route::put('/mitigasi/{id}', [MitigasiController::class, 'update'])->name('mitigasi.update');
Route::delete('/mitigasi/{id}', [MitigasiController::class, 'destroy'])->name('mitigasi.destroy');

use App\Http\Controllers\ArsipOpenController;
Route::get('/arsip_open', [ArsipOpenController::class, 'index'])->name('arsip_open');

use App\Http\Controllers\ArsipClosedController;
Route::get('/arsip_closed', [ArsipClosedController::class, 'index'])->name('arsip_closed');

use App\Http\Controllers\VerifikasiRisikoController;
Route::get('/verifikasi_risiko', [VerifikasiRisikoController::class, 'index'])->name('verifikasi_risiko');
Route::put('/verifikasi-risiko/{id}', [VerifikasiRisikoController::class, 'updateStatus'])->name('verifikasi_risiko.update');

use App\Http\Controllers\PenilaianController;
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');