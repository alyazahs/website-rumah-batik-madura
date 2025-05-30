@extends('layouts.admin')

@section('content')

{{-- Flash Messages --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-2xl bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-2xl border border-green-300 backdrop-blur-sm">
    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm shrink-0 mt-0.5">
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

@if ($errors->any())
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show" x-transition
    class="mt-10 mx-4 p-4 rounded-2xl bg-gradient-to-r from-orange-400 to-red-400 text-white shadow-2xl border border-orange-300 backdrop-blur-sm">
    <div class="flex items-start gap-3 mb-2">
        <div class="w-8 h-8 bg-white bg-opacity-10 rounded-full flex items-center justify-center backdrop-blur-sm shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
            </svg>
        </div>
        <div>
            <span class="font-semibold">Terdapat kesalahan:</span>
            <ul class="mt-2 ml-4 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

{{-- Background Pattern --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-20 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-teal-200 to-emerald-200 opacity-20 rounded-full translate-y-40 -translate-x-40 blur-3xl"></div>
    
    {{-- Batik Pattern Overlay --}}
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23164e63&quot; fill-opacity=&quot;0.4&quot;%3E%3Ccircle cx=&quot;30&quot; cy=&quot;30&quot; r=&quot;4&quot;/%3E%3Ccircle cx=&quot;15&quot; cy=&quot;15&quot; r=&quot;2&quot;/%3E%3Ccircle cx=&quot;45&quot; cy=&quot;15&quot; r=&quot;2&quot;/%3E%3Ccircle cx=&quot;15&quot; cy=&quot;45&quot; r=&quot;2&quot;/%3E%3Ccircle cx=&quot;45&quot; cy=&quot;45&quot; r=&quot;2&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    {{-- Change Password Card --}}
    <div class="relative max-w-2xl mx-auto pt-10 pb-16 px-4">
        <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30">
            {{-- Header with Gradient --}}
            <div class="bg-gradient-to-r from-slate-700 via-cyan-800 to-teal-700 py-8 px-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative flex items-center justify-center">
                    <div class="text-center">
                        <div class="inline-flex items-center space-x-3 mb-2">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-key text-xl text-white"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white">Change Password</h1>
                        </div>
                        <p class="text-cyan-200 text-sm">Update your account password for security</p>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="p-8">
                <form method="POST" action="{{ route('profile.password.update') }}" x-data="{ showCurrentPassword: false, showNewPassword: false, showConfirmPassword: false }">
                    @csrf
                    @method('PUT')
                    
                    {{-- Current Password --}}
                    <div class="mb-6">
                        <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                            <label for="current_password" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-lock text-cyan-600 mr-2"></i>Password Lama
                            </label>
                            <div class="relative">
                                <input :type="showCurrentPassword ? 'text' : 'password'" 
                                       id="current_password" 
                                       name="current_password" 
                                       value="{{ old('current_password') }}"
                                       class="w-full px-4 py-3 pr-12 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white @error('current_password') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                                       placeholder="Masukkan password lama">
                                <button type="button" 
                                        @click="showCurrentPassword = !showCurrentPassword"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <i :class="showCurrentPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- New Password --}}
                    <div class="mb-6">
                        <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                            <label for="new_password" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-key text-cyan-600 mr-2"></i>Password Baru
                            </label>
                            <div class="relative">
                                <input :type="showNewPassword ? 'text' : 'password'" 
                                       id="new_password" 
                                       name="new_password" 
                                       value="{{ old('new_password') }}"
                                       class="w-full px-4 py-3 pr-12 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white @error('new_password') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                                       placeholder="Masukkan password baru">
                                <button type="button" 
                                        @click="showNewPassword = !showNewPassword"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <i :class="showNewPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                                </button>
                            </div>
                            @error('new_password')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-3 text-xs text-slate-500">
                                <p class="flex items-center mb-1">
                                    <i class="fas fa-info-circle text-cyan-500 mr-2"></i>
                                    Password minimal 8 karakter
                                </p>
                                <p class="flex items-center">
                                    <i class="fas fa-shield-alt text-cyan-500 mr-2"></i>
                                    Kombinasi huruf, angka, dan simbol direkomendasikan
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Confirm New Password --}}
                    <div class="mb-8">
                        <div class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                            <label for="new_password_confirmation" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-check-double text-cyan-600 mr-2"></i>Konfirmasi Password Baru
                            </label>
                            <div class="relative">
                                <input :type="showConfirmPassword ? 'text' : 'password'" 
                                       id="new_password_confirmation" 
                                       name="new_password_confirmation" 
                                       value="{{ old('new_password_confirmation') }}"
                                       class="w-full px-4 py-3 pr-12 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white @error('new_password_confirmation') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                                       placeholder="Konfirmasi password baru">
                                <button type="button" 
                                        @click="showConfirmPassword = !showConfirmPassword"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                                </button>
                            </div>
                            @error('new_password_confirmation')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Security Notice --}}
                    <div class="mb-8 bg-gradient-to-r from-cyan-50 to-blue-50 border border-cyan-200 rounded-2xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center shrink-0 mt-1">
                                <i class="fas fa-shield-alt text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-cyan-800 font-semibold mb-2">Tips Keamanan Password</h3>
                                <ul class="text-cyan-700 text-sm space-y-1">
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                                        Gunakan kombinasi huruf besar, kecil, angka, dan simbol
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                                        Hindari menggunakan informasi pribadi yang mudah ditebak
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                                        Ganti password secara berkala untuk keamanan optimal
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex-1 bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl>
                            <i class="fas fa-arrow-left mr-3 text-lg"></i> 
                            <span class="text-lg">Kembali</span>
                        </a>
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <i class="fas fa-save mr-3 text-lg"></i> 
                            <span class="text-lg">Simpan Password</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection