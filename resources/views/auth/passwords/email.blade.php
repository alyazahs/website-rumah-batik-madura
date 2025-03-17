@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Reset Password</h2>
        @if (session('success'))
            <div class="p-3 mb-4 text-green-700 bg-green-200 rounded">{{ session('success') }}</div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" required
                class="w-full p-2 border rounded mt-1 mb-4">
            <button type="submit"
                class="w-full bg-red-700 text-white p-2 rounded hover:bg-red-800 transition">
                Kirim Link Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
