@extends('layouts.app')
@extends('admin.dashboard')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Ganti Password</h1>
    <form method="POST" action="{{ route('profile.password.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Password Lama</label>
            <input type="password" name="current_password" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label>Password Baru</label>
            <input type="password" name="new_password" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan Password</button>
    </form>
</div>
@endsection
