@extends('layouts.admin')

@section('title', 'Daftar Testimoni')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-6">Daftar Testimoni</h1>

  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div class="flex justify-between items-center mb-4">
    <a href="{{ route('admin.testimoni.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
      + Tambah Testimoni
    </a>
  </div>

  <table class="min-w-full border border-gray-300">
    <thead class="bg-gray-200">
      <tr>
        <th class="border border-gray-300 px-4 py-2 text-center">#</th>
        <th class="border border-gray-300 px-4 py-2 text-center">Nama</th>
        <th class="border border-gray-300 px-4 py-2 text-center">Isi</th>
        <th class="border border-gray-300 px-4 py-2 text-center">Foto</th>
        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($testimonis as $testimoni)
      <tr>
        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration + ($testimonis->currentPage() - 1) * $testimonis->perPage() }}</td>
        <td class="border border-gray-300 px-4 py-2 text-center">{{ $testimoni->nama_pengguna }}</td>
        <td class="border border-gray-300 px-4 py-2 text-center">{{ Str::limit($testimoni->isi, 50) }}</td>
        <td class="border border-gray-300 px-4 py-2 text-center">
          @if($testimoni->foto)
            <img src="{{ asset('image/testimoni/' . $testimoni->foto) }}" class="w-20 h-20 object-cover rounded mx-auto" alt="Foto Testimoni">
          @else
            <span class="text-gray-500 italic">Tidak ada foto</span>
          @endif
        </td>
        <td class="border border-gray-300 px-4 py-2 text-center">
          <div class="flex flex-col items-center space-y-1">
            <a href="{{ route('admin.testimoni.edit', $testimoni->id_testimoni) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>
            <form action="{{ route('admin.testimoni.destroy', $testimoni->id_testimoni) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="border border-gray-300 px-4 py-4 text-center text-gray-500 italic">Belum ada testimoni.</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-4 flex justify-end">
    {{ $testimonis->links() }}
  </div>
</div>
@endsection
