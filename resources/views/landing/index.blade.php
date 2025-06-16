@extends('layouts.landing')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-white overflow-hidden">
  <!-- Layer gambar tetap tajam -->
  <div class="absolute inset-0 bg-cover bg-center -z-20" 
       style="background-image: url('{{ asset('image/gunung.jpeg') }}');">
  </div>

  <!-- Layer semi-transparan agar teks terbaca, efek gelap halus -->
  <div class="absolute inset-0 bg-black/40 -z-10"></div>

  <!-- Konten utama -->
  <div class="text-center px-4">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Jelajah Bandung</h1>
    <p class="text-lg md:text-xl">Temukan keindahan alam dan budaya Bandung bersama kami</p>
  </div>
</section>


<!-- Paket Wisata Section -->
{{-- <section id="paket" class="py-16 bg-gray-50"> --}}
  <section id="paket-wisata" class="py-16 pt-28 scroll-mt-24 relative overflow-hidden" x-data="{ tab: '{{ \Str::slug($durasiList[0]) }}' }">
    <!-- Background -->
    <div class="absolute inset-0 -z-10">
      <div class="w-full h-full bg-blue-300/40"></div>
    </div>
  
    <!-- Konten -->
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-6">Paket Wisata</h2>
  
      <!-- Tombol Tab Durasi -->
      <div class="flex justify-center flex-wrap gap-2 mb-8">
        @foreach ($durasiList as $durasi)
          <button
            @click="tab = '{{ \Str::slug($durasi) }}'"
            :class="tab === '{{ \Str::slug($durasi) }}' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-200 text-gray-700 hover:bg-blue-700'"
            class="px-4 py-2 rounded-full font-semibold transition">
            {{ $durasi }} hari
          </button>
        @endforeach
      </div>
  
      <!-- Carousel Per Durasi (Manual Show/Hide via Alpine.js) -->
      @foreach ($durasiList as $durasi)
        <div x-show="tab === '{{ \Str::slug($durasi) }}'" x-transition>
          <div class="splide paket-slider mb-12" aria-label="Paket {{ $durasi }}">
            <div class="splide__track">
              <ul class="splide__list">
                @php
                  $chunks = $paketsByDurasi[$durasi]->chunk(4);
                @endphp
  
                @foreach ($chunks as $chunk)
                  <li class="splide__slide">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 lg:px-0">
                      @foreach ($chunk as $paket)
                        @php
                          $harga = $paket->hargas->first()->harga_per_peserta ?? 0;
                        @endphp
                        <div class="bg-white rounded-xl rounded-b-3xl overflow-hidden shadow-lg relative group max-w-md mx-auto w-full h-[440px] flex flex-col">
                          <div class="h-72 overflow-hidden">
                            <img src="{{ asset('image/' . $paket->gambar_paket) }}"
                              alt="{{ $paket->nama_paket }}"
                              class="w-full h-72 object-cover transition-transform group-hover:scale-105 duration-300">
                          </div>                          
                          <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                              <h3 class="text-xl font-bold">{{ $paket->nama_paket }}</h3>
                              <p class="text-gray-500 text-sm mt-1">Start from</p>
                              <p class="text-lg font-bold">Rp {{ number_format($harga / 1000, 0) }}K</p>
                            </div>
                            <a href="{{ route('landing.detail', ['id_paket' => $paket->id_paket]) }}" class="mt-3 inline-block bg-rose-600 hover:bg-rose-900 text-white text-sm font-semibold px-4 py-2 rounded-full self-start">
                              Detail &rsaquo;
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  
  

<!-- Kenapa Memilih Jelajah Bandung -->
<section class="py-16 bg-white/70" id="alasan">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-6 text-blue-600">Kenapa Memilih Jelajah Bandung?</h2>
    {{-- <p class="mb-8 text-blue-600">Kami menawarkan pengalaman wisata terbaik dengan:</p> --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-blue-600">Tour Guide Profesional</h3>
        <p>Tour guide berpengalaman dan ramah siap menemani perjalananmu.</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-blue-600">Harga Terjangkau</h3>
        <p>Paket lengkap dengan fasilitas memadai, tanpa menguras kantong.</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-blue-600">Destinasi Menarik</h3>
        <p>Kunjungi tempat populer dan hidden gem yang tak terlupakan.</p>
      </div>

      <!-- Card 4 -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-blue-600">Pelayanan Responsif</h3>
        <p>Tim kami siap membantu dengan cepat dan profesional.</p>
      </div>
    </div>
  </div>
</section>


<!-- Testimoni -->
<section class="py-16 bg-gray-100" id="testimoni">
  <div class="max-w-5xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-10">Apa Kata Mereka?</h2>

    @if($testimonis->count())
      <div class="splide" aria-label="Testimoni Slider">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach($testimonis->chunk(4) as $chunk)
              <li class="splide__slide">
                <div class="grid  grid-cols-2 gap-6 px-4">
                  @foreach($chunk as $testimoni)
                    <div class="bg-white p-6 rounded shadow text-left">
                      @if($testimoni->foto)
                        <img src="{{ asset('image/testimoni/' . $testimoni->foto) }}"
                             class="w-16 h-16 rounded-full object-cover mb-4 mx-auto" alt="Foto {{ $testimoni->nama_pengguna }}">
                      @endif
                      <p class="mb-2 italic text-gray-700">"{{ $testimoni->isi }}"</p>
                      <h4 class="font-semibold text-gray-900 text-right">- {{ $testimoni->nama_pengguna }}</h4>
                    </div>
                  @endforeach
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    @else
      <p class="text-gray-500">Belum ada testimoni.</p>
    @endif
  </div>
</section>


<!-- Kontak Kami -->
{{-- <section class="py-16" id="kontak"> --}}
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
