<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Jelajah Bandung</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <!-- Sidebar -->
  <div class="flex min-h-screen">
    <aside class="w-64 bg-white shadow-md">
      <div class="p-6 text-2xl font-bold text-blue-600 border-b">Admin Panel</div>
      <nav class="p-4 text-gray-700 space-y-3">
        <a href="#" class="block hover:text-blue-600">Dashboard</a>
        <a href="#" class="block hover:text-blue-600">Paket Wisata</a>
        <a href="#" class="block hover:text-blue-600">Galeri</a>
        <a href="#" class="block hover:text-blue-600">Jadwal Kegiatan</a>
        <a href="#" class="block hover:text-blue-600">Fasilitas</a>
        <a href="#" class="block hover:text-blue-600">Harga</a>
        <a href="#" class="block hover:text-blue-600">Pesanan</a>
        <a href="#" class="block hover:text-blue-600">Testimoni</a>
        <a href="#" class="block hover:text-blue-600">Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h1 class="text-2xl font-semibold text-gray-800 mb-4">Dashboard Admin</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-500">Total Paket Wisata</h2>
          <p class="text-2xl font-bold text-blue-600">12</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-500">Total Pesanan</h2>
          <p class="text-2xl font-bold text-green-600">30</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-500">Testimoni Masuk</h2>
          <p class="text-2xl font-bold text-yellow-600">7</p>
        </div>
      </div>

      <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Aktivitas Terbaru</h2>
        <ul class="bg-white rounded-xl shadow divide-y">
          <li class="p-4">Pesanan baru untuk Paket Lembang - 2 orang</li>
          <li class="p-4">Testimoni ditambahkan oleh Budi</li>
          <li class="p-4">Harga diperbarui untuk Paket Ciwidey</li>
        </ul>
      </div>
    </main>
  </div>
</body>
</html>
