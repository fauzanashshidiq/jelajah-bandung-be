@extends('layouts.landing')

@section('content')
<!-- Hero Section -->
<section class="bg-cover bg-center h-screen text-white flex items-center justify-center" style="background-image: url('{{ asset('image/hero.png') }}');">
  <div class="text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Jelajah Bandung</h1>
    <p class="text-lg md:text-xl">Temukan keindahan alam dan budaya Bandung bersama kami</p>
  </div>
</section>

<!-- Paket Wisata Section -->
{{-- <section id="paket" class="py-16 bg-gray-50"> --}}
  <section id="paket-wisata" class="py-16 bg-gray-50 scroll-mt-24">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-6">Paket Wisata</h2>

    <!-- Filter Durasi -->
    <div class="flex justify-center flex-wrap gap-2 mb-8">
      @foreach ($durasiList as $index => $durasi)
        <button
          data-target="#slider-{{ \Str::slug($durasi) }}"
          class="filter-btn px-4 py-2 rounded-full text-white font-semibold 
          {{ $index === 0 ? 'bg-rose-600' : 'bg-sky-600' }} hover:opacity-80 text-sm">
          {{ $durasi }} hari
        </button>
      @endforeach
    </div>

    <!-- Carousel Per Durasi -->
    @foreach ($durasiList as $index => $durasi)
      <div id="slider-{{ \Str::slug($durasi) }}" class="splide paket-slider {{ $index !== 0 ? 'hidden' : '' }} mb-12" aria-label="Paket {{ $durasi }}">
        <div class="splide__track">
          <ul class="splide__list">
            @php
              $chunks = $paketsByDurasi[$durasi]->chunk(4);
            @endphp

            @foreach ($chunks as $chunk)
              <li class="splide__slide">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  @foreach ($chunk as $paket)
                    @php
                      $harga = $paket->hargas->first()->harga_per_peserta ?? 0;
                    @endphp
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg relative group">
                      <img src="{{ asset('image/' . $paket->gambar_paket) }}"
                        alt="{{ $paket->nama_paket }}"
                        class="w-full h-52 object-cover transition-transform group-hover:scale-105 duration-300 rounded-t-xl">
                      <div class="p-4">
                        <p class="text-sm text-rose-600 font-semibold">{{ $paket->durasi_paket }}</p>
                        <h3 class="text-xl font-bold">{{ $paket->nama_paket }}</h3>
                        <p class="text-gray-500 text-sm mt-1">Start from</p>
                        <p class="text-lg font-bold">Rp {{ number_format($harga / 1000, 0) }}K</p>
                        <a href="{{ route('landing.detail', ['id_paket' => $paket->id_paket]) }}" class="mt-3 inline-block bg-rose-600 text-white text-sm font-semibold px-4 py-2 rounded-full">
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
    @endforeach
  </div>
</section>





<!-- Kenapa Memilih Jelajah Bandung -->
<section class="py-16" id="alasan">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-6">Kenapa Memilih Jelajah Bandung?</h2>
    <p class="mb-4">Kami menawarkan pengalaman wisata terbaik dengan:</p>
    <ul class="list-disc text-left inline-block">
      <li>Tour guide berpengalaman dan ramah</li>
      <li>Harga terjangkau dengan fasilitas lengkap</li>
      <li>Destinasi wisata populer dan hidden gem</li>
      <li>Pelayanan responsif dan profesional</li>
    </ul>
  </div>
</section>

<!-- Testimoni -->
<section class="py-16 bg-gray-100" id="testimoni">
  <div class="max-w-5xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-10">Apa Kata Mereka?</h2>
    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded shadow">
        <p class="mb-2 italic">"Perjalanan ke Ciwidey sangat menyenangkan, guide-nya luar biasa!"</p>
        <h4 class="font-semibold">- Rina, Jakarta</h4>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <p class="mb-2 italic">"Sangat puas dengan pelayanan dan fasilitas yang diberikan!"</p>
        <h4 class="font-semibold">- Budi, Surabaya</h4>
      </div>
    </div>
  </div>
</section>

<!-- Kontak Kami -->
{{-- <section class="py-16" id="kontak"> --}}
<section id="kontak" class="py-16 scroll-mt-24">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-6">Kontak Kami</h2>
    <p class="mb-4">Hubungi kami untuk pemesanan atau informasi lebih lanjut:</p>
    <p>Email: info@jelajahbandung.com</p>
    <p>Telepon: 0821-1234-5678</p>
    <p>Alamat: Jl. Braga No. 10, Bandung</p>
  </div>
</section>
@endsection
