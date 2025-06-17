<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_paket)
{
    // $wisatas = Wisata::with('paket')->get(); 
    $paket = PaketWisata::findOrFail($id_paket);
    $wisatas = Wisata::where('id_paket', $id_paket)->get();
    return view('admin.wisata.index', compact('wisatas', 'paket'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_paket)
{
    $paket = PaketWisata::findOrFail($id_paket);
    $pakets = PaketWisata::all(); // jika kamu tetap ingin dropdown
    return view('admin.wisata.create', compact('paket', 'pakets'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_paket)
{
    $request->validate([
        'nama_wisata' => 'required',
        'deskripsi_wisata' => 'required',
        'gambar_wisata' => 'required|image',
        'id_paket' => 'required|exists:paket_wisatas,id_paket',
    ]);

    $file = $request->file('gambar_wisata');
    $namaFile = time() . '.' . $file->getClientOriginalName();
    $file->move(public_path('image'), $namaFile);

    Wisata::create([
        'nama_wisata' => $request->nama_wisata,
        'deskripsi_wisata' => $request->deskripsi_wisata,
        'gambar_wisata' => $namaFile,
        'id_paket' => $request->id_paket
    ]);

    return redirect()->route('admin.wisata.index', $id_paket)->with('success', 'Wisata berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $wisata = Wisata::findOrFail($id);
    return view('admin.wisata.edit', compact('wisata'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $wisata = Wisata::findOrFail($id);

    $request->validate([
        'nama_wisata' => 'required|string|max:255',
        'deskripsi_wisata' => 'required|string',
        'gambar_wisata' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $wisata->nama_wisata = $request->nama_wisata;
    $wisata->deskripsi_wisata = $request->deskripsi_wisata;

    if ($request->hasFile('gambar_wisata')) {
        // Hapus gambar lama
        if ($wisata->gambar_wisata && file_exists(public_path('image/' . $wisata->gambar_wisata))) {
            unlink(public_path('image/' . $wisata->gambar_wisata));
        }

        // Upload gambar baru
        $file = $request->file('gambar_wisata');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);

        $wisata->gambar_wisata = $filename;
    }

    $wisata->save();

    return redirect()->route('admin.wisata.index', ['id_paket' => $wisata->id_paket])->with('success', 'Data wisata berhasil diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     */
public function destroy(Wisata $wisata, $id)
{
    $wisata = Wisata::findOrFail($id);
    // Hapus gambar lama kalau ada di folder public/image
    if ($wisata->gambar_wisata && file_exists(public_path('image/' . $wisata->gambar_wisata))) {
        unlink(public_path('image/' . $wisata->gambar_wisata));
    }

    $id_paket = $wisata->id_paket; // ambil sebelum delete
    $wisata->delete();

    return redirect()->route('admin.wisata.index', ['id_paket' => $id_paket])->with('success', 'Data wisata berhasil dihapus.');
}

}
