<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HargaController;

// ============================
// Landing Page
// ============================
Route::get('/', [LandingController::class, 'index'])->name('landing.home');
Route::get('/{id_paket}/detail-paket', [DetailController::class, 'index'])->name('landing.detail');

// ============================
// Paket Wisata (Admin)
// ============================
Route::get('/admin/paket-wisata', [PaketWisataController::class, 'index'])->name('paket-wisata.index');
Route::get('/admin/paket-wisata/create', [PaketWisataController::class, 'create'])->name('paket-wisata.create');
Route::post('/admin/paket-wisata/store', [PaketWisataController::class, 'store'])->name('paket-wisata.store');
Route::get('/admin/paket-wisata/{id}/edit', [PaketWisataController::class, 'edit'])->name('paket-wisata.edit');
Route::put('/admin/paket-wisata/{id}', [PaketWisataController::class, 'update'])->name('paket-wisata.update');
Route::delete('/admin/paket-wisata/{id}', [PaketWisataController::class, 'destroy'])->name('paket-wisata.destroy');

// ============================
// Jadwal Kegiatan (Admin)
// ============================
Route::prefix('admin/paket-wisata/{id_paket}/jadwal')->group(function () {
    Route::get('/', [JadwalKegiatanController::class, 'index'])->name('jadwal.index');
    Route::get('/create', [JadwalKegiatanController::class, 'create'])->name('jadwal.create');
    Route::post('/', [JadwalKegiatanController::class, 'store'])->name('jadwal.store');
});
Route::get('/admin/jadwal-kegiatan/{id_kegiatan}/edit', [JadwalKegiatanController::class, 'edit'])->name('jadwal.edit');
Route::put('/admin/jadwal-kegiatan/{id_kegiatan}', [JadwalKegiatanController::class, 'update'])->name('jadwal.update');
Route::delete('/admin/jadwal-kegiatan/{id_kegiatan}', [JadwalKegiatanController::class, 'destroy'])->name('jadwal.destroy');

// ============================
// Fasilitas (Admin)
// ============================
Route::prefix('admin/paket-wisata/{id_paket}/fasilitas')->group(function () {
    Route::get('/', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/', [FasilitasController::class, 'store'])->name('fasilitas.store');
});
Route::get('/admin/fasilitas/{id_fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::put('/admin/fasilitas/{id_fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/admin/fasilitas/{id_fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

// ============================
// Harga (Admin)
// ============================
Route::prefix('admin/harga')->group(function () {
    Route::get('/{id_paket}', [HargaController::class, 'index'])->name('harga.index');
    Route::get('/{id_paket}/create', [HargaController::class, 'create'])->name('harga.create');
    Route::post('/{id_paket}', [HargaController::class, 'store'])->name('harga.store');
    Route::get('/edit/{id_harga}', [HargaController::class, 'edit'])->name('harga.edit');
    Route::put('/update/{id_harga}', [HargaController::class, 'update'])->name('harga.update');
    Route::delete('/{id_harga}', [HargaController::class, 'destroy'])->name('harga.destroy');
});

// ============================
// Wisata (Admin) — DISAMAKAN STRUKTURNYA
// ============================
Route::prefix('admin/paket-wisata/{id_paket}/wisata')->group(function () {
    Route::get('/', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('/create', [WisataController::class, 'create'])->name('wisata.create');
    Route::post('/', [WisataController::class, 'store'])->name('wisata.store');
});
Route::get('/admin/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
Route::put('/admin/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');
Route::delete('/admin/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');
