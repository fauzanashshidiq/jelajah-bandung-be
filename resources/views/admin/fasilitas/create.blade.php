@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Fasilitas: {{ $paket->nama_paket }}</h2>

    <form action="{{ route('admin.fasilitas.store', $paket->id_paket) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Included</label>
            <select name="included" class="w-full border px-3 py-2 rounded">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
    <div class="mt-6">
        <a href="{{ route('admin.fasilitas.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Daftar Fasilitas</a>
    </div>
</div>
@endsection
