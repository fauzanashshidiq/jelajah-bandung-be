@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Jadwal Kegiatan Paket: {{ $paket->nama_paket }}</h1>

    @if ($errors->any())
        <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.update', $jadwal->id_kegiatan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Hari (1 s/d {{ $paket->durasi_paket }})</label>
            <input type="number" name="hari" min="1" max="{{ $paket->durasi_paket }}" value="{{ old('hari', $jadwal->hari) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Kegiatan</label>
            <input type="text" name="kegiatan" value="{{ old('kegiatan', $jadwal->kegiatan) }}" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
    </form>

    <div class="mt-6">
        <a href="{{ route('admin.jadwal.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Jadwal Kegiatan</a>
    </div>
</div>
@endsection
