@extends('layouts.admin')

@section('content')

{{-- Flash Message --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-2xl border border-green-400">
    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-2xl bg-gradient-to-r from-red-400 to-rose-500 text-white shadow-2xl border border-red-300 backdrop-blur-sm">
    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

{{-- Background Pattern --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-20 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-teal-200 to-emerald-200 opacity-20 rounded-full translate-y-40 -translate-x-40 blur-3xl"></div>

    {{-- Profile Card --}}
    <div class="relative max-w-5xl mx-auto pt-10 pb-16 px-4">
        <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30">
            {{-- Header with Gradient --}}
            <div class="bg-gradient-to-r from-slate-700 via-cyan-800 to-teal-700 py-8 px-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative flex items-center justify-center">
                    <div class="text-center">
                        <div class="inline-flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-user text-lg text-white"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white">Your Profile</h1>
                        </div>
                        <p class="text-cyan-200 text-sm">Manage your account information</p>
                    </div>
                </div>
            </div>

            {{-- Profile View --}}
            <div class="p-8" id="profileInfo">
                <div class="flex flex-col lg:flex-row gap-8">
                    {{-- Profile Image Section --}}
                    <div class="flex-shrink-0 text-center lg:text-left">
                        <div class="relative inline-block">
                            <div class="w-72 h-80 rounded-2xl overflow-hidden bg-gradient-to-br from-slate-100 to-cyan-50 p-1 shadow-2xl">
                                <img src="{{ $user->path ? asset('storage/profile/' . $user->path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                    alt="Foto Profil" class="w-full h-full rounded-xl object-cover">
                            </div>
                            <div class="absolute -bottom-3 -right-3 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Profile Information --}}
                    <div class="flex-1">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label class="block font-semibold text-slate-600 text-sm mb-2 uppercase tracking-wide">
                                    <i class="fas fa-user text-cyan-600 mr-2"></i>Nama
                                </label>
                                <p class="text-slate-800 font-bold text-xl">{{ $user->name }}</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label class="block font-semibold text-slate-600 text-sm mb-2 uppercase tracking-wide">
                                    <i class="fas fa-envelope text-cyan-600 mr-2"></i>Email
                                </label>
                                <p class="text-slate-800 font-bold text-xl break-all">{{ $user->email }}</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label class="block font-semibold text-slate-600 text-sm mb-2 uppercase tracking-wide">
                                    <i class="fas fa-calendar text-cyan-600 mr-2"></i>Created At
                                </label>
                                <p class="text-slate-800 font-bold text-xl">{{ $user->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label class="block font-semibold text-slate-600 text-sm mb-2 uppercase tracking-wide">
                                    <i class="fas fa-info-circle text-cyan-600 mr-2"></i>Status
                                </label>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full mr-3 {{ $user->status === 'Active' ? 'bg-green-400' : 'bg-red-400' }} shadow-lg"></div>
                                    <p class="text-xl font-bold {{ $user->status === 'Active' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $user->status }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button onclick="toggleEdit(true)"
                                class="w-full bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                <i class="fas fa-edit mr-3 text-lg"></i> 
                                <span class="text-lg">Edit Profile</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Profile Form --}}
            <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="hidden p-8">
                @csrf
                @method('PUT')

                <div class="flex flex-col lg:flex-row gap-8">
                    {{-- Photo Preview Section --}}
                    <div class="flex-shrink-0 text-center lg:text-left">
                        <div class="relative inline-block">
                            <div class="w-72 h-80 rounded-2xl overflow-hidden bg-gradient-to-br from-slate-100 to-cyan-50 p-1 shadow-2xl">
                                <img id="photoPreview"
                                    src="{{ $user->path ? asset('storage/profile/' . $user->path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                    alt="Foto Profil" class="w-full h-full rounded-xl object-cover">
                            </div>

                            {{-- Remove Photo Button --}}
                            <button type="button" onclick="removePhoto()"
                                class="absolute top-3 right-3 bg-gradient-to-br from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white rounded-full p-3 shadow-xl transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-red-400 focus:ring-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6.707 5.293a1 1 0 00-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 001.414 1.414L10 11.414l3.293 3.293a1 1 0 001.414-1.414L11.414 10l3.293-3.293a1 1 0 00-1.414-1.414L10 8.586 6.707 5.293z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Form Input Section --}}
                    <div class="flex-1">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label for="name" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                    <i class="fas fa-user text-cyan-600 mr-2"></i>Nama
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white">
                            </div>

                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label for="email" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                    <i class="fas fa-envelope text-cyan-600 mr-2"></i>Email
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white">
                            </div>

                            <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                                <label for="photo" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                    <i class="fas fa-camera text-cyan-600 mr-2"></i>Foto Profil
                                </label>
                                <div class="relative">
                                    <input type="file" id="photo" name="photo"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100"
                                        onchange="previewPhoto(event)">
                                </div>
                                <input type="hidden" name="remove_photo" id="removePhotoInput" value="0">
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <button type="button" onclick="toggleEdit(false)"
                                class="flex-1 bg-gradient-to-r from-red-800 to-rose-600 hover:via-red-900 hover:to-rose-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-times mr-3 text-lg"></i> 
                                <span class="text-lg">Cancel</span>
                            </button>
                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                <i class="fas fa-save mr-3 text-lg"></i> 
                                <span class="text-lg">Save Changes</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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