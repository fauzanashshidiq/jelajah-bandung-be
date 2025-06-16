@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10">
<h1 class="text-2xl font-bold mb-4">Daftar Wisata Paket: {{ $paket->nama_paket }}</h1>

<a href="{{ route('admin.wisata.create', ['id_paket' => $paket->id_paket]) }}" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Wisata</a>

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table  class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 px-4 py-2">#</th>
            <th class="border border-gray-300 px-4 py-2">Nama Wisata</th>
            <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
            <th class="border border-gray-300 px-4 py-2">Gambar</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wisatas as $wisata)
        <tr>
            <td class="border border-gray-300 px-4 py-2 text-center w-[50px] max-w-xs">{{ $loop->iteration }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center w-[100px] max-w-xs">{{ $wisata->nama_wisata }}</td>
            <td class="border border-gray-300 px-4 py-2 text-left w-[300px] max-w-xs">
                <div class="line-clamp-3 overflow-hidden">
                    {{ $wisata->deskripsi_wisata }}
                </div>
              </td> 
            <td class="border border-gray-300 px-4 py-2 text-center align-middle">
                <img src="{{ asset('image/' . $wisata->gambar_wisata) }}" class="mx-auto w-28 h-20 object-cover rounded" alt="Gambar">
            </td>
            <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                <a href="{{ route('admin.wisata.edit', $wisata->id_wisata) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Edit</a>
                
                <form action="{{ route('admin.wisata.destroy', $wisata->id_wisata) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-6">
    <a href="{{ route('admin.paket-wisata.index') }}" class="text-gray-600 hover:underline">← Kembali ke Paket Wisata</a>
</div>
</div>
@endsection
