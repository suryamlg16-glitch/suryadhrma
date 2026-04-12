@extends('layouts.frontend')

@section('title', 'Katalog Produk')

@section('content')
    <!-- HEADER KATALOG -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                Katalog <span class="text-[#B08968]">Produk</span>
            </h1>
            <div class="w-9 h-0.5 bg-[#B08968] mx-auto mt-3 mb-3 rounded-full"></div>
            <p class="text-sm text-gray-500 max-w-2xl mx-auto">
                Temukan berbagai pilihan furniture berkualitas dalam katalog produk kami 
                — lengkap dengan desain dan kisaran harga.
            </p>
        </div>
    </div>

   <!-- SEARCH SECTION - SEARCH BAR DI KIRI -->
    <div class="bg-white border-y border-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Bar di Kiri -->
            <div class="flex justify-start">
                <div class="w-full md:w-72">
                    <div class="relative">
                        <input type="text" id="search-input"
                               placeholder="Cari produk..."
                               class="w-full px-4 py-2 pr-10 rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#B08968]/30 focus:border-[#B08968] text-sm bg-gray-50">
                        <svg class="absolute right-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCT GRID -->
    <div class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="product-grid">
                
                <!-- PRODUK 1 - Kursi Tamu Jati -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Kursi Tamu Jati">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imagemeja.jpeg') }}"
                             alt="Kursi Tamu Jati"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Kursi Tamu Jati</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 1.500.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'kursi-tamu-jati') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- PRODUK 2 - Meja Makan Marmer -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Meja Makan Marmer">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imagedapur.jpeg') }}"
                             alt="Meja Makan Marmer"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Meja Makan Marmer</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 3.500.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'meja-makan-marmer') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- PRODUK 3 - Lemari Pakaian 3 Pintu -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Lemari Pakaian 3 Pintu">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imagelemari.jpeg') }}"
                             alt="Lemari Pakaian 3 Pintu"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Lemari Pakaian 3 Pintu</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 4.500.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'lemari-pakaian-3-pintu') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- PRODUK 4 - Rak Buku Minimalis -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Rak Buku Minimalis">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imagedekorasi.jpeg') }}"
                             alt="Rak Buku Minimalis"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Rak Buku Minimalis</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 1.200.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'rak-buku-minimalis') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- PRODUK 5 - Backdrop TV -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Backdrop TV">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imageruangtamu.jpeg') }}"
                             alt="Backdrop TV"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Backdrop TV</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 4.500.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'backdrop-tv') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- PRODUK 6 - Kitchen Set Minimalis -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="Kitchen Set Minimalis">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/imagedapur2.jpeg') }}"
                             alt="Kitchen Set Minimalis"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">Kitchen Set Minimalis</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp 3.200.000</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', 'kitchen-set-minimalis') }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>

            </div>

            <!-- EMPTY STATE -->
            <div id="empty-state" class="text-center py-12 hidden">
                <div class="max-w-sm mx-auto">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-500 text-sm font-medium">Produk tidak ditemukan</p>
                    <p class="text-gray-400 text-xs mt-1">Coba dengan kata kunci lain</p>
                </div>
            </div>

        </div>
    </div>

    <!-- EMPTY STATE -->
            <div id="empty-state" class="text-center py-12 hidden">
                <div class="max-w-sm mx-auto">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-500 text-sm font-medium">Produk tidak ditemukan</p>
                    <p class="text-gray-400 text-xs mt-1">Coba dengan kata kunci lain</p>
                </div>
            </div>

        </div>
    </div>

    <!-- SEARCH SCRIPT -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const productCards = document.querySelectorAll('.product-card');
        const emptyState = document.getElementById('empty-state');
        const productGrid = document.getElementById('product-grid');

        let timeout;
        function filterProducts(searchTerm) {
            let visibleCount = 0;
            
            productCards.forEach(function(card) {
                const productName = card.getAttribute('data-product').toLowerCase();
                if (productName.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Tampilkan empty state jika tidak ada produk yang terlihat
            if (visibleCount === 0 && searchTerm !== '') {
                emptyState.classList.remove('hidden');
                productGrid.classList.add('justify-center');
            } else {
                emptyState.classList.add('hidden');
                productGrid.classList.remove('justify-center');
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const searchTerm = this.value.toLowerCase().trim();
                timeout = setTimeout(() => filterProducts(searchTerm), 150);
            });
        }
    });
    </script>

    <!-- PAGINATION - DINAMIS (SESUAI DENGAN DATA DARI DATABASE NANTI) -->
    <div class="bg-gray-50 pb-8">
        <div class="flex justify-center">
            <nav class="flex items-center gap-1.5" id="pagination-container">
                <!-- Pagination akan di-generate oleh Laravel nanti -->
                <div class="text-sm text-gray-500">
                    Menampilkan 1-6 dari 6 produk
                </div>
            </nav>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-center sm:text-left">
                    <h3 class="text-lg md:text-xl font-semibold text-white mb-0.5">Siap Mewujudkan Ruang Impian Anda?</h3>
                    <p class="text-white/80 text-xs">Konsultasikan kebutuhan furniture Anda dengan tim kami</p>
                </div>
                <a href="{{ route('kontak') }}"
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-5 py-2 rounded-full font-medium text-sm transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span>Hubungi Kami</span>
                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection