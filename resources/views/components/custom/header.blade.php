@props([
    'logo' => null // nanti untuk gambar logo
])

<nav class="bg-[#B08968] shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24"> <!-- Tinggi navbar ditambah jadi 24 (96px) -->
            <!-- Logo dengan Filter Putih - DIPERBESAR -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('beranda') }}">
                    <img src="{{ asset('images/logomebel.png') }}" 
                         alt="Logo Mebel" 
                         class="h-20 w-auto object-contain brightness-0 invert"> <!-- h-20 -> h-24 (96px) -->
                </a>
            </div>
            
            <!-- Desktop Menu - Teks diperbesar -->
            <div class="hidden md:flex items-center space-x-2"> <!-- space-x-1 -> space-x-2 -->
                <a href="{{ route('beranda') }}" 
                   class="text-white hover:bg-[#8B6F4F] px-5 py-2.5 rounded-lg text-base font-medium transition duration-300 {{ request()->routeIs('beranda') ? 'bg-[#8B6F4F]' : '' }}">
                    BERANDA
                </a>
                <a href="{{ route('katalog') }}" 
                   class="text-white hover:bg-[#8B6F4F] px-5 py-2.5 rounded-lg text-base font-medium transition duration-300 {{ request()->routeIs('katalog') ? 'bg-[#8B6F4F]' : '' }}">
                    KATALOG PRODUK
                </a>
                <a href="#" 
                   class="text-white hover:bg-[#8B6F4F] px-5 py-2.5 rounded-lg text-base font-medium transition duration-300">
                    PROFIL PERUSAHAAN
                </a>
                <a href="#" 
                   class="text-white hover:bg-[#8B6F4F] px-5 py-2.5 rounded-lg text-base font-medium transition duration-300">
                    HUBUNGI KAMI
                </a>
            </div>
            
            <!-- Search Bar & Icons - Diperbesar -->
            <div class="hidden md:flex items-center space-x-5"> <!-- space-x-4 -> space-x-5 -->
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari produk..." 
                           class="bg-white/10 text-white placeholder-white/70 rounded-full pl-12 pr-5 py-3 w-72 focus:outline-none focus:ring-2 focus:ring-white/50 border border-white/20 text-base"> <!-- pl-10->pl-12, pr-4->pr-5, py-2->py-3, w-64->w-72 -->
                    <svg class="w-5 h-5 text-white/70 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- left-3->left-4, top-2.5->top-3.5 -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                
            
            <!-- Mobile menu button - Diperbesar -->
            <div class="md:hidden flex items-center space-x-3"> <!-- space-x-2 -> space-x-3 -->
                <a href="#" class="text-white">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- w-6 h-6 -> w-7 h-7 -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </a>
                <button id="mobile-menu-button" class="text-white hover:text-amber-200 focus:outline-none">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- h-6 w-6 -> h-7 w-7 -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Search (for mobile) - Diperbesar -->
    <div class="md:hidden px-4 pb-4">
        <div class="relative">
            <input type="text" 
                   placeholder="Cari produk..." 
                   class="w-full bg-white/10 text-white placeholder-white/70 rounded-full pl-12 pr-5 py-3 focus:outline-none focus:ring-2 focus:ring-white/50 border border-white/20 text-base"> <!-- pl-10->pl-12, pr-4->pr-5, py-2->py-3 -->
            <svg class="w-5 h-5 text-white/70 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- left-3->left-4, top-2.5->top-3.5 -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>
    
    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-[#8B6F4F]">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('beranda') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md">HOME</a>
            <a href="{{ route('katalog') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md">KATALOG PRODUK</a>
            <a href="#" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md">PROFIL PERUSAHAAN</a>
            <a href="#" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md">CONTACT US</a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>