<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #0f766e 100%) !important;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3Ccircle cx='15' cy='15' r='2'/%3E%3Ccircle cx='45' cy='15' r='2'/%3E%3Ccircle cx='15' cy='45' r='2'/%3E%3Ccircle cx='45' cy='45' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .nav-item {
            transition: all 0.3s ease;
        }
        .nav-item:hover {
            transform: translateX(4px);
        }
        .active-nav {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #fbbf24;
        }
    </style>
</head>

<body class="flex h-screen bg-gray-100">
    <aside class="w-80 gradient-bg batik-pattern text-white flex flex-col shadow-2xl relative overflow-hidden" x-data>
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -translate-y-16 translate-x-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full translate-y-12 -translate-x-12"></div>
        
        {{-- Logo / Brand --}}
        <div class="p-6 pb-4">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-store text-xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Batik <span class="text-yellow-300">Madura</span></h1>
                    <p class="text-xs text-orange-200">Admin Dashboard</p>
                </div>
            </div>
        </div>

        {{-- Profile Section --}}
        <div class="px-6 pb-6">
            <div class="glass-effect rounded-2xl p-4 text-center">
                <div class="relative inline-block mb-3">
                    <img src="{{ Auth::user()->path ? asset('storage/profile/' . Auth::user()->path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=f97316&color=fff' }}"
                        alt="Profile"
                        class="w-16 h-16 rounded-full border-3 border-white border-opacity-30 object-cover">
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 rounded-full border-2 border-white"></div>
                </div>
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-orange-200">{{ Auth::user()->level }}</p>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'active-nav' : 'hover:bg-orange-100 hover:bg-opacity-10 text-black' }}">
                <i class="fas fa-home w-5 mr-3"></i>
                Dashboard
            </a>

            {{-- Profile Dropdown --}}
            <div x-data="{ open: {{ request()->routeIs('profile.*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="nav-item w-full flex justify-between items-center px-4 py-3 rounded-xl text-sm font-medium hover:bg-white hover:bg-opacity-10 text-black"
                    :class="{ 'bg-white bg-opacity-10': open }">
                    <span>
                        <i class="fas fa-user w-5 mr-3"></i>
                        Profile
                    </span>
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                       class="text-xs transition-transform"></i>
                </button>
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     x-cloak class="mt-2 ml-8 space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-item block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('profile.edit') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                        <i class="fas fa-user-edit w-4 mr-2 text-orange-300"></i>
                        My Profile
                    </a>
                    <a href="{{ route('profile.password') }}"
                        class="nav-item block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('profile.password') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                        <i class="fas fa-key w-4 mr-2 text-orange-300"></i>
                        Change Password
                    </a>
                </div>
            </div>

            {{-- Master Data Dropdown --}}
            <div x-data="{ open: {{ request()->routeIs('product.*') || request()->routeIs('user.*') || request()->routeIs('category.*') ? 'true' : 'false' }} }" class="relative">
                <button @click="open = !open"
                    class="nav-item w-full flex justify-between items-center px-4 py-3 rounded-xl text-sm font-medium hover:bg-white hover:bg-opacity-10 text-black"
                    :class="{ 'bg-white bg-opacity-10': open }">
                    <span>
                        <i class="fas fa-database w-5 mr-3"></i>
                        Master Data
                    </span>
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                       class="text-xs transition-transform"></i>
                </button>
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     x-cloak class="mt-2 ml-8 space-y-1">
                    <a href="{{ route('product.index') }}"
                        class="nav-item block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('product.*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                        <i class="fas fa-tshirt w-4 mr-2 text-orange-300"></i>
                        Manage Products
                    </a>
                    <a href="{{ route('category.index') }}"
                        class="nav-item block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('category.*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                        <i class="fas fa-tags w-4 mr-2 text-orange-300"></i>
                        Manage Categories
                    </a>
                    @if(Auth::user()->level === 'SuperAdmin')
                    <a href="{{ route('user.index') }}"
                        class="nav-item block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('user.*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                        <i class="fas fa-users w-4 mr-2 text-orange-300"></i>
                        Manage Users
                    </a>
                    @endif
                </div>
            </div>

            {{-- Activity Log hanya untuk SuperAdmin --}}
            @if(Auth::user()->level === 'SuperAdmin')
            <a href="{{ route('admin.logs') }}"
                class="nav-item block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('admin.logs') ? 'active-nav' : 'hover:bg-white hover:bg-opacity-10 text-black' }}">
                <i class="fas fa-history w-5 mr-3"></i>
                Activity Log
            </a>
            @endif
        </nav>

        {{-- Logout --}}
        <div class="p-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 px-4 py-3 rounded-xl text-white text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>