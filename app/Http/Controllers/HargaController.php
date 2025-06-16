<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        $hargas = Harga::where('id_paket', $id_paket)->get();
        return view('admin.harga.index', compact('paket', 'hargas'));
    }

    public function create($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        return view('admin.harga.create', compact('paket'));
    }

    public function store(Request $request, $id_paket)
    {
        $request->validate([
            'peserta' => 'required|integer|min:1',
            'harga_per_peserta' => 'required|numeric|min:0',
        ]);

        Harga::create([
            'peserta' => $request->peserta,
            'harga_per_peserta' => $request->harga_per_peserta,
            'id_paket' => $id_paket,
        ]);

        return redirect()->route('admin.harga.index', $id_paket)->with('success', 'Harga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Harga $harga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_harga)
    {
        $harga = Harga::findOrFail($id_harga);
        return view('admin.harga.edit', compact('harga'));
    }

    public function update(Request $request, $id_harga)
    {
        $request->validate([
            'peserta' => 'required|integer|min:1',
            'harga_per_peserta' => 'required|numeric|min:0',
        ]);

        $harga = Harga::findOrFail($id_harga);
        $harga->update($request->only('peserta', 'harga_per_peserta'));

        return redirect()->route('admin.harga.index', $harga->id_paket)->with('success', 'Harga berhasil diperbarui');
    }

    public function destroy($id_harga)
    {
        $harga = Harga::findOrFail($id_harga);
        $id_paket = $harga->id_paket;
        $harga->delete();

        return redirect()->route('admin.harga.index', $id_paket)->with('success', 'Harga berhasil dihapus');
    }
}
