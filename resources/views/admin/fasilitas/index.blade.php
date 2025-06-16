@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-4">Fasilitas: {{ $paket->nama_paket }}</h2>

    <a href="{{ route('admin.fasilitas.create', $paket->id_paket) }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Fasilitas
    </a>

    @if ($fasilitas->isEmpty())
        <p class="text-gray-500">Belum ada fasilitas.</p>
    @else
    <table class="w-full border border-gray-300 mt-4">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Nama</th>
                <th class="border border-gray-300 px-4 py-2">Included</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $f)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $f->nama_fasilitas }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $f->included ? 'Ya' : 'Tidak' }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                    <a href="{{ route('admin.fasilitas.edit', $f->id_fasilitas) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Edit</a>
                    <form action="{{ route('admin.fasilitas.destroy', $f->id_fasilitas) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="mt-6">
        <a href="{{ route('admin.paket-wisata.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Paket Wisata</a>
    </div>
</div>
@endsection
