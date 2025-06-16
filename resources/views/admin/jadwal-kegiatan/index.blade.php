@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h1 class="text-2xl font-bold mb-6">Jadwal Kegiatan Paket: {{ $paket->nama_paket }}</h1>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.jadwal.create', $paket->id_paket) }}" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Jadwal</a>

    @if($jadwals->isEmpty())
        <p>Tidak ada jadwal kegiatan.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Hari</th>
                    <th class="border border-gray-300 px-4 py-2">Kegiatan</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $jadwal->hari }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $jadwal->kegiatan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                        <a href="{{ route('admin.jadwal.edit', $jadwal->id_kegiatan) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Edit</a>

                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id_kegiatan) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-6">
        <a href="{{ route('admin.paket-wisata.index') }}" class="text-gray-600 hover:underline">← Kembali ke Paket Wisata</a>
    </div>
</div>
@endsection
