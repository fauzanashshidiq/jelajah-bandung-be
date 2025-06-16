@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-6">Edit Testimoni</h1>

  @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <form action="{{ route('admin.testimoni.update', $testimoni) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="nama_pengguna" class="block font-semibold mb-1">Nama Pengguna</label>
      <input type="text" name="nama_pengguna" id="nama_pengguna"
             value="{{ old('nama_pengguna', $testimoni->nama_pengguna) }}"
             class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <div class="mb-4">
      <label for="isi" class="block font-semibold mb-1">Isi Testimoni</label>
      <textarea name="isi" id="isi" rows="4"
                class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('isi', $testimoni->isi) }}</textarea>
    </div>

    <div class="mb-4">
      <label class="block font-semibold mb-1">Foto Saat Ini</label>
      @if($testimoni->foto)
        <img src="{{ asset('image/testimoni/' . $testimoni->foto) }}" alt="Foto Testimoni" class="w-20 h-20 object-cover rounded mb-2">
      @else
        <p class="text-gray-500 italic">Tidak ada foto</p>
      @endif
    </div>

    <div class="mb-4">
      <label for="foto" class="block font-semibold mb-1">Ganti Foto (Opsional)</label>
      <input type="file" name="foto" id="foto"
             class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.testimoni.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
        Batal
      </a>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Simpan Perubahan
      </button>
    </div>
  </form>
</div>
@endsection
