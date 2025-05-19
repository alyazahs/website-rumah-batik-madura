@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 p-6 bg-white rounded shadow">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label class="block mb-2 font-bold" for="email">Email</label>
        <input type="email" name="email" value="{{ old('email', $email) }}" class="w-full p-2 border rounded" required autofocus>

        <label class="block mb-2 mt-4 font-bold" for="password">Password Baru</label>
        <input type="password" name="password" class="w-full p-2 border rounded" required>

        <label class="block mb-2 mt-4 font-bold" for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>

        <button type="submit" class="mt-4 w-full bg-blue-600 text-white p-2 rounded">Reset Password</button>
    </form>
</div>
@endsection
