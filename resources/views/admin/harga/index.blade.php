@extends('layouts.admin')

@section('title', 'Daftar Harga - ' . $paket->nama_paket)

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10">
  <h1 class="text-2xl font-bold mb-6">Daftar Harga untuk Paket: {{ $paket->nama_paket }}</h1>

  <a href="{{ route('admin.harga.create', $paket->id_paket) }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    + Tambah Harga
  </a>

  <table class="min-w-full border border-gray-300 mt-4">
    <thead class="bg-gray-200">
      <tr>
        <th class="border border-gray-300 px-4 py-2">Jumlah Peserta</th>
        <th class="border border-gray-300 px-4 py-2">Harga per Peserta</th>
        <th class="border border-gray-300 px-4 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($hargas as $harga)
      <tr>
        <td class="border border-gray-300 px-4 py-2 text-center">{{ $harga->peserta }} orang</td>
        <td class="border border-gray-300 px-4 py-2 text-center">Rp {{ number_format($harga->harga_per_peserta, 0, ',', '.') }} / pax</td>
        <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
          <a href="{{ route('admin.harga.edit', $harga->id_harga) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Edit</a>
          <form action="{{ route('admin.harga.destroy', $harga->id_harga) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-6">
    <a href="{{ route('admin.paket-wisata.index', $paket->id_paket) }}" class="text-gray-600 hover:underline">← Kembali ke Paket Wisata</a>
</div>
</div>
@endsection
