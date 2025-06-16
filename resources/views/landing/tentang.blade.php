@extends('layouts.tentang')

@section('content')
<section class="pt-32 pb-20 bg-white/80">
  <div class="max-w-5xl mx-auto px-4">
    <h1 class="text-4xl font-bold text-center text-blue-700 mb-10">Tentang Jelajah Bandung</h1>
    <div class="flex justify-center mb-10">
        <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Jelajah Bandung" class="w-50 h-auto max-w-4xl object-cover">
      </div>
    <div class="text-gray-800 text-lg leading-relaxed space-y-6">
      <p>
        <strong>Jelajah Bandung</strong> adalah platform wisata yang hadir untuk membantu Anda menemukan pengalaman terbaik menjelajahi keindahan alam dan budaya kota Bandung. Kami percaya bahwa setiap perjalanan memiliki cerita, dan kami ingin menjadi bagian dari cerita perjalanan Anda.
      </p>

      <p>
        Berawal dari kecintaan terhadap alam dan budaya lokal, kami membangun Jelajah Bandung dengan harapan dapat menjadi jembatan antara wisatawan dan berbagai destinasi menarik di Bandung. Kami bekerja sama dengan pemandu wisata berpengalaman dan mitra lokal untuk memastikan pengalaman perjalanan Anda menyenangkan, aman, dan tak terlupakan.
      </p>

      <p>
        Kami menawarkan berbagai <a href="{{ url('/#paket-wisata') }}" class="text-blue-600 underline hover:text-blue-800">paket wisata</a> yang dapat disesuaikan dengan kebutuhan, baik untuk liburan keluarga, gathering perusahaan, hingga petualangan alam.
      </p>

      <p>
        Hubungi kami kapan pun jika Anda membutuhkan informasi lebih lanjut atau ingin berkonsultasi mengenai perjalanan Anda.
      </p>
    </div>

    {{-- <div class="mt-12 text-center">
      <a href="#kontak" class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded shadow transition">
        Hubungi Kami
      </a>
    </div> --}}

    <div id="visi-misi" class="mt-12 scroll-mt-32">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Visi</h2>
        <p class="text-gray-800 text-lg leading-relaxed">
          Menjadi platform wisata lokal terbaik dan terpercaya di Bandung yang menghadirkan pengalaman wisata yang berkesan, edukatif, dan ramah lingkungan.
        </p>
      
        <h2 class="text-2xl font-bold text-blue-700 mt-8 mb-4">Misi</h2>
        <ul class="list-disc list-inside text-gray-800 text-lg space-y-2">
          <li>Menyediakan paket wisata yang variatif dan berkualitas dengan harga terjangkau.</li>
          <li>Memberdayakan masyarakat lokal sebagai bagian dari ekosistem wisata Bandung.</li>
          <li>Menjaga kelestarian alam dan budaya dalam setiap kegiatan wisata.</li>
          <li>Menghadirkan layanan pelanggan yang cepat, ramah, dan profesional.</li>
        </ul>
      </div>

      <div id="produk" class="mt-16 scroll-mt-32">
        <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">Produk Kami</h2>
        <div class="grid md:grid-cols-2 gap-6 text-gray-800 text-lg">
          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-xl mb-2 text-blue-600">Paket Wisata Bandung</h3>
            <p>Wisata alam, budaya, kuliner, hingga edukasi dengan berbagai pilihan durasi dan destinasi menarik di Bandung dan sekitarnya.</p>
          </div>
          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-xl mb-2 text-blue-600">Trip Khusus Sekolah & Instansi</h3>
            <p>Paket edukatif untuk sekolah, universitas, dan perusahaan yang ingin mengadakan study tour atau gathering.</p>
          </div>
          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-xl mb-2 text-blue-600">Pemandu Wisata Lokal</h3>
            <p>Layanan pemandu berpengalaman untuk menemani perjalanan Anda dan menjelaskan sejarah serta budaya setiap destinasi.</p>
          </div>
          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-xl mb-2 text-blue-600">Kustomisasi Perjalanan</h3>
            <p>Punya rencana sendiri? Kami bantu rancang perjalanan sesuai kebutuhan dan preferensi Anda.</p>
          </div>
        </div>
      </div>      
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
