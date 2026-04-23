@extends('layouts.frontend')

@section('title', 'Katalog Produk')

@section('content')
    <!-- HEADER KATALOG -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-8 reveal" data-delay="0">
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
    <div class="bg-white border-y border-gray-100 py-4 reveal" data-delay="0.1">
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
                @forelse($produk as $index => $item)
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 product-card reveal" data-product="{{ $item->nama_produk }}" data-delay="{{ 0.1 + ($index * 0.02) }}">
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
    <div class="bg-gray-50 pb-8 reveal" data-delay="0.2">
        <div class="flex justify-center">
            {{ $produk->links() }}
        </div>
    </div>

    <!-- PROSES PEMESANAN -->
    <div id="cara-memesan" class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6 reveal" data-delay="0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Bagaimana <span class="text-[#B08968]">Cara Memesan?</span>
                </h2>
                <p class="text-sm text-gray-600">Proses mudah untuk mewujudkan furniture impian Anda</p>
            </div>

            <div class="relative">
                <!-- Connector line -->
                <div class="hidden md:block absolute z-0"
                     style="top: calc(20px + 24px); transform: translateY(-50%); left: calc(25% / 2 + 24px); right: calc(25% / 2 + 24px); height: 1px; background: repeating-linear-gradient(to right, #B08968 0, #B08968 6px, transparent 6px, transparent 12px); opacity: 0.4;">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative z-10">
                    <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0] hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)] group" data-delay="0.1">
                        <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">1</div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Konsultasi</h3>
                        <p class="text-xs text-gray-500">Diskusikan kebutuhan furniture Anda dengan tim ahli kami</p>
                    </div>

                    <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0] hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)] group" data-delay="0.2">
                        <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">2</div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Survey & Ukur</h3>
                        <p class="text-xs text-gray-500">Tim kami akan survey dan mengukur lokasi pemasangan</p>
                    </div>

                    <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0] hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)] group" data-delay="0.3">
                        <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">3</div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Produksi</h3>
                        <p class="text-xs text-gray-500">Pembuatan furniture sesuai ukuran dan desain yang disepakati</p>
                    </div>

                    <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0] hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)] group" data-delay="0.4">
                        <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">4</div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Pasang</h3>
                        <p class="text-xs text-gray-500">Pengiriman dan pemasangan oleh tim profesional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-6 reveal" data-delay="0">
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

@push('scripts')
<script>
    // Reveal animation on scroll
    (function() {
        const revealElements = document.querySelectorAll('.reveal');
        
        const revealOnScroll = () => {
            revealElements.forEach(el => {
                const windowHeight = window.innerHeight;
                const revealTop = el.getBoundingClientRect().top;
                const revealPoint = 150;
                
                if (revealTop < windowHeight - revealPoint) {
                    const delay = el.getAttribute('data-delay') || 0;
                    setTimeout(() => {
                        el.classList.add('active');
                    }, delay * 1000);
                }
            });
        };
        
        // Add CSS for reveal animation
        const style = document.createElement('style');
        style.textContent = `
            .reveal {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease-out;
            }
            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
        
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
        revealOnScroll();
    })();
</script>
@endpush