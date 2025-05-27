<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Batik Madura</title>
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
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(255, 149, 0, 0.3);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-batik-teal via-batik-dark to-black batik-pattern overflow-hidden">
    <!-- Animasi Background -->
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
                <h1 class="text-3xl font-bold text-white mb-2">Reset <span class="text-batik-orange">Password</span></h1>
                <p class="text-gray-300 text-sm">Masukkan password baru untuk akun Anda</p>
            </div>

            <div class="glass-effect rounded-3xl shadow-2xl p-8 relative">
                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label for="email" class="block text-sm font-semibold text-white">Email</label>
                        <input type="email" name="email" value="{{ old('email', $email) }}"
                               class="mt-1 w-full px-4 py-2 rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-batik-orange input-glow"
                               required autofocus placeholder="email@example.com">
                        @error('email')
                            <div class="text-red-400 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-white">Password Baru</label>
                        <input type="password" name="password"
                               class="mt-1 w-full px-4 py-2 rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-batik-orange input-glow"
                               required placeholder="••••••••">
                        @error('password')
                            <div class="text-red-400 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-white">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                               class="mt-1 w-full px-4 py-2 rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-batik-orange input-glow"
                               required placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full py-2 px-4 bg-batik-orange text-white font-semibold rounded-md shadow-lg hover:bg-orange-600 transition duration-300">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
