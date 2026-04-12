@props([
    'logo' => null // nanti untuk gambar logo
])

<nav class="bg-[#B08968] shadow-lg sticky top-0 z-50">
    <!-- Decorative line at top -->
   <div class="h-0.5 bg-gradient-to-r from-[#8B6F4F] via-[#D4A574] to-[#8B6F4F]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo dengan efek hover -->
            <div class="flex-shrink-0 flex items-center group">
                <a href="{{ route('beranda') }}" class="relative">
                    <img src="{{ asset('images/logomebel.png') }}" 
                         alt="Logo Mebel" 
                         class="h-14 w-auto object-contain brightness-0 invert transform transition-transform duration-300 group-hover:scale-105">
                    <!-- Glow effect on hover -->
                    <div class="absolute -inset-2 bg-white/20 rounded-full blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>
            </div>
            
            <!-- Desktop Menu dengan efek modern (background slide dari kiri) -->
            <div class="hidden md:flex items-center space-x-0.5">
                <a href="{{ route('beranda') }}" 
                   class="relative text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group overflow-hidden">
                    <span class="relative z-10">BERANDA</span>
                    <span class="absolute inset-0 bg-[#8B6F4F] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left {{ request()->routeIs('beranda') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <a href="{{ route('katalog') }}" 
                   class="relative text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group overflow-hidden">
                    <span class="relative z-10">KATALOG PRODUK</span>
                    <span class="absolute inset-0 bg-[#8B6F4F] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left {{ request()->routeIs('katalog') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <a href="{{ route('profil') }}" 
                   class="relative text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group overflow-hidden">
                    <span class="relative z-10">PROFIL PERUSAHAAN</span>
                    <span class="absolute inset-0 bg-[#8B6F4F] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left {{ request()->routeIs('profil') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <a href="{{ route('kontak') }}" 
                   class="relative text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group overflow-hidden">
                    <span class="relative z-10">HUBUNGI KAMI</span>
                    <span class="absolute inset-0 bg-[#8B6F4F] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left {{ request()->routeIs('kontak') ? 'scale-x-100' : '' }}"></span>
                </a>
                
                <!-- Menu TRACKING -->
                <a href="{{ route('tracking.index') }}" 
                   class="relative text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group overflow-hidden">
                    <span class="relative z-10">CEK PESANAN</span>
                    <span class="absolute inset-0 bg-[#8B6F4F] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            </div>
            
            <!-- Social Media Icons - HANYA ICON (tanpa teks) -->
            <div class="hidden md:flex items-center space-x-2">
                <a href="https://www.instagram.com/541furniture?igsh=MWQzYmtwdWtmYmtkNQ==" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg" {{-- Ubah dari p-2.5 ke p-2 --}}
                   aria-label="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"> {{-- Ubah dari w-5 h-5 ke w-4 h-4 --}}
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.76 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                
                <!-- TikTok -->
                <a href="https://tiktok.com/@541furnituremalang" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg" {{-- Ubah dari w-10 h-10 p-0 flex items-center justify-center ke p-2 --}}
                   aria-label="TikTok">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"> {{-- Ubah dari w-5 h-5 ke w-4 h-4 --}}
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                    </svg>
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/6282231289379" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg" {{-- Ubah dari w-10 h-10 p-0 flex items-center justify-center ke p-2 --}}
                   aria-label="WhatsApp">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"> {{-- Ubah dari w-5 h-5 ke w-4 h-4 --}}
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center space-x-2">
                <button id="mobile-menu-button" class="text-white hover:text-amber-200 focus:outline-none relative group">
                    <svg class="w-6 h-6 transform transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <span class="absolute -inset-3 bg-white/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu dengan efek slide -->
    <div id="mobile-menu" class="hidden md:hidden bg-[#8B6F4F] transform transition-all duration-300 origin-top">
        <div class="px-2 pt-2 pb-3 space-y-0.5">
            <a href="{{ route('beranda') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md transition-all duration-300 transform hover:translate-x-2 text-sm">BERANDA</a>
            <a href="{{ route('katalog') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md transition-all duration-300 transform hover:translate-x-2 text-sm">KATALOG PRODUK</a>
            <a href="{{ route('profil') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md transition-all duration-300 transform hover:translate-x-2 text-sm">PROFIL PERUSAHAAN</a>
            <a href="{{ route('kontak') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md transition-all duration-300 transform hover:translate-x-2 text-sm">HUBUNGI KAMI</a>
            
            <!-- Menu TRACKING di Mobile -->
            <a href="{{ route('tracking.index') }}" class="block px-3 py-2 text-white hover:bg-[#B08968] rounded-md transition-all duration-300 transform hover:translate-x-2 text-sm">TRACKING</a>
            
            <!-- Social Media Links di Mobile Menu - HANYA ICON -->
            <div class="pt-3 pb-2 border-t border-white/20 mt-3">
                <div class="flex justify-center space-x-3">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/541furniture?igsh=MWQzYmtwdWtmYmtkNQ==" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                        </svg>
                    </a>
                    
                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@541furnituremalang?_r=1&_t=ZS-94abliNOwJF" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="TikTok">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                        </svg>
                    </a>
                    
                    <!-- WhatsApp -->
                    <a href="https://wa.me/6282231289379" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="WhatsApp">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle dengan animasi
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.classList.add('animate-slide-down');
        } else {
            menu.classList.add('hidden');
            menu.classList.remove('animate-slide-down');
        }
    });
</script>

<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: scaleY(0);
        }
        to {
            opacity: 1;
            transform: scaleY(1);
        }
    }
    
    .animate-slide-down {
        animation: slideDown 0.3s ease-out;
        transform-origin: top;
    }
</style>