@extends('layouts.frontend')

@section('title', 'Hubungi Kami')

@section('content')
    <!-- HEADER HALAMAN -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-8"> <!-- dari py-16 menjadi py-8 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2"> <!-- dari text-4xl md:text-5xl mb-4 menjadi text-3xl md:text-4xl mb-2 -->
                Hubungi <span class="text-[#B08968]">Kami</span>
            </h1>
            <p class="text-sm text-gray-600 max-w-2xl mx-auto"> <!-- dari text-lg menjadi text-sm -->
                Hubungi kami untuk informasi, pemesanan, dan konsultasi produk — tim kami siap membantu Anda.
            </p>
            <div class="w-16 h-0.5 bg-[#B08968] mx-auto mt-4 rounded-full"></div> <!-- dari w-24 h-1 mt-6 menjadi w-16 h-0.5 mt-4 -->
        </div>
    </div>

    <!-- INFORMASI KONTAK -->
    <div class="bg-white py-8"> <!-- dari py-16 menjadi py-8 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"> <!-- dari gap-6 menjadi gap-4 -->
                <!-- Email Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group"> <!-- dari rounded-2xl p-8 hover:shadow-xl hover:-translate-y-2 menjadi rounded-xl p-5 hover:shadow-md hover:-translate-y-1 -->
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300"> <!-- dari w-16 h-16 mb-4 menjadi w-12 h-12 mb-3 -->
                        <svg class="w-6 h-6 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- dari w-8 h-8 menjadi w-6 h-6 -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Email</h3> <!-- dari text-lg mb-2 menjadi text-sm mb-1 -->
                    <a href="mailto:sodiq541@gmail.com" class="text-[#B08968] hover:text-[#8B6F4F] text-sm break-all"> <!-- tambah text-sm -->
                        sodiq541@gmail.com
                    </a>
                </div>

                <!-- Alamat Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group md:col-span-2 lg:col-span-1"> <!-- dari rounded-2xl p-8 hover:shadow-xl hover:-translate-y-2 menjadi rounded-xl p-5 hover:shadow-md hover:-translate-y-1 -->
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Alamat</h3>
                    <p class="text-xs text-gray-600"> <!-- dari text-sm menjadi text-xs -->
                        Jl. Simpang Sulfat Selatan No.9, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65124
                    </p>
                </div>

                <!-- Telepon Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Telepon</h3>
                    <a href="tel:082231289379" class="text-[#B08968] hover:text-[#8B6F4F] text-sm">
                        0822-3128-9379
                    </a>
                </div>

                <!-- Instagram Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                            <path d="M12 7.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9z"/>
                            <circle cx="17.5" cy="6.5" r="1.5"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Instagram</h3>
                    <a href="https://instagram.com/541furnituremalang" target="_blank" class="text-[#B08968] hover:text-[#8B6F4F] text-sm">
                        @541furnituremalang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- GOOGLE MAPS -->
    <div class="bg-gray-50 py-6"> <!-- dari py-12 menjadi py-6 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden"> <!-- dari rounded-2xl shadow-lg menjadi rounded-xl shadow-md -->
                <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-500"> <!-- dari h-96 menjadi h-64 -->
                    <div class="text-center">
                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- dari w-12 h-12 mb-3 menjadi w-8 h-8 mb-2 -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-xs text-gray-500">Peta Lokasi (Google Maps)</p> <!-- dari text-sm menjadi text-xs -->
                        <p class="text-xs text-gray-400 mt-1">Jl. Simpang Sulfat Selatan No.9, Malang</p> <!-- dari text-sm mt-2 menjadi text-xs mt-1 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection