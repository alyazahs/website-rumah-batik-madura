<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 via-gray-900 to-black">
    <div class="relative w-full max-w-md p-8 bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/30">
        <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-20 h-20 bg-white/20 rounded-full shadow-lg border border-white/40 flex items-center justify-center">
            <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>

        <h2 class="mt-12 mb-6 text-3xl font-bold text-center text-white drop-shadow-lg tracking-wide">
            Login Admin
        </h2>

        {{-- Menampilkan pesan status --}}
        @if (session('status'))
        <div class="p-3 mb-4 text-green-900 bg-green-200 border-l-4 border-green-500 rounded-md shadow-md">
            {{ session('status') }}
        </div>
        @endif

        @if (session('success'))
            <div class="p-3 mb-4 text-green-900 bg-green-200 border-l-4 border-green-500 rounded-md shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-3 mb-4 text-red-900 bg-red-200 border-l-4 border-red-500 rounded-md shadow-md">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="login" class="block text-sm font-medium text-white">Name or Email</label>
                <input type="text" name="login" id="login"
                    class="w-full px-4 py-2 mt-1 border border-white/30 bg-white/20 text-white placeholder-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm transition-all duration-200 ease-in-out hover:bg-white/30"
                    placeholder="admin@example.com atau username" value="{{ old('login') }}" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 mt-1 border border-white/30 bg-white/20 text-white placeholder-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm transition-all duration-200 ease-in-out hover:bg-white/30"
                    placeholder="••••••••" required>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-red-800 rounded-md hover:bg-red-900 transition duration-300 ease-in-out shadow-lg hover:shadow-red-400 transform hover:-translate-y-1 font-semibold">
                Login
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-300">
            Lupa password? <a href="{{ route('password.request') }}" class="text-red-400 font-medium hover:underline">Reset di sini</a>
        </p>
    </div>
</body>

</html>
