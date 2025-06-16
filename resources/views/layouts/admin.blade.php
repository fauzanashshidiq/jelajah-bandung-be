<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
      <div class="p-6 text-2xl font-bold text-blue-600 border-b">Admin Panel</div>
      <nav class="p-4 text-gray-700 space-y-3">
        <a href="{{ route('admin.dashboard') }}" class="block hover:text-blue-600">Dashboard</a>
        <a href="{{ route('admin.paket-wisata.index') }}" class="block hover:text-blue-600">Paket Wisata</a>
        <a href="{{ route('admin.testimoni.index') }}" class="block hover:text-blue-600">Testimoni</a>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
      @yield('content')
    </main>
  </div>
</body>
</html>
