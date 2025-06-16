@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Jadwal Kegiatan Paket: {{ $paket->nama_paket }}</h1>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.store', $paket->id_paket) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Hari (1 s/d {{ $paket->durasi_paket }})</label>
            <input type="number" name="hari" min="1" max="{{ $paket->durasi_paket }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Kegiatan</label>
            <input type="text" name="kegiatan" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Jadwal</button>
    </form>
    <div class="mt-6">
        <a href="{{ route('admin.jadwal.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Jadwal Kegiatan</a>
    </div>
</div>
@endsection
