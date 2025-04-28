@extends('layouts.admin')

@section('content')

{{-- Flash Message --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-lg bg-green-100 text-green-800 shadow-lg border border-green-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mt-1 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-lg bg-red-100 text-red-800 shadow-lg border border-red-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mt-1 shrink-0 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
    <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

{{-- Profile Card --}}
<div class="max-w-4xl mx-auto mt-10 bg-white rounded-lg shadow-xl overflow-hidden">
    <div class="bg-indigo-500 py-4 px-6">
        <h1 class="text-xl font-semibold text-white text-center">Your Profile</h1>
    </div>

    {{-- Profile View --}}
    <div class="p-6 flex gap-6" id="profileInfo">
        <div class="flex-shrink-0">
            <img src="{{ $user->path ? asset('storage/profile/' . $user->path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                alt="Foto Profil" class="w-64 h-80 rounded-lg object-cover border-2 border-indigo-300 shadow-md">
        </div>

        <div class="flex-1">
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Nama:</label>
                <p class="text-gray-800 font-semibold">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Email:</label>
                <p class="text-gray-800 font-semibold">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Created At:</label>
                <p class="text-gray-800 font-semibold">{{ $user->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Status:</label>
                <p class="text-sm {{ $user->status === 'Active' ? 'text-green-500' : 'text-red-500' }}">
                    {{ $user->status }}
                </p>
            </div>

            <div class="mt-6">
                <button onclick="toggleEdit(true)"
                    class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
                    <i class="fas fa-edit mr-2"></i> Edit Profile
                </button>
            </div>
        </div>
    </div>

    {{-- Edit Profile Form --}}
    <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="hidden p-6">
        @csrf
        @method('PUT')

        <div class="flex gap-6">
            {{-- Photo Preview --}}
            <div class="relative w-64 h-80">
                <img id="photoPreview"
                    src="{{ $user->path ? asset('storage/profile/' . $user->path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    alt="Foto Profil" class="w-full h-full rounded-lg object-cover border-2 border-indigo-300 shadow-md">

                {{-- Hapus Foto --}}
                <button type="button" onclick="removePhoto()"
                    class="absolute top-2 right-2 bg-red-500 hover:bg-red-700 text-white rounded-full p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.707 5.293a1 1 0 00-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 001.414 1.414L10 11.414l3.293 3.293a1 1 0 001.414-1.414L11.414 10l3.293-3.293a1 1 0 00-1.414-1.414L10 8.586 6.707 5.293z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            {{-- Form Input --}}
            <div class="flex-1">
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
                        onchange="previewPhoto(event)">

                    <input type="hidden" name="remove_photo" id="removePhotoInput" value="0">
                </div>

                <div class="mt-6 flex gap-4">
                    <button type="button" onclick="toggleEdit(false)"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition duration-200">
                        <i class="fas fa-save mr-2"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Script --}}
<script>
    const profileInfo = document.getElementById('profileInfo');
    const editProfileForm = document.getElementById('editProfileForm');

    function toggleEdit(isEditing) {
        profileInfo.classList.toggle('hidden', isEditing);
        editProfileForm.classList.toggle('hidden', !isEditing);
    }

    function previewPhoto(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);

        // Reset remove_photo
        document.getElementById('removePhotoInput').value = '0';
    }

    function removePhoto() {
        document.getElementById('photoPreview').src = "{{ asset('images/default-user.png') }}";
        document.getElementById('photo').value = '';
        document.getElementById('removePhotoInput').value = '1';
    }
</script>

@endsection