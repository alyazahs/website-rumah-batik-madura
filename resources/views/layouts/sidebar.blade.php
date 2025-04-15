<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="flex h-screen bg-gray-100">
    <aside class="w-64 bg-indigo-800 text-white flex flex-col p-4 min-h-screen space-y-4" x-data>
        {{-- Logo / Brand --}}
        <div class="flex items-center space-x-2 mb-4">
            <i class="fa-solid fa-store"></i>
            <span class="text-white text-lg font-semibold">RBM</span>
        </div>

        {{-- Profil --}}
        <div class="flex flex-col items-center mb-6">
            <img src="{{ Auth::user()->path ? asset('storage/profile/' . Auth::user()->path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                alt="Profile"
                class="w-16 h-16 rounded-full mb-2 object-cover">
            <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
            <p class="text-sm text-green-300">{{ Auth::user()->level }}</p>
        </div>

        {{-- Navigasi --}}
        <nav class="space-y-2 text-sm">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
                class="block px-4 py-2 rounded hover:bg-indigo-600 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 font-semibold' : '' }}">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>

            {{-- Profile Dropdown --}}
            <div x-data="{ open: {{ request()->routeIs('profile.*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="w-full flex justify-between items-center px-4 py-2 hover:bg-indigo-600 rounded"
                    :class="{ 'bg-indigo-700 font-semibold': open }">
                    <span><i class="fas fa-user mr-2"></i> Profile</span>
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition x-cloak class="mt-1 ml-4 space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-1 rounded hover:bg-indigo-600 {{ request()->routeIs('profile.edit') ? 'bg-indigo-700 font-semibold' : '' }}">
                        My Profile
                    </a>
                    <a href="{{ route('profile.password') }}"
                        class="block px-4 py-1 rounded hover:bg-indigo-600 {{ request()->routeIs('profile.password') ? 'bg-indigo-700 font-semibold' : '' }}">
                        Change Password
                    </a>
                </div>
            </div>

            {{-- Master Data Dropdown --}}
            <div x-data="{ open: {{ request()->routeIs('product.*') || request()->routeIs('user.*') || request()->routeIs('category.*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="w-full flex justify-between items-center px-4 py-2 hover:bg-indigo-600 rounded"
                    :class="{ 'bg-indigo-700 font-semibold': open }">
                    <span><i class="fas fa-database mr-2"></i> Master Data</span>
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition x-cloak class="mt-1 ml-4 space-y-1">
                    <a href="{{ route('product.index') }}"
                        class="block px-4 py-1 rounded hover:bg-indigo-600 {{ request()->routeIs('product.*') ? 'bg-indigo-700 font-semibold' : '' }}">
                        Manage Products
                    </a>
                    <a href="{{ route('category.index') }}"
                        class="block px-4 py-1 rounded hover:bg-indigo-600 {{ request()->routeIs('category.*') ? 'bg-indigo-700 font-semibold' : '' }}">
                        Manage Categories
                    </a>
                    <a href="{{ route('user.index') }}"
                        class="block px-4 py-1 rounded hover:bg-indigo-600 {{ request()->routeIs('user.*') ? 'bg-indigo-700 font-semibold' : '' }}">
                        Manage Users
                    </a>
                </div>
            </div>

            {{-- Log --}}
            <a href="{{ route('admin.logs') }}"
                class="block px-4 py-2 rounded hover:bg-indigo-600 {{ request()->routeIs('admin.logs') ? 'bg-indigo-700 font-semibold' : '' }}">
                <i class="fas fa-history mr-2"></i> Activity Log
            </a>
        </nav>

        {{-- Logout --}}
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="w-full bg-red-500 hover:bg-red-300 px-4 py-2 rounded text-white text-center mt-4">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </aside>