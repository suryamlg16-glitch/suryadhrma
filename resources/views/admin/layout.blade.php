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
            box-shadow: 0 2px 8px rgba(176, 137, 104, 0.3);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Premium - FLEX COLUMN agar logout di bawah -->
        <aside class="w-56 bg-gradient-to-b from-[#B08968] to-[#8B6F4F] text-white flex-shrink-0 shadow-lg flex flex-col">
            <!-- Logo Area -->
            <div class="p-4 border-b border-white/20">
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                        <span class="text-lg font-bold">541</span>
                    </div>
                    <div>
                        <h1 class="text-base font-bold tracking-wide">Admin Panel</h1>
                        <p class="text-[10px] text-white/70">541 Furniture</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation - FLEX GROW agar menu mendorong logout ke bawah -->
            <nav class="flex-1 mt-4 px-3">
                <div class="mb-4">
                    <p class="text-[10px] uppercase tracking-wider text-white/50 px-3 mb-2">Menu Utama</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-item flex items-center gap-2 px-3 py-2 rounded-lg mb-1.5 transition-all duration-300 text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-tachometer-alt w-4 text-sm"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <!-- Kelola Produk -->
                    <a href="{{ route('admin.produk.index') }}" 
                       class="nav-item flex items-center gap-2 px-3 py-2 rounded-lg mb-1.5 transition-all duration-300 text-sm {{ request()->routeIs('admin.produk.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-box w-4 text-sm"></i>
                        <span class="font-medium">Kelola Produk</span>
                    </a>
                    
                    <!-- Kelola Pesanan -->
                    <a href="{{ route('admin.pesanan.index') }}" 
                       class="nav-item flex items-center gap-2 px-3 py-2 rounded-lg mb-1.5 transition-all duration-300 text-sm {{ request()->routeIs('admin.pesanan.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-shopping-cart w-4 text-sm"></i>
                        <span class="font-medium">Kelola Pesanan</span>
                    </a>
                    
                    <!-- Kelola Transaksi -->
                    <a href="{{ route('admin.transaksi.index') }}" 
                       class="nav-item flex items-center gap-2 px-3 py-2 rounded-lg mb-1.5 transition-all duration-300 text-sm {{ request()->routeIs('admin.transaksi.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-credit-card w-4 text-sm"></i>
                        <span class="font-medium">Kelola Transaksi</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Info & Logout - Sekarang di bawah (tidak absolute) -->
            <div class="p-4 border-t border-white/20 mt-auto">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-white/70 truncate">{{ Auth::user()->email ?? 'admin@mebel.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white py-2 rounded-lg transition-all duration-300 text-sm">
                        <i class="fas fa-sign-out-alt text-sm"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto flex flex-col">
            <!-- Top Header -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="px-5 py-3 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
                        <p class="text-xs text-gray-500 mt-0.5">@yield('subheader', 'Selamat datang kembali')</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-400 hover:text-[#B08968] cursor-pointer transition text-sm"></i>
                            <span class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-semibold shadow-md text-sm">
                                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="flex-1 p-5">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-3">
                <div class="px-5 text-center">
                    <p class="text-[10px] text-gray-400">Desain • Kualitas • Kenyamanan</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">© 2026 541 FURNITURE - All Rights Reserved</p>
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
            width: 2px;
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