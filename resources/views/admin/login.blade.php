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
                <label for="login" class="block text-sm font-medium text-white">Username/Email</label>
                <div class="relative">
                    <input type="text" name="login" id="login"
                        class="w-full px-4 py-2 mt-1 border border-white/30 bg-white/20 text-white placeholder-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm transition-all duration-200 ease-in-out hover:bg-white/30"
                        placeholder="admin or admin@exmaple.com" value="{{ old('login') }}" required>
                    <span class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4" />
                        </svg>
                    </span>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 mt-1 border border-white/30 bg-white/20 text-white placeholder-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm transition-all duration-200 ease-in-out hover:bg-white/30"
                        placeholder="••••••••" required>
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-300">
                        <svg id="eyeIcon" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.732 2.057-1.342 3.002M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                    </button>
                </div>
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

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            eyeIcon.innerHTML = type === 'password'
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.732 2.057-1.342 3.002M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0 1 12 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 0 1 1.125-2.825M9.75 9.75a3 3 0 0 1 4.5 4.5m-4.5-4.5L4.5 4.5m15 15-5.25-5.25" />`;
        });
    </script>
</body>

</html>
