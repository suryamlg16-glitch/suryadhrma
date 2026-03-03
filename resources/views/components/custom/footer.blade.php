<footer class="bg-[#B08968] text-white">
    <!-- CTA SECTION - WARNA #8B6F4F -->
    <div class="bg-[#8B6F4F] py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="text-center sm:text-left">
                    <h3 class="text-xl md:text-2xl font-semibold text-white mb-1">Siap Mewujudkan Ruang Impian Anda?</h3>
                    <p class="text-white/80 text-sm">Konsultasikan kebutuhan furniture Anda dengan tim kami</p>
                </div>
                <a href="#" 
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span>Hubungi Kami</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- MAIN FOOTER -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Logo Section - Logo DIPERBESAR -->
            <div class="md:col-span-3 flex flex-col items-center md:items-start">
                <!-- Logo gambar DIPERBESAR -->
                <img src="{{ asset('images/logomebel.png') }}" 
                     alt="541 Furniture" 
                     class="h-24 w-auto object-contain brightness-0 invert mb-3">
                
                <!-- Tagline -->
                <p class="text-xs text-white/60 mt-1 text-center md:text-left">
                    Desain • Kualitas • Kenyamanan
                </p>
            </div>
            
            <!-- PERUSAHAAN -->
            <div class="md:col-span-3">
                <h3 class="text-sm font-semibold mb-3 text-white border-b border-white/20 pb-1">PERUSAHAAN</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">TENTANG KAMI</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">KONTAK</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">ALAMAT TOKO</a></li>
                </ul>
            </div>
            
            <!-- LAYANAN -->
            <div class="md:col-span-3">
                <h3 class="text-sm font-semibold mb-3 text-white border-b border-white/20 pb-1">LAYANAN</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">CARA PEMESANAN</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">PENGIRIMAN</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">PEMBAYARAN</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">KONSULTASI DESIGN</a></li>
                </ul>
            </div>
            
            <!-- MENU -->
            <div class="md:col-span-3">
                <h3 class="text-sm font-semibold mb-3 text-white border-b border-white/20 pb-1">MENU</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('beranda') }}" class="text-white/70 hover:text-white text-xs transition duration-200">DASHBOARD</a></li>
                    <li><a href="{{ route('katalog') }}" class="text-white/70 hover:text-white text-xs transition duration-200">KATALOG PRODUK</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">FITUR PEMESANAN</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white text-xs transition duration-200">PROFIL PERUSAHAAN</a></li>
                </ul>
            </div>
        </div>

        <!-- IKUTI KAMI & Social Media -->
        <div class="flex flex-col sm:flex-row justify-between items-center mt-6 pt-4 border-t border-white/20">
            <h3 class="text-sm font-semibold text-white mb-3 sm:mb-0">IKUTI KAMI</h3>
            <div class="flex space-x-4">
                <!-- Facebook -->
                <a href="#" class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition duration-300 group" aria-label="Facebook">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/>
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="#" class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition duration-300 group" aria-label="Instagram">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1 1 12.324 0 6.162 6.162 0 0 1-12.324 0zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm4.965-10.405a1.44 1.44 0 1 1 2.881.001 1.44 1.44 0 0 1-2.881-.001z"/>
                    </svg>
                </a>
                <!-- Twitter/X -->
                <a href="#" class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition duration-300 group" aria-label="Twitter">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- COPYRIGHT - OPSI A (Bilingual) DI TENGAH -->
        <div class="mt-6 pt-4 border-t border-white/20 text-center">
            <p class="text-white/60 text-xs">
                © 2026 541 FURNITURE · All Rights Reserved
            </p>
        </div>
    </div>
</footer>