<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Batik Madura</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'batik-orange': '#FF9500',
                        'batik-teal': '#4A5568',
                        'batik-dark': '#2D3748'
                    }
                }
            }
        }
    </script>
    <style>
        .batik-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255, 149, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(74, 85, 104, 0.1) 0%, transparent 50%);
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .glow-effect {
            box-shadow: 0 0 30px rgba(255, 149, 0, 0.3);
        }
        
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(255, 149, 0, 0.3);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-batik-teal via-batik-dark to-black batik-pattern overflow-hidden">
    <div class="absolute top-10 left-10 w-32 h-32 bg-batik-orange opacity-20 rounded-full blur-xl floating-animation"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-batik-orange opacity-10 rounded-full blur-2xl floating-animation" style="animation-delay: -3s;"></div>
    <div class="absolute top-1/2 left-20 w-24 h-24 bg-white opacity-10 rounded-full blur-lg floating-animation" style="animation-delay: -1.5s;"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-md">
            <div class="text-center mb-8 floating-animation">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-batik-orange to-yellow-500 rounded-2xl shadow-2xl glow-effect mb-4">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">
                    Batik <span class="text-batik-orange">Madura</span>
                </h1>
                <p class="text-gray-300 text-sm">Admin Login Portal</p>
            </div>

            <div class="glass-effect rounded-3xl shadow-2xl p-8 relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-16 h-8 bg-gradient-to-r from-batik-orange to-yellow-500 rounded-full"></div>
                
                <h2 class="text-2xl font-bold text-center text-white mb-8 mt-4">
                    Selamat Datang Kembali
                </h2>

                <!-- Status Messages Laravel style -->
                @if (session('status'))
                    <div class="p-4 mb-4 text-green-900 bg-green-200 border-l-4 border-green-500 rounded-xl shadow">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="p-4 mb-4 text-green-900 bg-green-200 border-l-4 border-green-500 rounded-xl shadow">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="p-4 mb-4 text-red-900 bg-red-200 border-l-4 border-red-500 rounded-xl shadow">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="login" class="block text-sm font-semibold text-white">Username atau Email</label>
                        <input id="login" name="login" type="text" value="{{ old('login') }}" required
                               class="mt-1 w-full px-4 py-2 rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-batik-orange input-glow"
                               placeholder="admin atau admin@example.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-white">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                   class="mt-1 w-full px-4 py-2 rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-batik-orange input-glow"
                                   placeholder="••••••••">
                            <button type="button" id="togglePassword" class="absolute right-3 top-2.5 text-gray-300">
                                <svg id="eyeIcon" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.732 2.057-1.342 3.002" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-batik-orange text-white font-semibold rounded-md shadow-lg hover:bg-orange-600 transition duration-300">
                        Login
                    </button>
                </form>

                <p class="mt-6 text-sm text-center text-gray-300">
                    Lupa password? <a href="{{ route('password.request') }}" class="text-batik-orange hover:underline">Reset di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    </script>
</body>
</html>
