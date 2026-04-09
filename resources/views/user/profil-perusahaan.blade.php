@extends('layouts.frontend')

@section('title', 'Profil Perusahaan')

@section('content')
    <!-- HEADER -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1.5">
                Profil <span class="text-[#B08968]">Perusahaan</span>
            </h1>
            <div class="w-8 h-0.5 bg-[#B08968] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- TENTANG PERUSAHAAN -->
    <div class="bg-white py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        Tentang <span class="text-[#B08968]">541 Furniture</span>
                    </h2>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami menyediakan berbagai produk furniture dan interior custom dengan desain modern, 
                        fungsional, dan berkualitas. Dengan pengalaman pengerjaan mebel rumah dan ruang usaha, 
                        541 Furniture berkomitmen menghadirkan hasil yang rapi, tahan lama, dan sesuai kebutuhan 
                        pelanggan — mulai dari kitchen set, backdrop TV, lemari, hingga panel dekoratif.
                    </p>
                </div>
                <div class="relative order-first lg:order-last">
                    <div class="rounded-lg shadow-md overflow-hidden aspect-video">
                        <img src="{{ asset('images/toko.jpg') }}" 
                             alt="Toko 541 Furniture" 
                             class="w-full h-full object-cover"
                             loading="lazy"
                             onerror="this.src='https://via.placeholder.com/600x400?text=541+Furniture'">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KEUNGGULAN -->
    <div class="bg-gray-50 py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-5">
                <h2 class="text-xl font-bold text-gray-900 mb-1">
                    Kenapa Memilih <span class="text-[#B08968]">Kami?</span>
                </h2>
                <p class="text-xs text-gray-500">Keunggulan yang membuat kami berbeda</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                <!-- Keunggulan 1 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Material Berkualitas</h3>
                    <p class="text-xs text-gray-500">Material pilihan dengan standar kualitas terbaik</p>
                </div>

                <!-- Keunggulan 2 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Custom Desain</h3>
                    <p class="text-xs text-gray-500">Bebas menentukan desain sesuai keinginan</p>
                </div>

                <!-- Keunggulan 3 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Pengerjaan Rapi</h3>
                    <p class="text-xs text-gray-500">Detail teliti dengan finishing sempurna</p>
                </div>

                <!-- Keunggulan 4 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Harga Kompetitif</h3>
                    <p class="text-xs text-gray-500">Harga bersaing dengan kualitas terbaik</p>
                </div>

                <!-- Keunggulan 5 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Tim Berpengalaman</h3>
                    <p class="text-xs text-gray-500">Profesional yang berpengalaman di bidangnya</p>
                </div>

                <!-- Keunggulan 6 -->
                <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">Area Layanan Luas</h3>
                    <p class="text-xs text-gray-500">Melayani Malang dan sekitarnya</p>
                </div>
            </div>
        </div>
    </div>

    <!-- LAYANAN & PROSES -->
    <div class="bg-white py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Layanan Kami -->
                <div>
                    <h2 class="text-base font-bold text-gray-900 mb-2 pb-1 border-b-2 border-[#B08968] inline-block">
                        Layanan Kami
                    </h2>
                    <div class="grid grid-cols-2 gap-2 mt-3">
                        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B08968] flex-shrink-0"></span>
                            <span class="text-xs text-gray-700">Kitchen set</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B08968] flex-shrink-0"></span>
                            <span class="text-xs text-gray-700">Backdrop TV</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B08968] flex-shrink-0"></span>
                            <span class="text-xs text-gray-700">Lemari & Panel dekoratif</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B08968] flex-shrink-0"></span>
                            <span class="text-xs text-gray-700">Konsultasi desain</span>
                        </div>
                    </div>
                </div>

                <!-- Proses Pemesanan -->
                <div>
                    <h2 class="text-base font-bold text-gray-900 mb-2 pb-1 border-b-2 border-[#B08968] inline-block">
                        Proses Pemesanan
                    </h2>
                    <div class="space-y-2 mt-3">
                        @php
                            $steps = [
                                'Konsultasi kebutuhan',
                                'Pengukuran lokasi',
                                'Desain & Penawaran harga',
                                'Produksi',
                                'Pengiriman & Pemasangan',
                            ];
                        @endphp
                        @foreach($steps as $i => $step)
                        <div class="flex items-center gap-2.5 p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-5 h-5 bg-[#B08968] text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">{{ $i + 1 }}</div>
                            <p class="text-xs text-gray-700">{{ $step }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AREA LAYANAN -->
    <div class="bg-gray-50 py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
                <h2 class="text-base font-bold text-gray-900 mb-1">Area Layanan</h2>
                <div class="w-8 h-0.5 bg-[#B08968] mb-2 rounded-full"></div>
                <p class="text-sm text-gray-600 mb-1">
                    Melayani area <span class="font-semibold text-[#B08968]">Malang dan sekitarnya</span> (Jawa Timur).
                </p>
                <p class="text-xs text-gray-500 mb-2">
                    Kami siap melayani kebutuhan furniture Anda, baik untuk rumah tinggal, apartemen, kantor, maupun ruang usaha.
                </p>
                <div class="flex items-center gap-1.5 text-gray-500">
                    <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-xs">Malang, Jawa Timur</span>
                </div>
            </div>
        </div>
    </div>
@endsection