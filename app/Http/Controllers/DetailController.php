<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\JadwalKegiatan;
use App\Models\PaketWisata;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id_paket)
{
    // $wisatas = Wisata::with('paket')->get();
    // $pakets = PaketWisata::with(['wisatas', 'fasilitas', 'jadwalKegiatans', 'hargas'])->get();

    $paket = PaketWisata::findOrFail($id_paket);
    $wisatas = Wisata::where('id_paket', $id_paket)->get();
    $fasilitas = Fasilitas::where('id_paket', $id_paket)->get();
    $jadwal = JadwalKegiatan::where('id_paket', $id_paket)->get();
    $harga = Harga::where('id_paket', $id_paket)->get();

    return view('landing.detail', compact('wisatas', 'paket', 'fasilitas', 'jadwal', 'harga'));
}
}
