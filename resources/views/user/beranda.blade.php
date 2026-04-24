@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
                <!-- HERO SECTION WITH BACKGROUND IMAGE + OVERLAY GELAP -->
    <div class="relative min-h-[550px] md:min-h-[600px] flex items-center justify-center overflow-hidden">
        <!-- BACKGROUND IMAGE -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gambarberanda8.jpeg') }}" 
                 alt="Hero Background" 
                 class="w-full h-full object-cover object-center">
            <!-- OVERLAY GELAP - INI KUNCINYA! -->
            <div class="absolute inset-0 bg-black/60"></div>
            <!-- Overlay tambahan warna coklat -->
            <div class="absolute inset-0 bg-[#B08968]/20 mix-blend-overlay"></div>
        </div>

        <!-- KONTEN HERO (TEKS PUTIH) -->
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8 py-12 lg:py-20 items-center justify-center flex-col">
                
                <!-- Badge - Hanya Dekorasi Tanpa Icon -->
                <div>
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-md border border-white/30 text-white text-sm px-4 py-2 rounded-full">
                        <span>✦ Furniture Custom ✦</span>
                    </div>
                </div>

                
                <!-- Animated Heading -->
                <div class="flex gap-4 flex-col">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl max-w-3xl tracking-tighter text-center font-bold">
                        <span class="text-white">Ciptakan Ruang yang</span>
                        <span class="relative flex w-full justify-center overflow-hidden text-center min-h-[1.2em] mt-2 sm:mt-4">
                            <span class="animated-title absolute font-bold text-[#F5E6D3]" data-index="0" style="opacity: 0; transform: translateY(100%);">Berkualitas</span>
                                <span class="animated-title absolute font-bold text-[#F5E6D3]" data-index="1" style="opacity: 0; transform: translateY(100%);">Elegan</span>
                                <span class="animated-title absolute font-bold text-[#F5E6D3]" data-index="2" style="opacity: 0; transform: translateY(100%);">Fungsional</span>
                                <span class="animated-title absolute font-bold text-[#F5E6D3]" data-index="3" style="opacity: 0; transform: translateY(100%);">Nyaman</span>
                                <span class="animated-title absolute font-bold text-[#F5E6D3]" data-index="4" style="opacity: 0; transform: translateY(100%);">Sesuai Impian</span>
                        </span>
                    </h1>

                    <p class="text-sm sm:text-base md:text-lg leading-relaxed tracking-tight text-white/90 max-w-2xl text-center mx-auto">
                        Furniture custom berkualitas dengan desain modern, detail yang elegan, 
                        dan sentuhan hangat. Kami siap mewujudkan furniture impian Anda sesuai 
                        dengan ukuran dan kebutuhan ruangan.
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('kontak') }}" 
                       class="group inline-flex items-center justify-center gap-2 border-2 border-white text-white px-6 py-2.5 rounded-full font-semibold hover:bg-white hover:text-[#B08968] transition-all duration-300 text-sm md:text-base">
                        <span>Hubungi Kami</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ route('katalog') }}" 
                       class="group inline-flex items-center justify-center gap-2 bg-[#B08968] hover:bg-[#8B6F4F] text-white px-6 py-2.5 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg text-sm md:text-base">
                        <span>Lihat Katalog</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="flex items-center justify-center gap-4 pt-2">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs text-white">Garansi 100%</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                        <span class="text-xs text-white">500+ Proyek</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.5-4 .396 0 .744.466 1.012 1.118.367.9.672 1.819.89 2.564a6.97 6.97 0 01-.782 1.938z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs text-white">Custom Sesuai Ukuran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTIK SECTION -->
    <div class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="reveal group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="0.1">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-3xl font-bold text-[#B08968] mb-1 counter" data-target="500">0</div>
                        <div class="text-xs text-gray-600 font-medium tracking-wide">PROYEK SELESAI</div>
                        <div class="w-8 h-0.5 bg-[#B08968]/30 mx-auto mt-2 rounded-full"></div>
                    </div>
                </div>
                
                <div class="reveal group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="0.2">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-3xl font-bold text-[#B08968] mb-1 counter" data-target="100">0</div>
                        <div class="text-xs text-gray-600 font-medium tracking-wide">KEPUASAN PELANGGAN</div>
                        <div class="w-8 h-0.5 bg-[#B08968]/30 mx-auto mt-2 rounded-full"></div>
                    </div>
                </div>
                
                <div class="reveal group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="0.3">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-3xl font-bold text-[#B08968] mb-1">Custom</div>
                        <div class="text-xs text-gray-600 font-medium tracking-wide">SESUAI KEBUTUHAN</div>
                        <div class="w-8 h-0.5 bg-[#B08968]/30 mx-auto mt-2 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KATEGORI INSPIRASI -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 reveal" data-delay="0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Kategori <span class="text-[#B08968]">Inspirasi</span>
                </h2>
                <div class="w-9 h-0.5 bg-[#B08968] mx-auto mt-3 rounded-full"></div>
                <p class="text-sm text-gray-500 mt-3 max-w-md mx-auto">
                    Temukan furniture custom sesuai gaya ruangan Anda
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-end justify-center gap-6 max-w-4xl mx-auto pb-10">
                <!-- KIRI - Kursi (pendek) -->
                <div class="group cursor-pointer reveal w-full md:w-1/3 md:mb-10" data-delay="0.1">
                    <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-lg">
                        <div class="relative overflow-hidden">
                            <div class="aspect-[9/14]">
                                <img src="{{ asset('images/imagedekorasi.jpeg') }}"
                                     alt="Kursi Custom"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-800 mb-1">Kursi Custom</h3>
                            <p class="text-xs text-gray-400">Mulai <span class="text-[#B08968] font-semibold">Rp 800.000</span></p>
                        </div>
                    </div>
                </div>

                <!-- TENGAH - Meja (paling tinggi / featured) -->
                <div class="group cursor-pointer reveal w-full md:w-1/3" data-delay="0.2">
                    <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-lg shadow-md">
                        <div class="relative overflow-hidden">
                            <div class="aspect-[9/16]">
                                <img src="{{ asset('images/imagelemari.jpeg') }}"
                                     alt="Meja Custom"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-800 mb-1">Meja Custom</h3>
                            <p class="text-xs text-gray-400">Mulai <span class="text-[#B08968] font-semibold">Rp 1.200.000</span></p>
                        </div>
                    </div>
                </div>

                <!-- KANAN - Lemari (sedang) -->
                <div class="group cursor-pointer reveal w-full md:w-1/3 md:mb-5" data-delay="0.3">
                    <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-lg">
                        <div class="relative overflow-hidden">
                            <div class="aspect-[9/15]">
                                <img src="{{ asset('images/imagedekorasi.jpeg') }}"
                                     alt="Lemari Custom"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-800 mb-1">Lemari Custom</h3>
                            <p class="text-xs text-gray-400">Mulai <span class="text-[#B08968] font-semibold">Rp 2.500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- REKOMENDASI PRODUK -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6 reveal" data-delay="0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Rekomendasi <span class="text-[#B08968]">Untuk Anda</span>
                </h2>
                <p class="text-sm text-gray-600">Koleksi pilihan yang bisa menjadi referensi untuk ruangan Anda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @forelse($produkTerbaru as $index => $produk)
                <div class="reveal group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-500 hover:-translate-y-1 card-hover image-zoom" data-delay="{{ 0.1 + ($index * 0.1) }}">
                    <div class="relative pb-[100%] overflow-hidden">
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                             alt="{{ $produk->nama_produk }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-1">{{ $produk->nama_produk }}</h3>
                        <div class="flex items-center justify-between">
                            <p class="text-base font-bold text-[#B08968]">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <span class="text-xs text-gray-500">/meter</span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('produk.detail', $produk->slug) }}" 
                               class="block w-full text-center border border-[#B08968] text-[#B08968] text-xs py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-8">
                    <p class="text-gray-500">Belum ada produk tersedia</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-6 reveal" data-delay="0.5">
                <a href="{{ route('katalog') }}" 
                   class="group inline-flex items-center gap-2 bg-[#B08968] text-white px-6 py-2 rounded-full font-semibold hover:bg-[#8B6F4F] transition-all duration-300 shadow-md hover:shadow-lg text-sm">
                    <span>Lihat Semua Produk</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
                  
    <!-- TESTIMONI -->
    <div class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6 reveal" data-delay="0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Apa Kata <span class="text-[#B08968]">Mereka</span>
                </h2>
                <p class="text-sm text-gray-600">Testimoni dari pelanggan setia kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @php
                    $testimonials = [
                        ['name' => 'Andi Wijaya', 'text' => 'Furniture custom sesuai keinginan, hasilnya sangat memuaskan. Tim profesional dan komunikatif!', 'role' => 'Pelanggan', 'delay' => '0.1'],
                        ['name' => 'Siti Nurhaliza', 'text' => 'Proses mudah, hasil rapi, sesuai dengan ukuran ruangan. Recommended!', 'role' => 'Pelanggan', 'delay' => '0.2'],
                        ['name' => 'Bambang Supriadi', 'text' => 'Kualitas bahan bagus, pengerjaan teliti, harga sesuai dengan kualitas. Pasti order lagi!', 'role' => 'Pelanggan', 'delay' => '0.3'],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                <div class="reveal group relative bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="{{ $testimonial['delay'] }}">
                    <div class="absolute top-2 right-2 text-3xl font-serif text-[#B08968]/10">"</div>
                    <div class="flex gap-0.5 mb-2">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-xs text-gray-600 mb-3 relative z-10">"{{ $testimonial['text'] }}"</p>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-bold text-xs">
                            {{ substr($testimonial['name'], 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-xs">{{ $testimonial['name'] }}</div>
                            <div class="text-xs text-gray-500">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-6 reveal" data-delay="0">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-bold text-white mb-1">Siap Mewujudkan Furniture Impian Anda?</h3>
                    <p class="text-white/90 text-xs">Konsultasikan kebutuhan furniture custom Anda dengan tim kami</p>
                </div>
                <a href="{{ route('kontak') }}" 
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 card-hover">
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
    // Animasi teks bergantian (smooth fade/slide)
    (function() {
        const titles = ['Nyaman', 'Elegan', 'Fungsional', 'Berkualitas', 'Sesuai Impian'];
        let currentIndex = 0;
        const titleElements = document.querySelectorAll('.animated-title');
        
        function showTitle(index) {
            titleElements.forEach((el, i) => {
                if (i === index) {
                    el.style.transition = 'all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                } else {
                    el.style.transition = 'all 0.3s ease-in-out';
                    el.style.opacity = '0';
                    el.style.transform = i < index ? 'translateY(-100%)' : 'translateY(100%)';
                }
            });
        }
        
        function nextTitle() {
            currentIndex = (currentIndex + 1) % titles.length;
            showTitle(currentIndex);
        }
        
        if (titleElements.length > 0) {
            showTitle(0);
            setInterval(nextTitle, 2000);
        }
    })();

    // Counter animation untuk statistik
    (function() {
        const counters = document.querySelectorAll('.counter');
        
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            let current = 0;
            const increment = target / 50;
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            updateCounter();
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => observer.observe(counter));
    })();

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