@extends('layouts.admin')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white rounded-lg shadow-xl overflow-hidden">
    <div class="bg-indigo-500 py-4 px-6">
        <h1 class="text-xl font-semibold text-white text-center">Your Profile</h1>
    </div>

    <div class="p-6" id="profileInfo">
        <div class="flex justify-center mb-4">
            <img src="{{ $user->path ? asset('storage/profile/'.$user->path) : 'https://via.placeholder.com/100' }}"
                alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border-2 border-indigo-300 shadow-md">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Nama:</label>
            <p class="text-gray-800 font-semibold">{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Email:</label>
            <p class="text-gray-800 font-semibold">{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Status:</label>
            <p class="font-semibold 
        {{ $user->status === 'active' ? 'text-red-600' : 'text-green-600' }}">
                {{ ucfirst($user->status) }}
            </p>
        </div>


        <div class="mt-6">
            <button onclick="toggleEdit(true)"
                class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
                <i class="fas fa-edit mr-2"></i> Edit Profile
            </button>
        </div>
    </div>

    <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
        class="hidden p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="photo" class="block font-medium text-gray-700">Foto Profil</label>
            <input type="file" id="photo" name="photo"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                onchange="previewPhoto()">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Preview Foto:</label>
            <img id="photoPreview"
                src="{{ $user->path ? asset('storage/profile/'.$user->path) : 'https://via.placeholder.com/100' }}"
                alt="Foto Profil" class="w-20 h-20 rounded-full object-cover border border-indigo-300 shadow-sm">
        </div>

        <div class="flex justify-end gap-2">
            <button type="button" onclick="toggleEdit(false)"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                <i class="fas fa-times mr-2"></i> Batal
            </button>
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>

<script>
    const profileInfo = document.getElementById('profileInfo');
    const editProfileForm = document.getElementById('editProfileForm');

    function toggleEdit(isEditing) {
        if (isEditing) {
            profileInfo.classList.add('hidden');
            editProfileForm.classList.remove('hidden');
        } else {
            profileInfo.classList.remove('hidden');
            editProfileForm.classList.add('hidden');
        }
    }

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