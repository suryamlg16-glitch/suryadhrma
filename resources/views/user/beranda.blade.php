@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
    <!-- HERO SECTION - Premium Modern -->
    <div class="relative bg-gradient-to-r from-[#B08968]/5 via-white to-[#8B6F4F]/5 overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#B08968]/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#8B6F4F]/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center min-h-[600px] py-16 lg:py-24">
                <!-- Left Column - Text -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Badge -->
                    <span class="inline-block px-4 py-2 bg-[#B08968]/10 text-[#B08968] rounded-full text-sm font-semibold tracking-wide">
                        ✦ Furniture Premium ✦
                    </span>
                    
                    <!-- Main Heading -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Ciptakan Ruang yang 
                        <span class="relative inline-block">
                            <span class="relative z-10 text-[#B08968]">Nyaman</span>
                            <span class="absolute bottom-2 left-0 w-full h-3 bg-[#B08968]/20 -z-10 rounded-full"></span>
                        </span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-lg text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Furniture berkualitas dengan desain modern, detail yang elegan, 
                        dan sentuhan hangat untuk membantu Anda membangun suasana rumah 
                        yang indah, fungsional, dan membuat setiap momen terasa lebih nyaman.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('katalog') }}" 
                           class="group relative inline-flex items-center justify-center gap-2 bg-[#B08968] text-white px-8 py-4 rounded-full font-semibold overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105">
                            <span class="relative z-10">Lihat Katalog</span>
                            <svg class="relative z-10 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </a>
                        
                        <a href="#" 
                           class="group inline-flex items-center justify-center gap-2 border-2 border-[#B08968] text-[#B08968] px-8 py-4 rounded-full font-semibold hover:bg-[#B08968] hover:text-white transition-all duration-300 hover:shadow-xl">
                            <span>Hubungi Kami</span>
                            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Trust Badges -->
                    <div class="flex items-center justify-center lg:justify-start gap-6 pt-8">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm text-gray-600">Garansi 100%</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                            </svg>
                            <span class="text-sm text-gray-600">1000+ Pelanggan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.5-4 .396 0 .744.466 1.012 1.118.367.9.672 1.819.89 2.564a6.97 6.97 0 01-.782 1.938z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm text-gray-600">Desain Eksklusif</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Image with Modern Frame -->
                <div class="relative">
                    <!-- Main Image Frame -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/gambarberanda.jpg') }}" 
                             alt="Ruang Nyaman" 
                             class="w-full h-full object-cover">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Floating Card 1 -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-4 backdrop-blur-sm bg-white/90">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#B08968]/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Produk Tersedia</p>
                                <p class="text-lg font-bold text-gray-900">541+</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Card 2 -->
                    <div class="absolute -top-6 -right-6 bg-white rounded-2xl shadow-xl p-4 backdrop-blur-sm bg-white/90">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#B08968]/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Pelanggan Puas</p>
                                <p class="text-lg font-bold text-gray-900">1000+</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative Blur Elements -->
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-[#B08968]/20 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTIK SECTION - Modern Cards -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Stat 1 -->
                <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-5xl font-bold text-[#B08968] mb-3">541</div>
                        <div class="text-gray-600 font-medium tracking-wide">PRODUK TERSEDIA</div>
                        <div class="w-12 h-1 bg-[#B08968]/30 mx-auto mt-4 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Stat 2 -->
                <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-5xl font-bold text-[#B08968] mb-3">1000+</div>
                        <div class="text-gray-600 font-medium tracking-wide">PELANGGAN PUAS</div>
                        <div class="w-12 h-1 bg-[#B08968]/30 mx-auto mt-4 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Stat 3 -->
                <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#B08968]/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-5xl font-bold text-[#B08968] mb-3">50+</div>
                        <div class="text-gray-600 font-medium tracking-wide">DESAIN EKSKLUSIF</div>
                        <div class="w-12 h-1 bg-[#B08968]/30 mx-auto mt-4 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- KATEGORI POPULER - Modern Minimalis -->
<div class="bg-gradient-to-b from-gray-50 to-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Kategori <span class="text-[#B08968]">Populer</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Temukan berbagai pilihan furniture berkualitas dalam kategori yang kami sediakan
            </p>
        </div>

        <!-- Grid Kategori dengan jarak bawah yang pas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start mb-10">  <!-- UBAH dari mb-16 ke mb-10 -->
            <!-- KIRI - Kursi -->
            <div class="group relative transform transition-all duration-500 hover:-translate-y-2">
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative pb-[125%] overflow-hidden">
                        <img src="{{ asset('images/imagedekorasi.jpeg') }}" 
                             alt="Kursi" 
                             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kursi</h3>
                        <p class="text-sm text-gray-500">12 Produk</p>
                    </div>
                </div>
            </div>

            <!-- TENGAH - Meja (lebih rendah) -->
            <div class="group relative transform translate-y-4 md:translate-y-8 transition-all duration-500 hover:-translate-y-2 z-10">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 ring-2 ring-[#B08968]/20">
                    <div class="relative pb-[125%] overflow-hidden">
                        <img src="{{ asset('images/imagelemari.jpeg') }}" 
                             alt="Meja" 
                             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6 text-center bg-white">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Meja</h3>
                        <p class="text-sm text-gray-500">8 Produk</p>
                    </div>
                </div>
            </div>

            <!-- KANAN - Lemari -->
            <div class="group relative transform transition-all duration-500 hover:-translate-y-2">
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative pb-[125%] overflow-hidden">
                        <img src="{{ asset('images/imagedekorasi.jpeg') }}" 
                             alt="Lemari" 
                             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Lemari</h3>
                        <p class="text-sm text-gray-500">15 Produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- PRODUK TERBARU - Premium Cards -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Produk <span class="text-[#B08968]">Terbaru</span>
            </h2>
            <p class="text-lg text-gray-600">Koleksi terbaru dari kami untuk Anda</p>
        </div>
        
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $products = [
                    ['name' => 'Kursi Tamu Jati', 'price' => '1.500.000', 'image' => 'imagemeja.jpeg'],
                    ['name' => 'Meja Makan Marmer', 'price' => '3.500.000', 'image' => 'imagedapur.jpeg'],
                    ['name' => 'Lemari Pakaian 3 Pintu', 'price' => '4.500.000', 'image' => 'imageruangtamu.jpeg'],
                    ['name' => 'Rak Buku Minimalis', 'price' => '1.200.000', 'image' => 'imagedapur2.jpeg'],
                ];
            @endphp

            @foreach($products as $product)
            <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="relative pb-[100%] overflow-hidden">
                    <img src="{{ asset('images/' . $product['image']) }}" 
                         alt="{{ $product['name'] }}" 
                         class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- HOVER OVERLAY - TANPA TOMBOL -->
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <!-- TOMBOL QUICK VIEW DIHAPUS, HANYA OVERLAY GELAP YANG TERSISA -->
                    </div>
                </div>
                
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-[#B08968]">Rp {{ $product['price'] }}</p>
                        <span class="text-sm text-gray-500">Tersedia</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            
            <!-- View All Button -->
            <div class="text-center mt-16">
                <a href="{{ route('katalog') }}" 
                   class="group inline-flex items-center gap-3 bg-[#B08968] text-white px-10 py-4 rounded-full font-semibold hover:bg-[#8B6F4F] transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>Lihat Semua Produk</span>
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- TESTIMONI - Modern Cards -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Apa Kata <span class="text-[#B08968]">Mereka</span>
                </h2>
                <p class="text-lg text-gray-600">Testimoni dari pelanggan setia kami</p>
            </div>
            
            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        ['name' => 'Andi Wijaya', 'text' => 'Furniture berkualitas tinggi, desainnya modern dan sesuai dengan ekspektasi saya. Sangat puas!', 'role' => 'Pelanggan'],
                        ['name' => 'Siti Nurhaliza', 'text' => 'Pelayanan cepat, pengiriman tepat waktu, produk sesuai pesanan. Recommended!', 'role' => 'Pelanggan'],
                        ['name' => 'Bambang Supriadi', 'text' => 'Desainnya elegan, bahannya kuat, harga terjangkau. Pasti akan order lagi!', 'role' => 'Pelanggan'],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Quote Icon -->
                    <div class="absolute top-6 right-6 text-6xl font-serif text-[#B08968]/10">"</div>
                    
                    <!-- Rating Stars -->
                    <div class="flex gap-1 mb-6">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    
                    <!-- Testimonial Text -->
                    <p class="text-gray-600 mb-6 relative z-10">"{{ $testimonial['text'] }}"</p>
                    
                    <!-- Author Info -->
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#B08968] to-[#8B6F4F] rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($testimonial['name'], 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">{{ $testimonial['name'] }}</div>
                            <div class="text-sm text-gray-500">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection