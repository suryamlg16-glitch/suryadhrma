<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - 541 Furniture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .bg-pattern {
            background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        
        input:focus {
            outline: none !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#B08968]/10 via-white to-[#8B6F4F]/10 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 bg-pattern opacity-30"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-[#B08968]/20 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#8B6F4F]/20 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    
    <div class="relative z-10 w-full max-w-md transform transition-all duration-500 hover:scale-[1.02]">
        <!-- Card Utama -->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-[#B08968]/20">
            <!-- Logo Area -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="relative">
                        <img src="{{ asset('images/logomebel.png') }}" 
                             alt="Logo Mebel" 
                             class="h-12 w-auto object-contain drop-shadow-lg transform transition-transform duration-300 hover:scale-105">
                        <div class="absolute inset-0 bg-white/20 rounded-full blur-xl -z-10"></div>
                    </div>
                    <div class="w-px h-8 bg-gray-300"></div>
                    <span class="text-2xl font-bold text-[#B08968]">541 Furniture</span>
                </div>
                <p class="text-sm text-gray-500">Administrator Panel</p>
                <div class="w-16 h-0.5 bg-[#B08968] mx-auto mt-3 rounded-full"></div>
            </div>
            
            <h2 class="text-xl font-semibold text-center mb-6 text-gray-700">Selamat Datang Kembali</h2>
            
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm">{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
                    @foreach($errors->all() as $error)
                        <div class="flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                @csrf
                
                <!-- Email Field -->
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-[#B08968]"></i>
                        </div>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               class="w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-0 focus:border-[#B08968] transition-all duration-200 bg-gray-50 focus:bg-white"
                               placeholder="admin@mebel.com">
                    </div>
                </div>
                
                <!-- Password Field dengan Toggle -->
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-[#B08968]"></i>
                        </div>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required 
                               class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-0 focus:border-[#B08968] transition-all duration-200 bg-gray-50 focus:bg-white"
                               placeholder="Masukkan password">
                        <button type="button" 
                                id="togglePassword" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#B08968] transition-colors duration-200">
                            <i id="eyeIcon" class="fas fa-eye-slash text-lg"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Remember Me (tanpa Lupa Password) -->
                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-[#B08968] rounded border-gray-300 focus:ring-0 focus:ring-offset-0 focus:border-[#B08968]">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-[#B08968] text-white py-3 px-4 rounded-xl hover:bg-[#8B6F4F] focus:outline-none focus:ring-0 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <span class="flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        MASUK KE DASHBOARD
                    </span>
                </button>
            </form>
            
            <!-- Back to Website Link -->
            <div class="text-center mt-6 pt-4 border-t border-gray-100">
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#B08968] transition-colors duration-200">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Website
                </a>
            </div>
        </div>
        
        <!-- Footer dengan Tagline Brand -->
        <div class="text-center mt-6">
            <p class="text-xs text-gray-400">Desain • Kualitas • Kenyamanan</p>
            <p class="text-xs text-gray-400 mt-1">© 2026 541 FURNITURE - All Rights Reserved</p>
        </div>
    </div>
    
    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>
</html>