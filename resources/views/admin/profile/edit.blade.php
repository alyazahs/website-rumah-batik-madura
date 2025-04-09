@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Foto Profil</label>
            <input type="file" name="photo" id="photo"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                file:rounded file:border-0 file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" onchange="previewPhoto()">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-700">Preview Foto:</label>
            <img id="photoPreview" src="{{ $user->path ? asset('storage/profile/'.$user->path) : 'https://via.placeholder.com/100' }}" class="w-24 h-24 rounded-full object-cover border" alt="Foto Profil">
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition duration-200">
            Simpan
        </button>
    </form>
</div>

<script>
    function previewPhoto() {
        const input = document.getElementById('photo');
        const preview = document.getElementById('photoPreview');
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => preview.src = e.target.result;
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
