@extends('layouts.admin')

@section('title', 'Daftar Paket Wisata')

@section('content')
<div class="max-w-8xl mx-auto bg-white p-6 rounded shadow ">
  <h1 class="text-2xl font-bold mb-6">Daftar Paket Wisata</h1>

  <div class="flex justify-between items-center mb-4">
    <a href="/admin/paket-wisata/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      + Tambah Paket Wisata
    </a>
  
    <form action="{{ route('admin.paket-wisata.index') }}" method="GET" class="flex items-center space-x-2">
      <input type="text" name="search" placeholder="Cari nama paket..." value="{{ request('search') }}"
        class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <button type="submit"
        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Cari</button>
    </form>
  </div>

  <table class="min-w-full border border-gray-300 mt-4">
    <thead class="bg-gray-200">
      <tr>
        <th class="border border-gray-300 px-4 py-2">Nomor</th>
        <th class="border border-gray-300 px-4 py-2">Nama Paket</th>
        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
        <th class="border border-gray-300 px-4 py-2">Durasi</th>
        <th class="border border-gray-300 px-4 py-2">Gambar</th>
        <th class="border border-gray-300 px-4 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paketWisatas as $paket)
      <tr>
        <td class="border border-gray-300 px-4 py-2 text-center w-[50px] max-w-xs">{{ $paketWisatas->firstItem() + $loop->index }}</td>
        <td class="border border-gray-300 px-4 py-2 text-center w-[200px] max-w-xs">{{ $paket->nama_paket }}</td>
        <td class="border border-gray-300 px-4 py-2 text-left w-[300px] max-w-xs">
          <div class="line-clamp-3 overflow-hidden">
            {{ $paket->deskripsi_paket }}
          </div>
        </td>        
        <td class="border border-gray-300 px-4 py-2 text-center">{{ $paket->durasi_paket }} hari</td>
        <td class="border border-gray-300 px-4 py-2 text-center align-middle">
          <img src="{{ asset('image/' . $paket->gambar_paket) }}" alt="Gambar Paket" class="mx-auto w-28 h-20 object-cover rounded" />
        </td>
        <td class="border border-gray-300 px-4 py-2 text-center">
          <div class="space-y-1 flex flex-col items-center">
            {{-- Edit --}}
            <a href="/admin/paket-wisata/{{ $paket->id_paket }}/edit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Edit</a>
        
            {{-- Lihat --}}
            <a href="{{ route('admin.wisata.index', $paket->id_paket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
              Lihat Wisata
            </a>
            <a href="{{ route('admin.jadwal.index', $paket->id_paket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
              Lihat Jadwal
            </a>
            <a href="{{ route('admin.fasilitas.index', $paket->id_paket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
              Lihat Fasilitas
            </a>
            <a href="{{ route('admin.harga.index', $paket->id_paket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
              Lihat Harga
            </a>
        
            {{-- Tambah --}}
            {{-- <a href="{{ route('jadwal.create', $paket->id_paket) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
              + Jadwal Kegiatan
            </a>
            <a href="{{ route('fasilitas.create', $paket->id_paket) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-600">
              + Fasilitas
            </a>
            <a href="{{ route('harga.create', $paket->id_paket) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-600">
              + Harga
            </a> --}}
        
            {{-- Hapus --}}
            <form action="{{ url('/admin/paket-wisata/' . $paket->id_paket) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                Hapus
              </button>
            </form>
          </div>
        </td>              
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-6 flex justify-between items-center border-t pt-4">
    {{-- Info jumlah data --}}
    <div class="text-sm text-gray-600">
      Menampilkan {{ $paketWisatas->firstItem() }} sampai {{ $paketWisatas->lastItem() }} dari total {{ $paketWisatas->total() }} paket
    </div>
  
    {{-- Pagination dengan ikon --}}
    <div class="flex space-x-1">
      {{-- Tombol Prev --}}
      @if ($paketWisatas->onFirstPage())
        <span class="px-2 py-1 text-gray-400 border border-gray-300 rounded text-sm cursor-not-allowed">←</span>
      @else
        <a href="{{ $paketWisatas->previousPageUrl() }}" class="px-2 py-1 text-gray-700 border border-gray-300 rounded text-sm hover:bg-gray-100">←</a>
      @endif
  
      {{-- Nomor Halaman --}}
      @foreach ($paketWisatas->getUrlRange(1, $paketWisatas->lastPage()) as $page => $url)
        @if ($page == $paketWisatas->currentPage())
          <span class="px-3 py-1 bg-blue-600 text-white rounded text-sm">{{ $page }}</span>
        @else
          <a href="{{ $url }}" class="px-3 py-1 text-gray-700 border border-gray-300 rounded text-sm hover:bg-gray-100">{{ $page }}</a>
        @endif
      @endforeach
  
      {{-- Tombol Next --}}
      @if ($paketWisatas->hasMorePages())
        <a href="{{ $paketWisatas->nextPageUrl() }}" class="px-2 py-1 text-gray-700 border border-gray-300 rounded text-sm hover:bg-gray-100">→</a>
      @else
        <span class="px-2 py-1 text-gray-400 border border-gray-300 rounded text-sm cursor-not-allowed">→</span>
      @endif
    </div>
  </div>    
</div>
@endsection
