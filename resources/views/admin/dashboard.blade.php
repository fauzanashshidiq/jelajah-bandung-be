@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="flex justify-end mb-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded shadow">
                Logout
            </button>
        </form>
    </div>

    <div class="p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Selamat Datang, Admin!</h1>
        <p class="text-gray-600">Ini adalah halaman dashboard admin. Silakan kelola data melalui menu navigasi.</p>
    </div>
@endsection
