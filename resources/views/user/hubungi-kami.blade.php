@extends('layouts.frontend')

@section('title', 'Hubungi Kami')

@section('content')
    <!-- HEADER HALAMAN -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Hubungi <span class="text-[#B08968]">Kami</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Hubungi kami untuk informasi, pemesanan, dan konsultasi produk — tim kami siap membantu Anda.
            </p>
            <div class="w-24 h-1 bg-[#B08968] mx-auto mt-6 rounded-full"></div>
        </div>
    </div>

    <!-- INFORMASI KONTAK -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Email Card -->
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                    <div class="w-16 h-16 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-8 h-8 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Email</h3>
                    <a href="mailto:sodiq541@gmail.com" class="text-[#B08968] hover:text-[#8B6F4F] break-all">
                        sodiq541@gmail.com
                    </a>
                </div>

                <!-- Alamat Card -->
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group md:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-8 h-8 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Alamat</h3>
                    <p class="text-gray-600 text-sm">
                        Jl. Simpang Sulfat Selatan No.9, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65124
                    </p>
                </div>

                <!-- Telepon Card -->
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                    <div class="w-16 h-16 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-8 h-8 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Telepon</h3>
                    <a href="tel:082231289379" class="text-[#B08968] hover:text-[#8B6F4F]">
                        0822-3128-9379
                    </a>
                </div>

                <!-- Instagram Card -->
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                    <div class="w-16 h-16 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-8 h-8 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Instagram</h3>
                    <a href="https://instagram.com/541furnituremalang" target="_blank" class="text-[#B08968] hover:text-[#8B6F4F]">
                        @541furnituremalang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- GOOGLE MAPS (Optional - bisa ditambahkan nanti) -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="h-96 bg-gray-200 flex items-center justify-center text-gray-500">
                    <!-- Tempat untuk Google Maps nanti -->
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-gray-500">Peta Lokasi (Google Maps)</p>
                        <p class="text-sm text-gray-400 mt-2">Jl. Simpang Sulfat Selatan No.9, Malang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection