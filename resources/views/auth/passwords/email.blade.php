<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Batik Madura</title>
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

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Enhanced responsive breakpoints */
        @media (min-width: 768px) {
            .container-responsive {
                max-width: 420px;
            }
        }

        @media (min-width: 1024px) {
            .container-responsive {
                max-width: 480px;
            }
        }

        @media (min-width: 1280px) {
            .container-responsive {
                max-width: 520px;
            }
        }

        /* Better spacing for larger screens */
        @media (min-width: 1024px) {
            .desktop-spacing {
                padding: 2rem;
            }
            
            .desktop-container {
                min-height: 100vh;
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
        }

        @media (min-width: 1280px) {
            .desktop-spacing {
                padding: 2.5rem;
            }
            
            .desktop-container {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }
        }

        /* Ensure full viewport height is used properly */
        .full-height-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-batik-teal via-batik-dark to-black batik-pattern overflow-hidden">
    <!-- Enhanced Decorative Elements with better positioning for all screen sizes -->
    <div class="absolute top-5 sm:top-10 lg:top-16 xl:top-20 left-5 sm:left-10 lg:left-16 xl:left-20 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 xl:w-40 xl:h-40 bg-batik-orange opacity-20 rounded-full blur-xl floating-animation"></div>
    <div class="absolute bottom-10 sm:bottom-20 lg:bottom-24 xl:bottom-32 right-10 sm:right-20 lg:right-24 xl:right-32 w-24 h-24 sm:w-32 sm:h-32 lg:w-40 lg:h-40 xl:w-48 xl:h-48 bg-batik-orange opacity-10 rounded-full blur-2xl floating-animation" style="animation-delay: -3s;"></div>
    <div class="absolute top-1/2 right-5 sm:right-10 lg:right-16 xl:right-20 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 bg-white opacity-10 rounded-full blur-lg floating-animation" style="animation-delay: -1.5s;"></div>

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8 xl:p-12">
        <div class="relative w-full max-w-md lg:max-w-lg xl:max-w-xl mx-auto container-responsive">
            <!-- Enhanced Back Button with better desktop styling -->
            <div class="absolute -top-12 sm:-top-16 lg:-top-20 xl:-top-24 left-0 right-0 sm:right-auto">
                <a href="#" onclick="history.back()" class="flex items-center justify-center sm:justify-start text-white/70 hover:text-white transition-colors duration-200 group">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span class="text-sm sm:text-base lg:text-lg">Kembali ke Login</span>
                </a>
            </div>

            <!-- Enhanced Brand Logo/Header with better desktop scaling -->
            <div class="text-center mb-6 sm:mb-8 lg:mb-12 floating-animation">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl lg:rounded-3xl shadow-2xl mb-3 sm:mb-4 lg:mb-6" style="box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold text-white mb-2 lg:mb-3">
                    Batik <span class="text-batik-orange">Madura</span>
                </h1>
                <p class="text-gray-300 text-xs sm:text-sm lg:text-base xl:text-lg">Reset Password</p>
            </div>

            <!-- Enhanced Forgot Password Form Card -->
            <div class="glass-effect rounded-2xl sm:rounded-3xl lg:rounded-3xl shadow-2xl p-6 sm:p-8 desktop-spacing relative">
                <!-- Enhanced decorative top element -->
                <div class="absolute -top-3 sm:-top-4 lg:-top-5 left-1/2 transform -translate-x-1/2 w-12 h-6 sm:w-16 sm:h-8 lg:w-20 lg:h-10 bg-gradient-to-r from-red-500 to-pink-500 rounded-full"></div>
                
                <div class="text-center mb-4 sm:mb-6 lg:mb-8 mt-3 sm:mt-4 lg:mt-5">
                    <h2 class="text-xl sm:text-2xl lg:text-2xl xl:text-3xl font-bold text-white mb-2 sm:mb-3 lg:mb-4">
                        Lupa Password?
                    </h2>
                    <p class="text-gray-300 text-xs sm:text-sm lg:text-base leading-relaxed px-2 sm:px-0 lg:px-2">
                        Jangan khawatir! Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
                    </p>
                </div>

                <!-- Enhanced Status Messages -->
                <div id="statusMessage" class="hidden p-4 lg:p-5 mb-6 lg:mb-8 rounded-xl lg:rounded-2xl border-l-4 shadow-lg">
                    <div class="flex items-center">
                        <svg id="statusIcon" class="w-5 h-5 lg:w-6 lg:h-6 mr-3 lg:mr-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span id="statusText" class="text-sm lg:text-base"></span>
                    </div>
                </div>

                <form id="forgotPasswordForm" class="space-y-4 sm:space-y-5 lg:space-y-6">
                    <!-- Enhanced Email Field -->
                    <div class="space-y-2 lg:space-y-3">
                        <label for="email" class="block text-sm lg:text-base xl:text-lg font-semibold text-white">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 lg:pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input type="email" 
                                   id="email" 
                                   name="email"
                                   class="w-full pl-9 sm:pl-10 lg:pl-12 xl:pl-14 pr-4 lg:pr-5 py-2.5 sm:py-3 lg:py-4 text-sm sm:text-base lg:text-lg bg-white/10 border border-white/30 text-white placeholder-gray-300 rounded-lg sm:rounded-xl lg:rounded-2xl focus:outline-none focus:border-red-400 transition-all duration-300 input-glow backdrop-blur-sm"
                                   placeholder="admin@example.com"
                                   required
                                   autofocus>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-400 mt-1 lg:mt-2 px-1">
                            Pastikan email yang Anda masukkan adalah email yang terdaftar
                        </p>
                    </div>

                    <!-- Enhanced Send Reset Link Button -->
                    <button type="submit" 
                            id="submitBtn"
                            class="w-full py-2.5 sm:py-3 lg:py-4 xl:py-5 px-4 lg:px-6 text-sm sm:text-base lg:text-lg xl:text-xl bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hover:from-pink-500 hover:to-red-500"
                            style="box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);">
                        <span class="flex items-center justify-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 mr-2 lg:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span class="hidden sm:inline lg:text-lg xl:text-xl">Kirim Link Reset Password</span>
                            <span class="sm:hidden">Kirim Link Reset</span>
                        </span>
                    </button>
                </form>

                <!-- Enhanced Additional Info -->
                <div class="mt-4 sm:mt-6 lg:mt-8 text-center space-y-3 sm:space-y-4">
                    <div class="flex items-center justify-center">
                        <div class="border-t border-white/20 flex-grow"></div>
                        <span class="px-3 sm:px-4 lg:px-5 text-gray-400 text-xs sm:text-sm lg:text-base">atau</span>
                        <div class="border-t border-white/20 flex-grow"></div>
                    </div>
                    
                    <p class="text-gray-400 text-xs sm:text-sm lg:text-base px-2 sm:px-0">
                        Sudah ingat password Anda?
                        <a href="#" onclick="history.back()" class="text-batik-orange hover:text-yellow-400 transition-colors duration-200 font-medium ml-1 block sm:inline mt-1 sm:mt-0">
                            Kembali ke Login
                        </a>
                    </p>
                </div>

                <!-- Enhanced Help Section -->
                <div class="mt-4 sm:mt-6 lg:mt-8 p-3 sm:p-4 lg:p-5 bg-white/5 rounded-lg sm:rounded-xl lg:rounded-2xl border border-white/10">
                    <div class="flex items-start space-x-3 lg:space-x-4">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-5 lg:h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h4 class="text-white font-medium text-xs sm:text-sm lg:text-base mb-1">Bantuan Reset Password</h4>
                            <p class="text-gray-400 text-xs lg:text-sm leading-relaxed">
                                Jika Anda tidak menerima email dalam 5 menit, periksa folder spam atau hubungi administrator sistem.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Footer -->
                <div class="mt-3 sm:mt-4 lg:mt-6 text-center">
                    <div class="flex items-center justify-center space-x-3 sm:space-x-4 lg:space-x-6 text-xs lg:text-sm text-gray-500">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 mr-1 lg:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs lg:text-sm">Proses Aman</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 mr-1 lg:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs lg:text-sm">Reset Cepat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form Submission
        document.getElementById('forgotPasswordForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const statusMessage = document.getElementById('statusMessage');
            const statusText = document.getElementById('statusText');
            const statusIcon = document.getElementById('statusIcon');
            const submitBtn = document.getElementById('submitBtn');
            
            // Validate email
            if (!email || !isValidEmail(email)) {
                showMessage('error', 'Masukkan alamat email yang valid');
                return;
            }
            
            // Show loading state
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
                <span class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengirim link reset...
                </span>
            `;
            submitBtn.disabled = true;
            
            // Simulate sending reset link
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                showMessage('success', `Link reset password telah dikirim ke ${email}. Silakan cek inbox atau folder spam Anda.`);
                
                // Optional: Clear form
                document.getElementById('email').value = '';
            }, 2000);
        });

        function showMessage(type, message) {
            const statusMessage = document.getElementById('statusMessage');
            const statusText = document.getElementById('statusText');
            const statusIcon = document.getElementById('statusIcon');
            
            if (type === 'success') {
                statusMessage.className = 'p-4 lg:p-5 mb-6 lg:mb-8 rounded-xl lg:rounded-2xl border-l-4 shadow-lg bg-green-500/20 border-green-500 text-green-100';
                statusIcon.innerHTML = `
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                `;
            } else {
                statusMessage.className = 'p-4 lg:p-5 mb-6 lg:mb-8 rounded-xl lg:rounded-2xl border-l-4 shadow-lg bg-red-500/20 border-red-500 text-red-100';
                statusIcon.innerHTML = `
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                `;
            }
            
            statusText.textContent = message;
            statusMessage.classList.remove('hidden');
            
            // Auto hide after 5 seconds for success messages
            if (type === 'success') {
                setTimeout(() => {
                    statusMessage.classList.add('hidden');
                }, 5000);
            }
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Add focus animation to email input
        document.getElementById('email').addEventListener('focus', (e) => {
            e.target.parentElement.style.transform = 'scale(1.02)';
        });
        
        document.getElementById('email').addEventListener('blur', (e) => {
            e.target.parentElement.style.transform = 'scale(1)';
        });

        // Real-time email validation
        document.getElementById('email').addEventListener('input', (e) => {
            const email = e.target.value;
            const statusMessage = document.getElementById('statusMessage');
            
            if (email && !isValidEmail(email)) {
                e.target.style.borderColor = '#ef4444';
            } else {
                e.target.style.borderColor = '';
            }
            
            // Hide status message when user starts typing
            if (!statusMessage.classList.contains('hidden')) {
                statusMessage.classList.add('hidden');
            }
        });
    </script>
</body>
</html>