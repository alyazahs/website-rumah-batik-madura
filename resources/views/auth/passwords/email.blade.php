@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 p-6 bg-white rounded shadow">
    @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="block mb-2 font-bold" for="email">Email</label>
        <input type="email" name="email" class="w-full p-2 border rounded" required autofocus>

        @error('email')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror

        <button type="submit" class="mt-4 w-full bg-blue-500 text-white p-2 rounded">Kirim Link Reset</button>
    </form>
</div>
@endsection
