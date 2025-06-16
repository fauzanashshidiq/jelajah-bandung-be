@extends('layouts.admin')

@section('title', 'Tambah Harga')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-xl font-bold mb-6">Tambah Harga untuk Paket: {{ $paket->nama_paket }}</h1>

  <form action="{{ route('admin.harga.store', $paket->id_paket) }}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="peserta" class="block font-medium">Jumlah Peserta</label>
      <input type="number" name="peserta" id="peserta" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
      <label for="harga_per_peserta" class="block font-medium">Harga per Peserta (Rp)</label>
      <input type="number" name="harga_per_peserta" step="0.01" class="w-full border rounded px-3 py-2" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Simpan
    </button>
  </form>
  <div class="mt-6">
    <a href="{{ route('admin.harga.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Daftar Harga</a>
</div>
</div>
@endsection
