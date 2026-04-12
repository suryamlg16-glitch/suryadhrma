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

    <!-- SEARCH SECTION - REAL TIME -->
    <div class="bg-white border-y border-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

    <!-- PRODUCT GRID - DARI DATABASE -->
    <div class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="product-grid">
                @forelse($produk as $item)
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card" data-product="{{ $item->nama_produk }}">
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/' . $item->gambar_utama) }}" 
                             alt="{{ $item->nama_produk }}" 
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-medium text-xs text-gray-800 mb-1 line-clamp-1">{{ $item->nama_produk }}</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <p class="text-xs font-bold text-[#B08968]">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <p class="text-[10px] text-gray-400">/meter</p>
                        </div>
                        <a href="{{ route('produk.detail', $item->slug) }}"
                           class="block w-full text-center bg-[#B08968]/10 text-[#B08968] text-[10px] font-medium py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-500 text-sm">Belum ada produk tersedia</p>
                </div>
                @endforelse
            </div>

            <!-- EMPTY STATE UNTUK SEARCH -->
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

    <!-- SEARCH SCRIPT (REAL TIME FILTER) -->
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

    <!-- PAGINATION - LARAVEL -->
    <div class="bg-gray-50 pb-8">
        <div class="flex justify-center">
            {{ $produk->links() }}
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