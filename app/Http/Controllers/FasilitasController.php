<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        $fasilitas = Fasilitas::where('id_paket', $id_paket)->orderBy('included', 'desc')->get();
        return view('admin.fasilitas.index', compact('fasilitas', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        return view('admin.fasilitas.create', compact('paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_paket)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'included' => $request->included,
            'id_paket' => $id_paket,
        ]);

        return redirect()->route('fasilitas.index', $id_paket)->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_fasilitas)
{
    $fasilitas = Fasilitas::findOrFail($id_fasilitas);
    $paket = $fasilitas->fasilitas; // ambil relasi ke paket_wisata

    return view('admin.fasilitas.edit', compact('fasilitas', 'paket'));
}


    public function update(Request $request, $id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        $fasilitas->update($request->only(['nama_fasilitas', 'included']));

        return redirect()->route('fasilitas.index', $fasilitas->id_paket)->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);
        $id_paket = $fasilitas->id_paket;
        $fasilitas->delete();

        return redirect()->route('fasilitas.index', $id_paket)->with('success', 'Fasilitas berhasil dihapus.');
    }
}
