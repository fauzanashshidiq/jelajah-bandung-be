@extends('layouts.admin')

@section('title', 'Edit Harga')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-xl font-bold mb-6">Edit Harga untuk {{ $harga->paket->nama_paket }}</h1>

  <form action="{{ route('admin.harga.update', $harga->id_harga) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="peserta" class="block font-medium">Jumlah Peserta</label>
      <input type="number" name="peserta" value="{{ $harga->peserta }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
      <label for="harga_per_peserta" class="block font-medium">Harga per Peserta (Rp)</label>
      <input type="number" name="harga_per_peserta" value="{{ $harga->harga_per_peserta }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Update
    </button>
  </form>
  <div class="mt-6">
    <a href="{{ route('admin.harga.index', $harga->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Daftar Fasilitas</a>
</div>
</div>
@endsection
