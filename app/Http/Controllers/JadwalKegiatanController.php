<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class JadwalKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_paket)
{
    $paket = PaketWisata::findOrFail($id_paket);
    $jadwals = JadwalKegiatan::where('id_paket', $id_paket)->orderBy('hari')->get();

    return view('admin.jadwal-kegiatan.index', compact('paket', 'jadwals'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        return view('admin.jadwal-kegiatan.create', compact('paket'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_paket)
    {
        $request->validate([
            'hari' => 'required|integer|min:1|max:' . PaketWisata::findOrFail($id_paket)->durasi_paket,
            'kegiatan' => 'required|string|max:255',
        ]);

        JadwalKegiatan::create([
            'id_paket' => $id_paket,
            'hari' => $request->hari,
            'kegiatan' => $request->kegiatan,
        ]);

        return redirect()->route('jadwal.create', $id_paket)->with('success', 'Jadwal kegiatan berhasil ditambahkan!');
    }




    /**
     * Display the specified resource.
     */
    public function show(JadwalKegiatan $jadwalKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_kegiatan)
{
    $jadwal = JadwalKegiatan::findOrFail($id_kegiatan);
    $paket = PaketWisata::findOrFail($jadwal->id_paket);

    return view('admin.jadwal-kegiatan.edit', compact('jadwal', 'paket'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kegiatan)
{
    $jadwal = JadwalKegiatan::findOrFail($id_kegiatan);
    $paket = PaketWisata::findOrFail($jadwal->id_paket);

    $request->validate([
        'hari' => 'required|integer|min:1|max:' . $paket->durasi_paket,
        'kegiatan' => 'required|string|max:255',
    ]);

    $jadwal->update([
        'hari' => $request->hari,
        'kegiatan' => $request->kegiatan,
    ]);

    return redirect()->route('jadwal.index', $paket->id_paket)->with('success', 'Jadwal berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kegiatan)
{
    $jadwal = JadwalKegiatan::findOrFail($id_kegiatan);
    $id_paket = $jadwal->id_paket;
    $jadwal->delete();

    return redirect()->route('jadwal.index', $id_paket)->with('success', 'Jadwal berhasil dihapus!');
}
}
