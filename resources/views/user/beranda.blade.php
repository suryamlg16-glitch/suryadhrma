@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
    <!-- HERO SECTION -->
    <div class="relative bg-gradient-to-r from-[#B08968]/5 via-white to-[#8B6F4F]/5 overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center min-h-[450px] py-8 lg:py-12"> <!-- dari min-h-[600px] py-16 lg:py-24 menjadi lebih kecil -->
                <!-- Left Column -->
                <div class="text-center lg:text-left space-y-5 reveal" data-delay="0"> <!-- dari space-y-8 menjadi space-y-5 -->
                    <!-- Badge -->
                    <span class="inline-block px-3 py-1 bg-[#B08968]/10 text-[#B08968] rounded-full text-xs font-semibold tracking-wide"> <!-- dari text-sm menjadi text-xs -->
                        ✦ Furniture Custom ✦
                    </span>
                    
                    <!-- Main Heading -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight"> <!-- dari text-4xl md:text-5xl lg:text-6xl menjadi lebih kecil -->
                        Ciptakan Ruang yang 
                        <span class="text-[#B08968] drop-shadow-md">Nyaman</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0"> <!-- dari text-lg menjadi text-sm -->
                        Furniture custom berkualitas dengan desain modern, detail yang elegan, 
                        dan sentuhan hangat. Kami siap mewujudkan furniture impian Anda sesuai 
                        dengan ukuran dan kebutuhan ruangan.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start"> <!-- dari gap-4 menjadi gap-3 -->
                        <a href="{{ route('katalog') }}" 
                           class="group relative inline-flex items-center justify-center gap-2 bg-[#B08968] text-white px-5 py-2 rounded-full font-semibold overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 text-sm"> <!-- dari px-8 py-4 menjadi px-5 py-2 -->
                            <span class="relative z-10">Lihat Katalog</span>
                            <svg class="relative z-10 w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </a>
                        
                        <a href="{{ route('kontak') }}" 
                           class="group inline-flex items-center justify-center gap-2 border-2 border-[#B08968] text-[#B08968] px-5 py-2 rounded-full font-semibold hover:bg-[#B08968] hover:text-white transition-all duration-300 text-sm"> <!-- dari px-8 py-4 menjadi px-5 py-2 -->
                            <span>Hubungi Kami</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Trust Badges -->
                    <div class="flex items-center justify-center lg:justify-start gap-4 pt-2"> <!-- dari gap-6 pt-8 menjadi gap-4 pt-2 -->
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs text-gray-600">Garansi 100%</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                            </svg>
                            <span class="text-xs text-gray-600">500+ Proyek</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.5-4 .396 0 .744.466 1.012 1.118.367.9.672 1.819.89 2.564a6.97 6.97 0 01-.782 1.938z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs text-gray-600">Custom Sesuai Ukuran</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Image -->
                <div class="relative reveal" data-delay="1">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('images/gambarberanda.jpg') }}" 
                             alt="Ruang Nyaman" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Floating Card 1 -->
                    <div class="absolute -bottom-3 -left-3 bg-white rounded-xl shadow-md p-2 backdrop-blur-sm bg-white/90">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-[#B08968]/10 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Proyek Selesai</p>
                                <p class="text-sm font-bold text-gray-900">500+</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Card 2 -->
                    <div class="absolute -top-3 -right-3 bg-white rounded-xl shadow-md p-2 backdrop-blur-sm bg-white/90">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-[#B08968]/10 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Konsultasi Gratis</p>
                                <p class="text-sm font-bold text-gray-900">24/7</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-[#B08968]/20 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTIK SECTION -->
    <div class="bg-white py-8"> <!-- dari py-20 menjadi py-8 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <!-- dari gap-8 menjadi gap-4 -->
                <div class="reveal group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="0.1"> <!-- dari p-8 rounded-2xl menjadi p-4 rounded-xl -->
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-3xl font-bold text-[#B08968] mb-1 counter" data-target="500">0</div> <!-- dari text-5xl menjadi text-3xl -->
                        <div class="text-xs text-gray-600 font-medium tracking-wide">PROYEK SELESAI</div> <!-- dari text-sm menjadi text-xs -->
                        <div class="w-8 h-0.5 bg-[#B08968]/30 mx-auto mt-2 rounded-full"></div> <!-- dari w-12 mt-4 menjadi w-8 mt-2 -->
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
                <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl shadow-md">
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
<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 reveal" data-delay="0">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Bagaimana <span class="text-[#B08968]">Cara Memesan?</span>
            </h2>
            <p class="text-sm text-gray-600">Proses mudah untuk mewujudkan furniture impian Anda</p>
        </div>

        <div class="relative">
            <!-- Connector line sejajar tengah lingkaran -->
            <div class="hidden md:block absolute z-0"
                 style="
                     top: calc(20px + 24px);
                     transform: translateY(-50%);
                     left: calc(25% / 2 + 24px);
                     right: calc(25% / 2 + 24px);
                     height: 1px;
                     background: repeating-linear-gradient(to right, #B08968 0, #B08968 6px, transparent 6px, transparent 12px);
                     opacity: 0.4;
                 "></div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative z-10">

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.1">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">1</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Konsultasi</h3>
                    <p class="text-xs text-gray-500">Diskusikan kebutuhan furniture Anda dengan tim ahli kami</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.2">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">2</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Survey & Ukur</h3>
                    <p class="text-xs text-gray-500">Tim kami akan survey dan mengukur lokasi pemasangan</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.3">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">3</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Produksi</h3>
                    <p class="text-xs text-gray-500">Pembuatan furniture sesuai ukuran dan desain yang disepakati</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.4">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">4</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Pasang</h3>
                    <p class="text-xs text-gray-500">Pengiriman dan pemasangan oleh tim profesional</p>
                </div>

            </div>
        </div>
    </div>
</div>

    <!-- REKOMENDASI PRODUK -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-8"> <!-- dari py-20 menjadi py-8 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6 reveal" data-delay="0"> <!-- dari mb-16 menjadi mb-6 -->
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Rekomendasi <span class="text-[#B08968]">Untuk Anda</span>
                </h2>
                <p class="text-sm text-gray-600">Koleksi pilihan yang bisa menjadi referensi untuk ruangan Anda</p> <!-- dari text-lg menjadi text-sm -->
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"> <!-- dari gap-8 menjadi gap-4 -->
                @php
                    $products = [
                        ['name' => 'Kursi Tamu Jati', 'price' => '1.500.000', 'image' => 'imagemeja.jpeg', 'slug' => 'kursi-tamu-jati', 'delay' => '0.1'],
                        ['name' => 'Meja Makan Marmer', 'price' => '3.500.000', 'image' => 'imagedapur.jpeg', 'slug' => 'meja-makan-marmer', 'delay' => '0.2'],
                        ['name' => 'Lemari Pakaian 3 Pintu', 'price' => '4.500.000', 'image' => 'imageruangtamu.jpeg', 'slug' => 'lemari-pakaian-3-pintu', 'delay' => '0.3'],
                        ['name' => 'Rak Buku Minimalis', 'price' => '1.200.000', 'image' => 'imagedapur2.jpeg', 'slug' => 'rak-buku-minimalis', 'delay' => '0.4'],
                    ];
                @endphp

                @foreach($products as $product)
                <div class="reveal group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-500 hover:-translate-y-1 card-hover image-zoom" data-delay="{{ $product['delay'] }}"> <!-- dari rounded-2xl shadow-lg menjadi rounded-xl shadow-md -->
                    <div class="relative pb-[100%] overflow-hidden">
                        <img src="{{ asset('images/' . $product['image']) }}" 
                             alt="{{ $product['name'] }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="p-3"> <!-- dari p-5 menjadi p-3 -->
                        <h3 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-1">{{ $product['name'] }}</h3> <!-- dari text-lg menjadi text-sm, mb-2 menjadi mb-1 -->
                        <div class="flex items-center justify-between">
                            <p class="text-base font-bold text-[#B08968]">Rp {{ $product['price'] }}</p> <!-- dari text-xl menjadi text-base -->
                            <span class="text-xs text-gray-500">/meter</span>
                        </div>
                        <div class="mt-2"> <!-- dari mt-3 menjadi mt-2 -->
                            <a href="{{ route('produk.detail', $product['slug']) }}" 
                               class="block w-full text-center border border-[#B08968] text-[#B08968] text-xs py-1.5 rounded-lg hover:bg-[#B08968] hover:text-white transition"> <!-- dari py-2 text-sm menjadi py-1.5 text-xs -->
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-6 reveal" data-delay="0.5"> <!-- dari mt-16 menjadi mt-6 -->
                <a href="{{ route('katalog') }}" 
                   class="group inline-flex items-center gap-2 bg-[#B08968] text-white px-6 py-2 rounded-full font-semibold hover:bg-[#8B6F4F] transition-all duration-300 shadow-md hover:shadow-lg text-sm"> <!-- dari px-10 py-4 text-lg menjadi px-6 py-2 text-sm -->
                    <span>Lihat Semua Produk</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
            
    <!-- TESTIMONI -->
    <div class="bg-white py-8"> <!-- dari py-20 menjadi py-8 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6 reveal" data-delay="0"> <!-- dari mb-16 menjadi mb-6 -->
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Apa Kata <span class="text-[#B08968]">Mereka</span>
                </h2>
                <p class="text-sm text-gray-600">Testimoni dari pelanggan setia kami</p> <!-- dari text-lg menjadi text-sm -->
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <!-- dari gap-8 menjadi gap-4 -->
                @php
                    $testimonials = [
                        ['name' => 'Andi Wijaya', 'text' => 'Furniture custom sesuai keinginan, hasilnya sangat memuaskan. Tim profesional dan komunikatif!', 'role' => 'Pelanggan', 'delay' => '0.1'],
                        ['name' => 'Siti Nurhaliza', 'text' => 'Proses mudah, hasil rapi, sesuai dengan ukuran ruangan. Recommended!', 'role' => 'Pelanggan', 'delay' => '0.2'],
                        ['name' => 'Bambang Supriadi', 'text' => 'Kualitas bahan bagus, pengerjaan teliti, harga sesuai dengan kualitas. Pasti order lagi!', 'role' => 'Pelanggan', 'delay' => '0.3'],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                <div class="reveal group relative bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition-all duration-500 hover:-translate-y-1 card-hover" data-delay="{{ $testimonial['delay'] }}"> <!-- dari rounded-2xl p-8 shadow-lg menjadi rounded-xl p-4 shadow-md -->
                    <div class="absolute top-2 right-2 text-3xl font-serif text-[#B08968]/10">"</div> <!-- dari top-6 right-6 text-6xl menjadi top-2 right-2 text-3xl -->
                    <div class="flex gap-0.5 mb-2"> <!-- dari gap-1 mb-6 menjadi gap-0.5 mb-2 -->
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"> <!-- dari w-5 h-5 menjadi w-3 h-3 -->
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-xs text-gray-600 mb-3 relative z-10">"{{ $testimonial['text'] }}"</p> <!-- dari text-gray-600 mb-6 menjadi text-xs mb-3 -->
                    <div class="flex items-center gap-2"> <!-- dari gap-4 menjadi gap-2 -->
                        <div class="w-8 h-8 bg-gradient-to-br from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-bold text-xs"> <!-- dari w-12 h-12 text-lg menjadi w-8 h-8 text-xs -->
                            {{ substr($testimonial['name'], 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-xs">{{ $testimonial['name'] }}</div> <!-- dari text-sm menjadi text-xs -->
                            <div class="text-xs text-gray-500">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-6 reveal" data-delay="0"> <!-- dari py-16 menjadi py-6 -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4"> <!-- dari gap-8 menjadi gap-4 -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-bold text-white mb-1">Siap Mewujudkan Furniture Impian Anda?</h3> <!-- dari text-2xl md:text-3xl mb-2 menjadi text-lg md:text-xl mb-1 -->
                    <p class="text-white/90 text-xs">Konsultasikan kebutuhan furniture custom Anda dengan tim kami</p> <!-- dari text-base menjadi text-xs -->
                </div>
                <a href="{{ route('kontak') }}" 
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 card-hover"> <!-- dari px-8 py-4 text-lg menjadi px-5 py-2 text-sm -->
                    <span>Hubungi Kami</span>
                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection