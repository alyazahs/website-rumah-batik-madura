@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Edit profile</h1>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
