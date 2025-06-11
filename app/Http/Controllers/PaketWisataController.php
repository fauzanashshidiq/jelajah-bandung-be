<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // Ambil semua data paket beserta relasinya
    //     // $pakets = PaketWisata::with(['wisatas', 'jadwalKegiatans', 'fasilitas', 'hargas'])->get();

    //     $paketWisatas = PaketWisata::orderBy('durasi_paket', 'asc')->get();
    //     return view('admin.paket-wisata.index', compact('paketWisatas'));
    // }

    public function index(Request $request)
    {
        $query = PaketWisata::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_paket', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('durasi_paket', 'asc');

        $paketWisatas = $query->paginate(5)->withQueryString(); // hanya tampilkan 5 per halaman

        return view('admin.paket-wisata.index', compact('paketWisatas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_paket' => 'required|string|max:255',
        'deskripsi_paket' => 'required|string',
        'durasi_paket' => 'required|integer|min:1',
        'gambar_paket' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan file gambar ke folder public/image
    if ($request->hasFile('gambar_paket')) {
        $file = $request->file('gambar_paket');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);
    } else {
        $filename = null; // atau handle kalau wajib harus ada file
    }

    PaketWisata::create([
        'nama_paket' => $request->nama_paket,
        'deskripsi_paket' => $request->deskripsi_paket,
        'durasi_paket' => $request->durasi_paket,
        'gambar_paket' => $filename,
    ]);

    return redirect()->route('paket-wisata.index')->with('success', 'Paket wisata berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(PaketWisata $paketWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_paket)
{
    $paket = PaketWisata::findOrFail($id_paket);
    return view('admin.paket-wisata.edit', compact('paket'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_paket)
{
    $paket = PaketWisata::findOrFail($id_paket);

    $request->validate([
        'nama_paket' => 'required|string|max:255',
        'deskripsi_paket' => 'required|string',
        'durasi_paket' => 'required|integer|min:1',
        'gambar_paket' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $paket->nama_paket = $request->nama_paket;
    $paket->deskripsi_paket = $request->deskripsi_paket;
    $paket->durasi_paket = $request->durasi_paket;

    if ($request->hasFile('gambar_paket')) {
        // Hapus gambar lama jika ada
        if ($paket->gambar_paket && file_exists(public_path('image/' . $paket->gambar_paket))) {
            unlink(public_path('image/' . $paket->gambar_paket));
        }

        // Upload gambar baru
        $file = $request->file('gambar_paket');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);

        $paket->gambar_paket = $filename;
    }

    $paket->save();

    return redirect('/admin/paket-wisata')->with('success', 'Paket wisata berhasil diupdate.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $paket = PaketWisata::findOrFail($id);
    
    // Jika ada file gambar, kamu bisa tambahkan unlink jika perlu:
    // Storage::delete('image/' . $paket->gambar_paket); ← kalau pakai storage

    $paket->delete();

    return redirect('/admin/paket-wisata')->with('success', 'Paket berhasil dihapus');
}

}
