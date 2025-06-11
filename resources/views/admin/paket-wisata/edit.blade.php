@extends('layouts.admin')

@section('title', 'Daftar Paket Wisata')

@section('content')
  <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Paket Wisata</h1>

    <form action="/admin/paket-wisata/{{ $paket->id_paket }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="mb-4">
        <label class="block font-semibold">Nama Paket</label>
        <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="w-full border p-2 rounded" required>
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Deskripsi</label>
        <textarea name="deskripsi_paket" class="w-full border p-2 rounded" rows="4" required>{{ $paket->deskripsi_paket }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Durasi</label>
        <input type="number" name="durasi_paket" min="1" class="w-full p-2 border rounded" value="{{ old('durasi_paket', $paket->durasi_paket) }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Gambar Paket</label>
        <div class="mb-2">
          <img src="{{ asset('image/' . $paket->gambar_paket) }}" alt="Gambar Paket" class="w-32 rounded" />
        </div>
        <input type="file" name="gambar_paket" class="w-full border p-2 rounded" />
        <small class="text-gray-500">Kosongkan jika tidak ingin mengganti gambar</small>
      </div>

      <div class="flex justify-between">
        <a href="/admin/paket-wisata" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
  @endsection
