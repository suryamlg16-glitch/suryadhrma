@extends('layouts.frontend')

@section('title', 'Hubungi Kami')

@section('content')
    <!-- HERO SECTION -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Hubungi <span class="text-[#B08968]">Kami</span>
            </h1>
            <div class="w-12 h-0.5 bg-[#B08968] mx-auto rounded-full"></div>
            <p class="text-gray-500 text-sm mt-3 max-w-2xl mx-auto">
                Hubungi kami untuk informasi, pemesanan, dan konsultasi produk — tim kami siap membantu Anda.
            </p>
        </div>
    </div>

    <!-- INFORMASI KONTAK -->
    <div class="bg-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Email Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group border border-gray-100">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Email</h3>
                    <a href="mailto:sodiq541@gmail.com" class="text-[#B08968] hover:text-[#8B6F4F] text-xs break-all">
                        sodiq541@gmail.com
                    </a>
                </div>

                <!-- Telepon Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group border border-gray-100">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">WhatsApp</h3>
                    <a href="https://wa.me/6282231289379" target="_blank" class="text-[#B08968] hover:text-[#8B6F4F] text-xs">
                        0822-3128-9379
                    </a>
                </div>

                <!-- Instagram Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group border border-gray-100">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                            <path d="M12 7.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9z"/>
                            <circle cx="17.5" cy="6.5" r="1.5"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Instagram</h3>
                    <a href="https://instagram.com/541furnituremalang" target="_blank" class="text-[#B08968] hover:text-[#8B6F4F] text-xs">
                        @541furnituremalang
                    </a>
                </div>

                <!-- Alamat Card -->
                <div class="bg-gray-50 rounded-xl p-5 text-center hover:shadow-md transition-all duration-300 hover:-translate-y-1 group border border-gray-100">
                    <div class="w-12 h-12 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#B08968] transition-colors duration-300">
                        <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">Alamat</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Jl. Simpang Sulfat Selatan No.9, Pandanwangi, Kec. Blimbing, Kota Malang
                    </p>
                </div>
            </div>
        </div>
    </div>

        <!-- GOOGLE MAPS -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">
                    Temukan <span class="text-[#B08968]">Kami</span>
                </h2>
                <div class="w-12 h-0.5 bg-[#B08968] mx-auto rounded-full mt-3"></div>
                <p class="text-gray-500 text-xs mt-3">Kunjungi workshop kami di Kota Malang</p>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="h-80 md:h-96 w-full relative">
                    <!-- Loading placeholder -->
                    <div class="absolute inset-0 bg-gray-100 animate-pulse flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-8 h-8 text-[#B08968] mx-auto mb-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <p class="text-xs text-gray-400">Memuat peta...</p>
                        </div>
                    </div>
                    
                    <!-- Map iframe dengan parameter tambahan -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.176530744768!2d112.63642821477462!3d-7.963873394317121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6297f133a26cf%3A0x4e6c9e4f0fbc1f0f!2sJl.%20Simpang%20Sulfat%20Selatan%20No.9%2C%20Pandanwangi%2C%20Kec.%20Blimbing%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065124!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="relative z-10">
                    </iframe>
                </div>
                
                <!-- Footer map dengan tombol arah -->
                <div class="p-3 bg-white border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-xs text-gray-500">
                                Jl. Simpang Sulfat Selatan No.9, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65124
                            </p>
                        </div>
                        <a href="https://maps.google.com/?q=Jl.+Simpang+Sulfat+Selatan+No.9+Pandanwangi+Kec.+Blimbing+Kota+Malang+Jawa+Timur+65124" 
                           target="_blank" 
                           class="inline-flex items-center gap-1 text-[#B08968] hover:text-[#8B6F4F] text-xs font-medium transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <span>Buka di Google Maps</span>
                            <svg class="w-3 h-3 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection