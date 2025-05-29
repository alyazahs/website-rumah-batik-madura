<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .gradient-bg {
            background: linear-gradient(to bottom right, #1e3a52, #3d6e65) !important;
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
            font-weight: bold;

        }
    </style>
</head>

<body class="flex h-screen bg-gray-100">
<aside class="w-80 gradient-bg batik-pattern text-white flex flex-col shadow-2xl relative overflow-hidden" x-data>
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full translate-y-12 -translate-x-12"></div>

    <!-- Logo / Brand -->
    <div class="p-6 pb-4">
        <div class="flex items-center space-x-3 mb-2">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-store text-xl text-white"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Batik <span class="text-yellow-400">Madura</span></h1>
                <p class="text-xs text-blue-200">Admin Dashboard</p>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="px-6 pb-6">
        <div class="glass-effect rounded-2xl p-4 text-center">
            <div class="relative inline-block mb-3">
                <img src="{{ Auth::user()->path ? asset('storage/profile/' . Auth::user()->path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                    alt="Profile"
                    class="w-16 h-16 rounded-full mb-2 object-cover">
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 rounded-full border-2 border-white"></div>
            </div>
            <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
            <p class="text-sm text-blue-200">{{ Auth::user()->level }}</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
       <a href="{{ route('admin.dashboard') }}"
   class="nav-item w-full flex items-center px-4 py-3 rounded-xl text-sm font-medium text-white transition-all duration-300 ease-in-out hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}">
   <i class="fas fa-home w-5 mr-3"></i>
   Dashboard
</a>

        <!-- Profile Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('profile.*') ? 'true' : 'false' }} }" class="relative">
            <button @click="open = !open"
                class="nav-item w-full flex justify-between items-center px-4 py-3 rounded-xl text-sm font-medium hover:bg-white hover:bg-opacity-10"
                :class="{ 'bg-white bg-opacity-10': open }">
                <span>
                    <i class="fas fa-user w-5 mr-3"></i>
                    Profile
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs transition-transform"></i>
            </button>
            <div x-show="open" x-transition x-cloak class="mt-2 ml-8 space-y-1">
                <a href="{{ route('profile.edit') }}"
                    class="nav-item block px-4 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('profile.edit') ? 'active-nav' : '' }}">
                    <i class="fas fa-user-edit w-4 mr-2 text-cyan-300"></i>
                    My Profile
                </a>
                <a href="{{ route('profile.password') }}"
                    class="nav-item block px-4 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('profile.password') ? 'active-nav' : '' }}">
                    <i class="fas fa-key w-4 mr-2 text-cyan-300"></i>
                    Change Password
                </a>
            </div>
        </div>

        <!-- Master Data Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('product.*') || request()->routeIs('user.*') || request()->routeIs('category.*') ? 'true' : 'false' }} }" class="relative">
            <button @click="open = !open"
                class="nav-item w-full flex justify-between items-center px-4 py-3 rounded-xl text-sm font-medium hover:bg-white hover:bg-opacity-10"
                :class="{ 'bg-white bg-opacity-10': open }">
                <span>
                    <i class="fas fa-database w-5 mr-3"></i>
                    Master Data
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs transition-transform"></i>
            </button>
            <div x-show="open" x-transition x-cloak class="mt-2 ml-8 space-y-1">
                <a href="{{ route('product.index') }}"
                    class="nav-item block px-4 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('product.*') ? 'active-nav' : '' }}">
                    <i class="fas fa-tshirt w-4 mr-2 text-cyan-300"></i>
                    Manage Products
                </a>
                <a href="{{ route('category.index') }}"
                    class="nav-item block px-4 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('category.*') ? 'active-nav' : '' }}">
                    <i class="fas fa-tags w-4 mr-2 text-cyan-300"></i>
                    Manage Categories
                </a>
                @if(Auth::user()->level === 'SuperAdmin')
                <a href="{{ route('user.index') }}"
                    class="nav-item block px-4 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('user.*') ? 'active-nav' : '' }}">
                    <i class="fas fa-users w-4 mr-2 text-cyan-300"></i>
                    Manage Users
                </a>
                @endif
            </div>
        </div>

        <!-- Activity Log -->
        @if(Auth::user()->level === 'SuperAdmin')
        <a href="{{ route('admin.logs') }}"
            class="nav-item block px-4 py-3 rounded-xl text-sm font-medium hover:bg-white hover:bg-opacity-10 {{ request()->routeIs('admin.logs') ? 'active-nav' : '' }}">
            <i class="fas fa-history w-5 mr-3"></i>
            Activity Log
        </a>
        @endif
    </nav>

    <!-- Logout -->
    <div class="p-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 px-4 py-3 rounded-xl text-white text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
