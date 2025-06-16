@extends('layouts.admin')

@section('title', 'Daftar Paket Wisata')

@section('content')
  <div class="max-w-xl mx-auto bg-white shadow p-6 rounded-xl">
    <h1 class="text-xl font-semibold mb-4">Tambah Paket Wisata</h1>

    @if ($errors->any())
      <div class="mb-4 text-red-500">
        <ul>
          @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/admin/paket-wisata/store" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label>Nama Paket</label>
        <input type="text" name="nama_paket" class="w-full p-2 border rounded" />
      </div>
      <div class="mb-4">
        <label>Deskripsi</label>
        <textarea name="deskripsi_paket" class="w-full p-2 border rounded"></textarea>
      </div>
      <div class="mb-4">
        <label>Durasi</label>
        <input type="number" name="durasi_paket" min="1" class="w-full p-2 border rounded" value="{{ old('durasi_paket') }}" required>
      </div>
      <div class="mb-4">
        <label>Gambar Paket</label>
        <input type="file" name="gambar_paket" class="w-full p-2 border rounded" />
      </div>
      <div class="flex justify-between">
        <a href="/admin/paket-wisata" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
  @endsection
