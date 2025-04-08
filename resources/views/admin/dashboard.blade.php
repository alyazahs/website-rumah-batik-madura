<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- atau sesuaikan dengan setup Tailwind kamu --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-800 text-white flex flex-col p-4">
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <p class="text-sm text-green-300">Online</p>
        </div>
        <nav class="space-y-2">
            <a href="{{ route('product.index') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-box mr-2"></i> product</a>
            <a href="{{ route('category.index') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-tags mr-2"></i> category</a>
            <a href="{{ route('user.index') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-users-cog mr-2"></i> Admin</a>
            <a href="{{ route('admin.logs') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-history mr-2"></i> Log</a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-user-edit mr-2"></i> profile</a>
            <a href="{{ route('profile.password') }}" class="block px-4 py-2 hover:bg-indigo-600 rounded"><i class="fas fa-key mr-2"></i> Password</a>
        </nav>
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="w-full mt-4 bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white text-center">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>
</body>
</html>
