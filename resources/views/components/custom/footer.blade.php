<footer class="bg-[#B08968] text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- 4 KOLOM MENGGUNAKAN GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- KOLOM 1 - LOGO -->
            <div class="text-center lg:text-left">
                <img src="{{ asset('images/logomebel.png') }}" 
                     alt="541 Furniture" 
                     class="h-12 w-auto object-contain brightness-0 invert mx-auto lg:mx-0 mb-1">
                <p class="text-xs text-white/60">
                    Desain • Kualitas • Kenyamanan
                </p>
            </div>

            <!-- KOLOM 2 - MENU -->
            <div class="text-center lg:text-left">
                <h3 class="text-xs font-semibold mb-1 text-white border-b border-white/20 pb-1 inline-block">MENU</h3>
                <ul class="space-y-1 mt-1">
                    <li><a href="{{ route('beranda') }}" class="text-white/70 hover:text-white text-xs transition">BERANDA</a></li>
                    <li><a href="{{ route('katalog') }}" class="text-white/70 hover:text-white text-xs transition">KATALOG PRODUK</a></li>
                    <li><a href="{{ route('profil') }}" class="text-white/70 hover:text-white text-xs transition">PROFIL PERUSAHAAN</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-white/70 hover:text-white text-xs transition">HUBUNGI KAMI</a></li>
                    <li><a href="{{ route('tracking.index') }}" class="text-white/70 hover:text-white text-xs transition">CEK PESANAN</a></li>
                </ul>
            </div>

            <!-- KOLOM 3 - PROFIL -->
            <div class="text-center lg:text-left">
                <h3 class="text-xs font-semibold mb-1 text-white border-b border-white/20 pb-1 inline-block">PROFIL</h3>
                <ul class="space-y-1 mt-1">
                    <li><a href="{{ route('profil') }}" class="text-white/70 hover:text-white text-xs transition">TENTANG KAMI</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-white/70 hover:text-white text-xs transition">KONTAK</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-white/70 hover:text-white text-xs transition">ALAMAT TOKO</a></li>
                </ul>
            </div>

            <!-- KOLOM 4 - LAYANAN -->
            <div class="text-center lg:text-left">
                <h3 class="text-xs font-semibold mb-1 text-white border-b border-white/20 pb-1 inline-block">LAYANAN</h3>
                <ul class="space-y-1 mt-1">
                    <li>
                        <a href="javascript:void(0);" onclick="goToCaraMemesan()" class="text-white/70 hover:text-white text-xs transition duration-200">
                            CARA PEMESANAN
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kontak') }}" class="text-white/70 hover:text-white text-xs transition">
                            KONSULTASI DESIGN
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- IKUTI KAMI & Social Media -->
        <div class="flex flex-col sm:flex-row justify-between items-center mt-4 pt-3 border-t border-white/20">
            <h3 class="text-xs font-semibold text-white mb-2 sm:mb-0">IKUTI KAMI</h3>
            
            <div class="flex space-x-2">
                <!-- Instagram -->
                <a href="https://www.instagram.com/541furniture?igsh=MWQzYmtwdWtmYmtkNQ==" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                   aria-label="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.76 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com/@541furnituremalang" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                   aria-label="TikTok">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                    </svg>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6282231289379" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-white/90 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                   aria-label="WhatsApp">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- COPYRIGHT -->
        <div class="mt-3 pt-2 border-t border-white/20 text-center">
            <p class="text-white/60 text-[11px]">
                © 2026 541 FURNITURE · All Rights Reserved
            </p>
        </div>
    </div>
</footer>

<script>
function goToCaraMemesan() {
    // Cek apakah sedang di halaman beranda
    if (window.location.pathname !== '/') {
        // Jika tidak di beranda, redirect ke beranda dulu dengan parameter
        window.location.href = '{{ route('beranda') }}?scroll=cara-memesan';
        return;
    }
    
    // Jika sudah di beranda, cari element dan scroll
    const element = document.getElementById('cara-memesan');
    if (element) {
        const offset = 80; // offset untuk navbar sticky
        const elementPosition = element.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - offset;
        
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
        
        // Update URL tanpa reload
        history.pushState(null, null, '#cara-memesan');
    } else {
        // Jika element tidak ditemukan, reload halaman
        console.log('Element #cara-memesan tidak ditemukan');
        window.location.reload();
    }
}

// Jika URL mengandung parameter scroll=cara-memesan (redirect dari halaman lain)
if (window.location.search === '?scroll=cara-memesan') {
    // Hapus parameter dari URL
    history.pushState(null, null, window.location.pathname);
    // Scroll ke element setelah halaman load
    setTimeout(function() {
        const element = document.getElementById('cara-memesan');
        if (element) {
            const offset = 80;
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;
            window.scrollTo({ 
                top: offsetPosition, 
                behavior: 'smooth' 
            });
            history.pushState(null, null, '#cara-memesan');
        } else {
            console.log('Element #cara-memesan tidak ditemukan setelah redirect');
        }
    }, 800);
}

// Jika langsung buka dengan hash #cara-memesan
if (window.location.hash === '#cara-memesan') {
    setTimeout(function() {
        const element = document.getElementById('cara-memesan');
        if (element) {
            const offset = 80;
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;
            window.scrollTo({ 
                top: offsetPosition, 
                behavior: 'smooth' 
            });
        }
    }, 500);
}
</script>