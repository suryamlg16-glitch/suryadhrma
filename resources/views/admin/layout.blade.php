<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Sidebar Navigation */
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
            border-radius: 0 2px 2px 0;
        }
        .nav-item:hover::before {
            transform: scaleY(1);
        }
        .nav-item-active::before {
            transform: scaleY(1);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #B08968;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #8B6F4F;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-gradient-to-b from-[#B08968] to-[#8B6F4F] text-white flex-shrink-0 shadow-xl flex flex-col">
            
            <!-- Logo Area -->
            <div class="p-5 border-b border-white/20">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logomebel.png') }}" 
                         alt="Logo 541 Furniture" 
                         class="w-10 h-10 object-contain brightness-0 invert">
                    <div>
                        <h1 class="text-lg font-bold tracking-wide">Admin Panel</h1>
                        <p class="text-[11px] text-white/70">541 Furniture</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="flex-1 mt-6 px-3">
                <div>
                    <p class="text-[11px] uppercase tracking-wider text-white/50 px-3 mb-3 font-semibold">Menu Utama</p>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-2 transition-all duration-300 text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-home w-4 text-base"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.produk.index') }}" 
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-2 transition-all duration-300 text-sm {{ request()->routeIs('admin.produk.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-box w-4 text-base"></i>
                        <span class="font-medium">Kelola Produk</span>
                    </a>
                    
                    <a href="{{ route('admin.pesanan.index') }}" 
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-2 transition-all duration-300 text-sm {{ request()->routeIs('admin.pesanan.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-shopping-cart w-4 text-base"></i>
                        <span class="font-medium">Kelola Pesanan</span>
                    </a>
                    
                    <a href="{{ route('admin.transaksi.index') }}" 
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-2 transition-all duration-300 text-sm {{ request()->routeIs('admin.transaksi.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-credit-card w-4 text-base"></i>
                        <span class="font-medium">Kelola Transaksi</span>
                    </a>
                    
                    {{-- ✅ Menu Laporan --}}
                    <a href="{{ route('admin.laporan.index') }}" 
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-2 transition-all duration-300 text-sm {{ request()->routeIs('admin.laporan.*') ? 'bg-white/20 shadow-md' : 'hover:bg-white/10' }}">
                        <i class="fas fa-chart-line w-4 text-base"></i>
                        <span class="font-medium">Laporan</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Info & Logout -->
            <div class="p-4 border-t border-white/20 mt-auto">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-white/70 truncate">{{ Auth::user()->email ?? 'admin@mebel.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white py-2.5 rounded-xl transition-all duration-300 text-sm font-medium">
                        <i class="fas fa-sign-out-alt text-sm"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto flex flex-col">
            
            <!-- Top Header -->
            <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-10 border-b border-gray-100">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h2>
                        <p class="text-xs text-gray-500 mt-1">@yield('subheader', 'Selamat datang kembali')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 bg-gradient-to-r from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content dengan Notifikasi Hilang Otomatis -->
            <div class="flex-1 p-6">
                @if(session('success'))
                    <div id="successAlert" class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-xl mb-6 text-sm shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div id="errorAlert" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 text-sm shadow-sm">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    
    <script>
        // Active nav item highlight
        document.querySelectorAll('.nav-item').forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add('bg-white/20', 'shadow-md');
            }
        });
        
        // Notifikasi hilang setelah 3 detik
        setTimeout(function() {
            let successAlert = document.getElementById('successAlert');
            let errorAlert = document.getElementById('errorAlert');
            
            if (successAlert) {
                successAlert.style.transition = 'opacity 0.5s';
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    if (successAlert) successAlert.remove();
                }, 500);
            }
            
            if (errorAlert) {
                errorAlert.style.transition = 'opacity 0.5s';
                errorAlert.style.opacity = '0';
                setTimeout(function() {
                    if (errorAlert) errorAlert.remove();
                }, 500);
            }
        }, 3000);
    </script>
    
    @stack('scripts')
</body>
</html>