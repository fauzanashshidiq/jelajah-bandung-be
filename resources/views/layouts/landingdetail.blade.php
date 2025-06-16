<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jelajah Bandung</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Splide CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>  
</head>
<body class="bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('image/bandung.jpg') }}');">
  <!-- Navbar -->
<nav class="bg-gradient-to-b from-white/95 to-white/80 shadow fixed w-full z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <!-- Logo dan Judul -->
    <a href="#" class="flex items-center space-x-2">
      <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Logo Jelajah Bandung" class="w-11 h-11 object-cover">
      <span class="text-xl font-bold text-blue-600 pl-4">Jelajah Bandung</span>
    </a>
    
    <!-- Menu -->
    <ul class="flex space-x-6">
      <li><a href="{{ route('landing.home') }}" class="hover:text-blue-600">Home</a></li>
      <li><a href="#wisata" class="hover:text-blue-600">Detail Wisata</a></li>
      <li><a href="#booking" class="hover:text-blue-600">Booking</a></li>
      <li><a href="#kontak" class="hover:text-blue-600">Kontak</a></li>
      <li><a href="{{ route('landing.tentang') }}" class="hover:text-blue-600">Tentang Kami</a></li>
    </ul>
  </div>
</nav>


  <!-- Main Content -->
  <main class="relative z-10">
    @yield('content')
  </main>

  <!-- Tombol WhatsApp -->
  <a href="https://wa.me/6285871641398" target="_blank"
     class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg animate-pulse transition-transform hover:scale-110 flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="M20.52 3.48A11.93 11.93 0 0012 0a11.94 11.94 0 00-10.51 17.39L0 24l6.84-1.49A11.94 11.94 0 0012 24c6.62 0 12-5.38 12-12 0-3.19-1.24-6.19-3.48-8.52zm-8.54 17.5a9.36 9.36 0 01-4.75-1.29l-.34-.2-4.07.89.86-3.96-.22-.36A9.4 9.4 0 1121.9 12c0 5.18-4.22 9.38-9.38 9.38zm5.36-7.23c-.29-.14-1.71-.84-1.98-.94-.27-.1-.47-.14-.66.15-.19.29-.76.94-.93 1.13-.17.19-.34.21-.63.07-.29-.14-1.23-.45-2.35-1.44-.87-.78-1.45-1.74-1.61-2.03-.17-.29-.02-.45.13-.59.13-.13.29-.34.43-.51.14-.17.19-.29.29-.48.1-.19.05-.36-.02-.5-.07-.14-.66-1.6-.9-2.19-.24-.58-.48-.5-.66-.51-.17-.01-.36-.01-.55-.01s-.5.07-.76.36c-.26.29-1 1-.98 2.44.01 1.44 1.02 2.83 1.16 3.03.14.19 2.01 3.2 4.88 4.48.68.29 1.21.46 1.63.59.69.22 1.32.19 1.82.12.56-.08 1.71-.7 1.95-1.38.24-.69.24-1.28.17-1.38-.07-.1-.26-.17-.55-.31z"/>
    </svg>
    <span class="hidden sm:inline"> Chat via WhatsApp</span>
  </a>
</body>

<!-- Splide JS -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Init semua splide slider
    document.querySelectorAll('.paket-slider').forEach(slide => {
      new Splide(slide, {
        perPage: 1,
        gap: '1rem',
        pagination: true,
        arrows: true,
      }).mount();
    });

    // Filter tombol
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        // Sembunyikan semua slider
        document.querySelectorAll('.paket-slider').forEach(s => s.classList.add('hidden'));

        // Tampilkan target slider
        const target = this.dataset.target;
        document.querySelector(target).classList.remove('hidden');

        // Ubah warna tombol
        document.querySelectorAll('.filter-btn').forEach(b => {
          b.classList.remove('bg-rose-600');
          b.classList.add('bg-sky-600');
        });
        this.classList.remove('bg-sky-600');
        this.classList.add('bg-rose-600');
      });
    });
    document.querySelectorAll('.splide').forEach(slide => {
      new Splide(slide, {
        type       : 'loop',
        perPage    : 1,
        autoplay   : true,
        interval   : 5000,
        pagination : true,
        arrows     : true,
      }).mount();
    });
  });
</script>
</html>