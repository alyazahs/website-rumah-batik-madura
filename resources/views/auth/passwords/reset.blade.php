@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Buat Password Baru</h2>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" required class="w-full p-2 border rounded mt-1 mb-4">
            
            <label for="password" class="block font-medium">Password Baru</label>
            <input type="password" name="password" required class="w-full p-2 border rounded mt-1 mb-4">
            
            <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="w-full p-2 border rounded mt-1 mb-4">
            
            <button type="submit"
                class="w-full bg-red-700 text-white p-2 rounded hover:bg-red-800 transition">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
