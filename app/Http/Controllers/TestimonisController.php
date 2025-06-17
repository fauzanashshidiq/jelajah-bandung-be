<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class TestimonisController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->paginate(8);
        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama_pengguna', 'isi', 'foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalExtension();
            $file->move(public_path('image/testimoni'), $nama_file); // simpan ke public/image/testimoni
            $data['foto'] = $nama_file;
        }


        Testimoni::create($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
{
    $testimoni = Testimoni::findOrFail($id);

    $request->validate([
        'nama_pengguna' => 'required|string|max:255',
        'isi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('nama_pengguna', 'isi', 'foto');

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        $path = public_path('image/testimoni/' . $testimoni->foto);
        if ($testimoni->foto && file_exists($path)) {
            unlink($path);
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $nama_file = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image/testimoni'), $nama_file);
        $data['foto'] = $nama_file;
    }

    $testimoni->update($data);

    return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diupdate.');
}

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->foto) {
            Storage::disk('public')->delete($testimoni->foto);
        }
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
