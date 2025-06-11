<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
{
    $durasiList = PaketWisata::select('durasi_paket')
    ->distinct()
    ->pluck('durasi_paket')
    ->sort()
    ->values();

    $paketsByDurasi = [];

    foreach ($durasiList as $durasi) {
        $paketsByDurasi[$durasi] = PaketWisata::with(['hargas' => function ($q) {
            $q->orderBy('harga_per_peserta', 'asc');
        }])->where('durasi_paket', $durasi)->get();
    }

    return view('landing.index', compact('durasiList', 'paketsByDurasi'));
}

}
