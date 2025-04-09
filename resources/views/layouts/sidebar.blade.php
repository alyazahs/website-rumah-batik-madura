<aside class="w-64 bg-indigo-800 text-white flex flex-col p-4 min-h-screen">
    <div class="flex flex-col items-center mb-6">
        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile" class="w-16 h-16 rounded-full mb-2">
        <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
        <p class="text-sm text-green-300">{{ Auth::user()->level }}</p>
    </div>

    <nav class="space-y-2 text-sm">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded">
            <i class="fas fa-home mr-2"></i> Dashboard
        </a>

        {{-- Profile Dropdown --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 hover:bg-indigo-600 rounded">
                <span><i class="fas fa-user mr-2"></i> Profile</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div x-show="open" class="mt-1 ml-4 space-y-1" x-cloak>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-1 hover:bg-indigo-600 rounded">Manage Profile</a>
                <a href="{{ route('profile.password') }}" class="block px-4 py-1 hover:bg-indigo-600 rounded">Change Password</a>
            </div>
        </div>

        {{-- Master Data Dropdown --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 hover:bg-indigo-600 rounded">
                <span><i class="fas fa-database mr-2"></i> Master Data</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div x-show="open" class="mt-1 ml-4 space-y-1" x-cloak>
                <a href="{{ route('product.index') }}" class="block px-4 py-1 hover:bg-indigo-600 rounded">Manage Products</a>
                <a href="{{ route('user.index') }}" class="block px-4 py-1 hover:bg-indigo-600 rounded">Manage Users</a>
                <a href="{{ route('category.index') }}" class="block px-4 py-1 hover:bg-indigo-600 rounded">Manage Categories</a>
            </div>
        </div>

        <a href="{{ route('admin.logs') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded">
            <i class="fas fa-history mr-2"></i> Activity Log
        </a>
    </nav>

    {{-- Logout --}}
    <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white text-center mt-4">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </button>
    </form>
</aside>
