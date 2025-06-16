@extends('layouts.landingdetail')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-white overflow-hidden">
  <!-- Layer gambar tetap tajam -->
  <div class="absolute inset-0 bg-cover bg-center -z-20" 
       style="background-image: url('{{ asset('image/' . $paket->gambar_paket) }}');">
  </div>

  <!-- Layer semi-transparan agar teks terbaca, efek gelap halus -->
  <div class="absolute inset-0 bg-black/40 -z-10"></div>

  <!-- Konten utama -->
  <div class="text-center px-4">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Paket Wisata Bandung: {{ $paket->nama_paket }}</h1>
    <p class="text-lg md:text-xl">{{ $paket->deskripsi_paket }}</p>
  </div>
</section>

<section id="wisata" class="py-16 bg-white/70" x-data="{ tab: 'wisata' }">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Detail Paket Wisata</h2>

    <!-- Tombol Tab -->
    <div class="flex justify-center gap-2 mb-8 flex-wrap">
      <button @click="tab = 'wisata'"
              :class="tab === 'wisata' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-200 text-gray-700 hover:bg-blue-700'"
              class="px-4 py-2 rounded-full font-semibold transition">
        Wisata
      </button>
      <button @click="tab = 'jadwal'"
              :class="tab === 'jadwal' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-200 text-gray-700 hover:bg-blue-700'"
              class="px-4 py-2 rounded-full font-semibold transition">
        Jadwal
      </button>
      <button @click="tab = 'fasilitas'"
              :class="tab === 'fasilitas' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-200 text-gray-700 hover:bg-blue-700'"
              class="px-4 py-2 rounded-full font-semibold transition">
        Fasilitas
      </button>
      <button @click="tab = 'harga'"
              :class="tab === 'harga' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-200 text-gray-700 hover:bg-blue-700'"
              class="px-4 py-2 rounded-full font-semibold transition">
        Harga
      </button>
    </div>

    <!-- Konten Wisata -->
    <div x-show="tab === 'wisata'" x-transition>
      @if ($wisatas->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-blue-600">Wisata</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
          @foreach ($wisatas as $w)
            <div class="bg-white p-4 rounded-xl shadow">
              <img src="{{ asset('image/' . $w->gambar_wisata) }}" 
     class="w-full h-60 object-cover mb-4 rounded" 
     alt="Gambar">

              <h4 class="font-bold text-lg">{{ $w->nama_wisata }}</h4>
              <p class="text-gray-600">{{ $w->deskripsi_wisata }}</p>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-10">Belum ada data wisata.</p>
      @endif
    </div>

    <!-- Konten Jadwal -->
    <div x-show="tab === 'jadwal'" x-transition>
      @if ($jadwal->isNotEmpty())
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
      @else
        <p class="text-center text-gray-500 mb-10">Jadwal belum tersedia.</p>
      @endif
    </div>

    <!-- Konten Fasilitas -->
    <div x-show="tab === 'fasilitas'" x-transition>
      @if ($fasilitas->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-blue-600">Fasilitas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
          @foreach ($fasilitas->groupBy('included') as $included => $listFasilitas)
            <div class="bg-white p-4 rounded-xl shadow">
              <h4 class="font-bold text-lg mb-2">{{ $included ? 'Included' : 'Excluded' }}</h4>
              <ul class="list-disc list-inside text-gray-600 space-y-1">
                @foreach ($listFasilitas as $item)
                  <li>{{ $item->nama_fasilitas }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-10">Fasilitas belum tersedia.</p>
      @endif
    </div>

    <!-- Konten Harga -->
    <div x-show="tab === 'harga'" x-transition>
      @if ($harga->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-blue-600">Harga</h3>
        <div class="overflow-x-auto mb-10">
          <table class="min-w-full bg-white rounded-xl shadow text-left table-fixed">
            <thead class="bg-blue-700 text-white">
              <tr>
                <th class="w-1/2 border border-blue-700 py-3 px-6 text-center font-medium">Jumlah Peserta</th>
                <th class="w-1/2 border border-blue-700 py-3 px-6 text-center font-medium">Harga</th>
              </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
              @foreach ($harga as $h)
                <tr class="hover:bg-blue-50 transition duration-200">
                  <td class="w-1/2 border border-blue-700 py-3 px-6 text-center">{{ $h->peserta }} orang</td>
                  <td class="w-1/2 border border-blue-700 py-3 px-6 text-center">Rp {{ number_format($h->harga_per_peserta, 0) }} / pax</td>
                </tr>
              @endforeach
            </tbody>            
          </table>
        </div>        
      @else
        <p class="text-center text-gray-500 mb-10">Belum ada data harga.</p>
      @endif
    </div>
  </div>
</section>

<section class="relative bg-blue-600/40 text-white py-24">
  <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">HUBUNGI CS KAMI</h2>
    <p class="font-semibold text-black mb-8">Untuk paket wisata custom dan kebutuhan lainnya.</p>

    <div class="space-y-4">
      <a href="https://wa.me/6285846687692?text=Halo%20Admin" target="_blank" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full shadow-lg transition transform hover:scale-105">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
          <path d="M20.52 3.48a11.84 11.84 0 0 0-16.7 0A11.84 11.84 0 0 0 3.15 20l-1.22 4.42a.82.82 0 0 0 1 1l4.42-1.22a11.84 11.84 0 0 0 16.7-16.7zM12 21.29a9.25 9.25 0 0 1-5.21-1.55l-.37-.24-2.63.72.71-2.61-.24-.38a9.25 9.25 0 1 1 7.74 4.06zm5.46-6.86-.77.81c-.23.24-.46.27-.73.15a7.3 7.3 0 0 1-2.5-1.56 8.63 8.63 0 0 1-1.59-2.54c-.11-.27-.1-.5.14-.74l.77-.81a.58.58 0 0 0 0-.78l-1.12-1.35a.59.59 0 0 0-.79-.14 2.38 2.38 0 0 0-1.15 1.56c-.15.84.1 1.83.75 2.87a11.23 11.23 0 0 0 3.76 3.76c1.04.65 2.03.9 2.87.75a2.38 2.38 0 0 0 1.56-1.15.59.59 0 0 0-.14-.79l-1.35-1.12a.58.58 0 0 0-.78.01z"/>
        </svg>
        0858 4668 7692
      </a>
    </div>
  </div>
</section>



<section id="booking" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center justify-between">
        <!-- Gambar -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
          <img src="/image/hero.png" alt="Booking Image" class="w-full h-auto object-cover" />
        </div>
  
        <!-- Form Kontak -->
        <div class="w-full md:w-1/2 bg-white rounded-3xl shadow-xl p-8 md:ml-8">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">BOOKING SEKARANG,<br>UNTUK LIBURANMU NANTI</h2>
          <form class="space-y-4">
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
<section id="kontak" class="py-16 bg-blue-600 scroll-mt-24 text-white">
  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
    
    <!-- Kolom 1 (md:col-span-2): Logo dan Informasi -->
    <div class="md:col-span-2 flex flex-col md:flex-row items-center md:items-start gap-6">
      <!-- Logo -->
      <div class="shrink-0">
        <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Jelajah Bandung" class="w-40 h-40 object-contain">
      </div>

      <!-- Informasi -->
      <div class="space-y-4 text-center md:text-left">
        <h3 class="text-lg font-bold">PT. JELAJAH BANDUNG</h3>
        <p class="flex items-start gap-2 justify-center md:justify-start">
          <svg class="w-5 h-5 mt-1" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
          </svg>
          Jl. Braga No. 10, Bandung
        </p>
        <p class="flex items-center gap-2 justify-center md:justify-start">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.72 11.72 0 003.69.59 1 1 0 011 1v3.5a1 1 0 01-1 1A16 16 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.69 1 1 0 01-.24 1.01l-2.2 2.2z"/>
          </svg>
          0858-4668-7692
        </p>
        <p class="flex items-center gap-2 justify-center md:justify-start">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20 4H4a2 2 0 00-2 2v1.8l10 6.2 10-6.2V6a2 2 0 00-2-2zm0 4.2l-8 5-8-5V18a2 2 0 002 2h12a2 2 0 002-2V8.2z"/>
          </svg>
          info@jelajahbandung.com
        </p>
      </div>
    </div>

    <!-- Kolom 2: Kontak Kami -->
    <div class="text-center md:text-center space-y-4">
      <h3 class="text-lg font-bold">Kontak Kami</h3>
      <a target="_blank"
          class="cursor-pointer inline-block border hover:bg-green-600 border-white py-2 px-6 rounded-full hover:text-white transition">
        💬 0858 4668 7692
      </a>
    </div>

  </div>

  <!-- Copyright -->
  <div class="mt-10 text-center text-sm text-white/80">
    &copy; {{ date('Y') }} PT. Jelajah Bandung. All rights reserved.
  </div>
</section>
  @endsection