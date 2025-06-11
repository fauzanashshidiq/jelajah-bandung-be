@extends('layouts.landing')

@section('content')
<!-- Hero Section -->
<section class="bg-cover bg-center h-screen text-white flex items-center justify-center" style="background-image: url('{{ asset('image/hero.png') }}');">
  <div class="text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $paket->nama_paket }}</h1>
    <p class="text-lg md:text-xl">{{ $paket->deskripsi_paket }}</p>
  </div>
</section>

<section id="paket" class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-10">Detail Paket Wisata</h2>
  
      <!-- Wisata -->
      <h3 class="text-2xl font-semibold mb-4 text-blue-600">Wisata</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        @foreach ($wisatas as $w)
          <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('image/' . $w->gambar_wisata) }}" class="w-24 h-16 object-cover" alt="Gambar">
            <h4 class="font-bold text-lg">{{ $w->nama_wisata }}</h4>
            <p class="text-gray-600">{{ $w->deskripsi_wisata }}</p>
          </div>
        @endforeach
      </div>
  
      <!-- Jadwal -->
    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Jadwal Kegiatan</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        @foreach ($jadwal->groupBy('hari') as $hari => $kegiatanPerHari)
            <div class="bg-white p-4 rounded-xl shadow">
            <h4 class="font-bold text-lg mb-2">Tour Hari Ke-{{ $hari }}</h4>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                @foreach ($kegiatanPerHari as $kegiatan)
                <li>{{ $kegiatan->kegiatan }}</li>
                @endforeach
            </ul>
            </div>
        @endforeach
    </div>

      <!-- Fasilitas -->
    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Fasilitas</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        @foreach ($fasilitas->groupBy('included') as $included => $listFasilitas)
            <div class="bg-white p-4 rounded-xl shadow">
            <h4 class="font-bold text-lg mb-2">
                {{ $included ? 'Included' : 'Not Included' }}
            </h4>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                @foreach ($listFasilitas as $fasilitasItem)
                <li>{{ $fasilitasItem->nama_fasilitas }}</li>
                @endforeach
            </ul>
            </div>
        @endforeach
    </div>

  
      <!-- Harga -->
    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Harga</h3>
    <div class="overflow-x-auto mb-10">
    <table class="min-w-full bg-white rounded-xl shadow text-left">
        <thead class="bg-blue-700 text-white">
        <tr>
            <th class="border py-3 px-4 text-center">Jumlah Peserta</th>
            <th class="border py-3 px-4 text-center">Harga</th>
        </tr>
        </thead>
        <tbody class="text-gray-700">
        @foreach ($harga as $h)
            <tr class="border-t">
            <td class="border py-3 px-4 text-center">{{ $h->peserta }} orang</td>
            <td class="border py-3 px-4 text-center">Rp {{ number_format($h->harga_per_peserta, 0) }} / pax</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</section>

<section id="kontak" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center justify-between">
        
        <!-- Gambar -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
          <img src="/image/hero.png" alt="Booking Image" class="rounded-xl shadow-lg w-full h-auto object-cover" />
        </div>
  
        <!-- Form Kontak -->
        <div class="w-full md:w-1/2 bg-white rounded-3xl shadow-xl p-8 md:ml-8">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">BOOKING SEKARANG,<br>UNTUK LIBURANMU NANTI</h2>
          
          <form action="#" method="POST" class="space-y-4">
            <div>
              <label class="block font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
              <input type="text" name="name" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>
            <div>
              <label class="block font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>
            <div>
              <label class="block font-medium text-gray-700 mb-1">Subject <span class="text-red-500">*</span></label>
              <input type="text" name="subject" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>
            <div>
              <label class="block font-medium text-gray-700 mb-1">Message</label>
              <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
            </div>
            <div>
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full font-semibold transition duration-300">
                SUBMIT
              </button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </section>
  

<!-- Kontak Kami -->
<section class="py-16" id="kontak">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold mb-6">Kontak Kami</h2>
      <p class="mb-4">Hubungi kami untuk pemesanan atau informasi lebih lanjut:</p>
      <p>Email: info@jelajahbandung.com</p>
      <p>Telepon: 0821-1234-5678</p>
      <p>Alamat: Jl. Braga No. 10, Bandung</p>
    </div>
  </section>
  @endsection