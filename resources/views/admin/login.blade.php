<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - 541 Furniture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8f5f2 0%, #ede5dd 100%);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            25% { transform: translateY(-15px) translateX(10px); }
            50% { transform: translateY(0px) translateX(20px); }
            75% { transform: translateY(15px) translateX(10px); }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.2; transform: scale(1.05); }
        }
        
        @keyframes shine {
            0% { left: -100%; }
            100% { left: 200%; }
        }
        
        .animate-float {
            animation: float 8s ease-in-out infinite;
        }
        
        .animate-float-delayed {
            animation: float 10s ease-in-out infinite reverse;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }
        
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        
        .btn-shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-shine:hover::after {
            left: 100%;
        }
        
        input:focus {
            outline: none !important;
        }
        
        .input-field {
            transition: all 0.2s ease;
        }
        
        .input-field:focus {
            border-color: #B08968;
            box-shadow: 0 0 0 3px rgba(176, 137, 104, 0.1);
        }
        
        .bg-pattern {
            background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 bg-pattern opacity-40"></div>
    
    <!-- Floating Orbs -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-[#B08968]/15 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-[#8B6F4F]/15 rounded-full blur-3xl animate-float-delayed"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#B08968]/5 rounded-full blur-3xl animate-pulse-slow"></div>
    
    <div class="relative z-10 w-full max-w-sm">
        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            
            <!-- Header Section -->
            <div class="relative bg-gradient-to-r from-[#B08968] to-[#8B6F4F] px-5 py-6 text-center">
                <div class="relative z-10">
                    <div class="flex justify-center mb-3">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-2.5">
                            <img src="{{ asset('images/logomebel.png') }}" 
                                 alt="541 Furniture" 
                                 class="h-10 w-auto object-contain brightness-0 invert">
                        </div>
                    </div>
                    <h2 class="text-white text-lg font-bold tracking-tight">Welcome Back</h2>
                    <p class="text-white/80 text-xs mt-0.5">Login ke dashboard admin</p>
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="px-5 py-5">
                
                <!-- Error Messages -->
                @if(session('error') || $errors->any())
                <div class="mb-4 p-2.5 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-circle-exclamation text-red-500 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            @if(session('error'))
                                <p class="text-[11px] text-red-600">{{ session('error') }}</p>
                            @endif
                            @foreach($errors->all() as $error)
                                <p class="text-[11px] text-red-600">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                
                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   required 
                                   class="input-field w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:border-[#B08968] transition-all duration-200 bg-gray-50 focus:bg-white"
                                   placeholder="admin@541furniture.com">
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="password" 
                                   id="password"
                                   name="password" 
                                   required 
                                   class="input-field w-full pl-9 pr-10 py-2 text-sm border border-gray-200 rounded-lg focus:border-[#B08968] transition-all duration-200 bg-gray-50 focus:bg-white"
                                   placeholder="Masukkan password">
                            <button type="button" 
                                    id="togglePassword" 
                                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#B08968] transition-colors">
                                <i id="eyeIcon" class="fas fa-eye-slash text-xs"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Remember Me (tanpa Lupa Password) -->
                    <div class="flex items-center">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="checkbox" name="remember" id="remember" class="w-3 h-3 rounded border-gray-300 text-[#B08968] focus:ring-0">
                            <span class="text-[11px] text-gray-600">Ingat saya</span>
                        </label>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="btn-shine w-full bg-gradient-to-r from-[#B08968] to-[#8B6F4F] text-white py-2 rounded-lg font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-300">
                        <span class="flex items-center justify-center gap-2">
                            <i class="fas fa-arrow-right-to-bracket text-xs"></i>
                            MASUK KE DASHBOARD
                        </span>
                    </button>
                </form>
                
                <!-- Back to Website -->
                <div class="mt-4 text-center">
                    <a href="{{ route('beranda') }}" 
                       class="inline-flex items-center gap-1.5 text-[11px] text-gray-400 hover:text-[#B08968] transition-colors group">
                        <i class="fas fa-arrow-left text-[10px] group-hover:-translate-x-0.5 transition-transform"></i>
                        Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (togglePassword) {
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
        }
    </script>
</body>
</html>