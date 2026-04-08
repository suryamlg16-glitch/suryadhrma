<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-transition {
            transition: all 0.3s ease;
        }
        .nav-item-active {
            background: linear-gradient(135deg, #B08968 0%, #8B6F4F 100%);
            box-shadow: 0 4px 12px rgba(176, 137, 104, 0.3);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Premium -->
        <aside class="w-64 bg-gradient-to-b from-[#B08968] to-[#8B6F4F] text-white flex-shrink-0 shadow-xl">
            <!-- Logo Area -->
            <div class="p-6 border-b border-white/20">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <span class="text-xl font-bold">541</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-wide">Admin Panel</h1>
                        <p class="text-xs text-white/70">541 Furniture</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <div class="mb-6">
                    <p class="text-xs uppercase tracking-wider text-white/50 px-3 mb-3">Menu Utama</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl mb-2 transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <!-- Kelola Produk -->
                    <a href="{{ route('admin.produk.index') }}" 
                       class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl mb-2 transition-all duration-300 {{ request()->routeIs('admin.produk.*') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <i class="fas fa-box w-5"></i>
                        <span class="font-medium">Kelola Produk</span>
                    </a>
                    
                    <!-- Kelola Pesanan -->
                    <a href="{{ route('admin.pesanan.index') }}" 
                       class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl mb-2 transition-all duration-300 {{ request()->routeIs('admin.pesanan.*') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <i class="fas fa-shopping-cart w-5"></i>
                        <span class="font-medium">Kelola Pesanan</span>
                    </a>
                    
                    <!-- Kelola Transaksi -->
                    <a href="{{ route('admin.transaksi.index') }}" 
                       class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl mb-2 transition-all duration-300 {{ request()->routeIs('admin.transaksi.*') ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                        <i class="fas fa-credit-card w-5"></i>
                        <span class="font-medium">Kelola Transaksi</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Info & Logout -->
            <div class="absolute bottom-0 w-64 p-6 border-t border-white/20">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-white/70">{{ Auth::user()->email ?? 'admin@mebel.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white py-2.5 rounded-xl transition-all duration-300">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Header -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
                        <p class="text-sm text-gray-500 mt-1">@yield('subheader', 'Selamat datang kembali')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-400 hover:text-[#B08968] cursor-pointer transition"></i>
                            <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4 mt-8">
                <div class="px-6 text-center">
                    <p class="text-xs text-gray-400">Desain • Kualitas • Kenyamanan</p>
                    <p class="text-xs text-gray-400 mt-1">© 2026 541 FURNITURE - All Rights Reserved</p>
                </div>
            </footer>
        </main>
    </div>
    
    <style>
        .nav-item {
            position: relative;
            overflow: hidden;
        }
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: white;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        .nav-item:hover::before {
            transform: scaleY(1);
        }
        .nav-item-active::before {
            transform: scaleY(1);
        }
    </style>
</body>
</html>