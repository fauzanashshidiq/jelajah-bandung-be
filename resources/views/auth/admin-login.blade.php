@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 mt-10 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Login Admin</h1>

    @if(session('error'))
        <div class="text-red-500 mb-3">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="name" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
    </form>
</div>
@endsection
