@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Wisata</h1>

    <form action="{{ route('admin.wisata.update', $wisata->id_wisata) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Nama Wisata</label>
            <input type="text" name="nama_wisata" value="{{ old('nama_wisata', $wisata->nama_wisata) }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Deskripsi Wisata</label>
            <textarea name="deskripsi_wisata" class="w-full border p-2 rounded" rows="4" required>{{ old('deskripsi_wisata', $wisata->deskripsi_wisata) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Gambar Wisata</label>
            <img src="{{ asset('image/' . $wisata->gambar_wisata) }}" alt="Gambar Wisata" class="mb-3 w-40 rounded shadow">
            <input type="file" name="gambar_wisata" class="w-full border p-2 rounded">
            <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.wisata.index', ['id_paket' => $wisata->id_paket]) }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
