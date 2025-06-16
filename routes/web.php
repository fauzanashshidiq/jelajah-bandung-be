<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\TestimonisController;

Route::get('/', [LandingController::class, 'index'])->name('landing.home');
Route::get('/tentang', function () {
    return view('landing.tentang');
})->name('landing.tentang');
Route::get('/{id_paket}/detail-paket', [DetailController::class, 'index'])->name('landing.detail');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/paket-wisata', [PaketWisataController::class, 'index'])->name('paket-wisata.index');
    Route::get('/paket-wisata/create', [PaketWisataController::class, 'create'])->name('paket-wisata.create');
    Route::post('/paket-wisata/store', [PaketWisataController::class, 'store'])->name('paket-wisata.store');
    Route::get('/paket-wisata/{id}/edit', [PaketWisataController::class, 'edit'])->name('paket-wisata.edit');
    Route::put('/paket-wisata/{id}', [PaketWisataController::class, 'update'])->name('paket-wisata.update');
    Route::delete('/paket-wisata/{id}', [PaketWisataController::class, 'destroy'])->name('paket-wisata.destroy');

    Route::prefix('paket-wisata/{id_paket}/jadwal')->group(function () {
        Route::get('/', [JadwalKegiatanController::class, 'index'])->name('jadwal.index');
        Route::get('/create', [JadwalKegiatanController::class, 'create'])->name('jadwal.create');
        Route::post('/', [JadwalKegiatanController::class, 'store'])->name('jadwal.store');
    });
    Route::get('/jadwal-kegiatan/{id_kegiatan}/edit', [JadwalKegiatanController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal-kegiatan/{id_kegiatan}', [JadwalKegiatanController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal-kegiatan/{id_kegiatan}', [JadwalKegiatanController::class, 'destroy'])->name('jadwal.destroy');

    Route::prefix('paket-wisata/{id_paket}/fasilitas')->group(function () {
        Route::get('/', [FasilitasController::class, 'index'])->name('fasilitas.index');
        Route::get('/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
        Route::post('/', [FasilitasController::class, 'store'])->name('fasilitas.store');
    });
    Route::get('/fasilitas/{id_fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/{id_fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas/{id_fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    Route::prefix('harga')->group(function () {
        Route::get('/{id_paket}', [HargaController::class, 'index'])->name('harga.index');
        Route::get('/{id_paket}/create', [HargaController::class, 'create'])->name('harga.create');
        Route::post('/{id_paket}', [HargaController::class, 'store'])->name('harga.store');
        Route::get('/edit/{id_harga}', [HargaController::class, 'edit'])->name('harga.edit');
        Route::put('/update/{id_harga}', [HargaController::class, 'update'])->name('harga.update');
        Route::delete('/{id_harga}', [HargaController::class, 'destroy'])->name('harga.destroy');
    });

    Route::prefix('paket-wisata/{id_paket}/wisata')->name('wisata.')->group(function () {
        Route::get('/', [WisataController::class, 'index'])->name('index');
        Route::get('/create', [WisataController::class, 'create'])->name('create');
        Route::post('/', [WisataController::class, 'store'])->name('store');
    });
    Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::put('/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');
    Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

    Route::resource('testimoni', TestimonisController::class);
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');
