@extends('layouts.admin') {{-- sesuaikan layout kalau pakai --}}
@section('content')
<h1 class="text-xl font-semibold mb-4">Tambah Wisata</h1>

<form action="{{ route('admin.wisata.store', ['id_paket' => $paket->id_paket]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label>Nama Wisata</label>
        <input type="text" name="nama_wisata" class="w-full p-2 border rounded">
    </div>
    <div>
        <label>Deskripsi Wisata</label>
        <textarea name="deskripsi_wisata" class="w-full p-2 border rounded"></textarea>
    </div>
    <div>
        <label>Gambar Wisata</label>
        <input type="file" name="gambar_wisata" class="w-full p-2 border rounded">
    </div>
    <div>
        <label>Paket Wisata</label>
        <select name="id_paket" class="w-full p-2 border rounded">
            @foreach ($pakets as $paket)
                <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
