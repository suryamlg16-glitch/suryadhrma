@extends('layouts.frontend')

@section('title', 'Profil Perusahaan')

@section('content')
    <!-- HEADER HALAMAN - OPTIMIZED -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Profil <span class="text-[#B08968]">Perusahaan</span>
            </h1>
            <div class="w-24 h-1 bg-[#B08968] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- TENTANG PERUSAHAAN - DENGAN LAZY LOAD -->
    <div class="bg-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Tentang <span class="text-[#B08968]">541 Furniture</span>
                    </h2>
                    <p class="text-base md:text-lg text-gray-600 leading-relaxed">
                        Kami menyediakan berbagai produk furniture dan interior custom dengan desain modern, 
                        fungsional, dan berkualitas. Dengan pengalaman pengerjaan mebel rumah dan ruang usaha, 
                        541 Furniture berkomitmen menghadirkan hasil yang rapi, tahan lama, dan sesuai kebutuhan 
                        pelanggan — mulai dari kitchen set, backdrop TV, lemari, hingga panel dekoratif.
                    </p>
                </div>
                <div class="relative order-first lg:order-last">
                    <div class="bg-gray-200 rounded-2xl shadow-xl overflow-hidden aspect-w-16 aspect-h-9">
                        <img src="{{ asset('images/toko.jpg') }}" 
                             alt="Toko 541 Furniture" 
                             class="w-full h-full object-cover"
                             loading="lazy"
                             width="600"
                             height="400"
                             onerror="this.src='https://via.placeholder.com/600x400?text=541+Furniture'">
                    </div>
                    <!-- Decorative Elements - Dikurangi intensitasnya -->
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-[#B08968]/5 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-[#8B6F4F]/5 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- KEUNGGULAN / NILAI PERUSAHAAN - VERSION RINGAN -->
    <div class="bg-gray-50 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Kenapa Memilih <span class="text-[#B08968]">Kami?</span>
                </h2>
                <p class="text-base md:text-lg text-gray-600">Keunggulan yang membuat kami berbeda</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- Keunggulan 1 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Material Berkualitas</h3>
                    <p class="text-sm text-gray-600">Material pilihan dengan standar kualitas terbaik</p>
                </div>
                
                <!-- Keunggulan 2 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Custom Desain</h3>
                    <p class="text-sm text-gray-600">Bebas menentukan desain sesuai keinginan</p>
                </div>
                
                <!-- Keunggulan 3 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengerjaan Rapi</h3>
                    <p class="text-sm text-gray-600">Detail teliti dengan finishing sempurna</p>
                </div>
                
                <!-- Keunggulan 4 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga Kompetitif</h3>
                    <p class="text-sm text-gray-600">Harga bersaing dengan kualitas terbaik</p>
                </div>
                
                <!-- Keunggulan 5 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tim Berpengalaman</h3>
                    <p class="text-sm text-gray-600">Profesional yang berpengalaman di bidangnya</p>
                </div>
                
                <!-- Keunggulan 6 -->
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition hover:-translate-y-1 duration-300">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Area Layanan Luas</h3>
                    <p class="text-sm text-gray-600">Melayani Malang dan sekitarnya</p>
                </div>
            </div>
        </div>
    </div>

    <!-- LAYANAN KAMI & PROSES PEMESANAN - SIMPLIFIED -->
    <div class="bg-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <!-- Layanan Kami -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 inline-block border-b-4 border-[#B08968] pb-2">
                        Layanan Kami
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                        <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg">
                            <span class="text-[#B08968] text-xl">•</span>
                            <span class="text-sm md:text-base text-gray-700">Kitchen set</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg">
                            <span class="text-[#B08968] text-xl">•</span>
                            <span class="text-sm md:text-base text-gray-700">Backdrop TV</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg">
                            <span class="text-[#B08968] text-xl">•</span>
                            <span class="text-sm md:text-base text-gray-700">Lemari & Panel dekoratif</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg">
                            <span class="text-[#B08968] text-xl">•</span>
                            <span class="text-sm md:text-base text-gray-700">Konsultasi desain</span>
                        </div>
                    </div>
                </div>
                
                <!-- Proses Pemesanan -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 inline-block border-b-4 border-[#B08968] pb-2">
                        Proses Pemesanan
                    </h2>
                    <div class="space-y-3 mt-4">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">1</div>
                            <p class="text-sm md:text-base text-gray-700">Konsultasi kebutuhan</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">2</div>
                            <p class="text-sm md:text-base text-gray-700">Pengukuran lokasi</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">3</div>
                            <p class="text-sm md:text-base text-gray-700">Desain & Penawaran harga</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">4</div>
                            <p class="text-sm md:text-base text-gray-700">Produksi</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">5</div>
                            <p class="text-sm md:text-base text-gray-700">Pengiriman & Pemasangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AREA LAYANAN - LIGHT VERSION -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 md:p-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Area Layanan</h2>
                    <div class="w-16 h-1 bg-[#B08968] mb-4"></div>
                    <p class="text-base md:text-lg text-gray-700 mb-3">
                        Melayani area <span class="font-semibold text-[#B08968]">Malang dan sekitarnya</span> (Jawa Timur).
                    </p>
                    <p class="text-sm md:text-base text-gray-600">
                        Kami siap melayani kebutuhan furniture Anda, baik untuk rumah tinggal, apartemen, kantor, maupun ruang usaha.
                    </p>
                    <div class="flex items-center gap-2 mt-4 text-gray-600">
                        <svg class="w-4 h-4 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm">Malang, Jawa Timur</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection