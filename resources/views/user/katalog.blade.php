@extends('layouts.frontend')

@section('title', 'Katalog Produk')

@section('content')
    <!-- HEADER KATALOG -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Katalog <span class="text-[#B08968]">Produk</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Temukan berbagai pilihan furniture berkualitas dalam katalog produk kami 
                — lengkap dengan desain dan kisaran harga.
            </p>
        </div>
    </div>

    <!-- FILTER & SEARCH SECTION -->
    <div class="bg-white border-y border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
                <!-- Search Bar -->
                <div class="w-full md:w-96">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Cari produk..." 
                               class="w-full px-5 py-3 pr-12 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                        <svg class="absolute right-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Sort By Dropdown -->
                <div class="flex items-center gap-3">
                    <span class="text-gray-600 whitespace-nowrap">Urutkan:</span>
                    <select class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                        <option value="terbaru">Terbaru</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="populer">Populer</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCT GRID -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Products Grid - 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    // DATA DUMMY - Nanti diganti dengan data dari database
                    $products = [
                        ['name' => 'Backlit Wall Panel', 'price' => '800.000 - 4.500.000', 'unit' => 'meter', 'image' => 'images/produk1.jpg'],
                        ['name' => 'Lemari Dapur', 'price' => '2.500.000 - 4.000.000', 'unit' => 'meter', 'image' => 'images/produk2.jpg'],
                        ['name' => 'Meja Rias', 'price' => '4.000.000 - 8.000.000', 'unit' => 'meter', 'image' => 'images/produk3.jpg'],
                        ['name' => 'Meja Rias Minimalis', 'price' => '2.500.000 - 4.000.000', 'unit' => 'meter', 'image' => 'images/produk4.jpg'],
                        ['name' => 'Backdrop TV', 'price' => '4.500.000 - 8.500.000', 'unit' => 'meter', 'image' => 'images/produk5.jpg'],
                        ['name' => 'Lemari Dapur & Mini Bar', 'price' => '2.500.000 - 4.000.000', 'unit' => 'meter', 'image' => 'images/produk6.jpg'],
                        ['name' => 'Kitchen Set Minimalis', 'price' => '3.200.000 - 6.500.000', 'unit' => 'meter', 'image' => 'images/produk7.jpg'],
                        ['name' => 'Rak Dinding', 'price' => '1.200.000 - 2.800.000', 'unit' => 'meter', 'image' => 'images/produk8.jpg'],
                        ['name' => 'Meja Kerja', 'price' => '2.800.000 - 5.200.000', 'unit' => 'meter', 'image' => 'images/produk9.jpg'],
                    ];
                @endphp

                @foreach($products as $index => $product)
                <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Image Container -->
                    <div class="relative pb-[100%] overflow-hidden bg-gray-100">
                        <img src="{{ asset($product['image']) }}" 
                             alt="{{ $product['name'] }}" 
                             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2 min-h-[56px]">{{ $product['name'] }}</h3>
                        <div class="space-y-1">
                            <p class="text-xl font-bold text-[#B08968]">Rp {{ $product['price'] }}</p>
                            <p class="text-sm text-gray-500">/{{ $product['unit'] }}</p>
                        </div>
                        
                        <!-- Quick Action -->
                        <a href="#" class="mt-4 block w-full text-center border border-[#B08968] text-[#B08968] py-2 rounded-lg hover:bg-[#B08968] hover:text-white transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-16">
                <nav class="flex items-center gap-2">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-[#B08968] hover:text-white hover:border-[#B08968] transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#B08968] text-white font-medium">1</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 hover:bg-[#B08968] hover:text-white transition">2</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 hover:bg-[#B08968] hover:text-white transition">3</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 hover:bg-[#B08968] hover:text-white transition">4</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-[#B08968] hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="text-center sm:text-left">
                    <h3 class="text-xl md:text-2xl font-semibold text-white mb-1">Siap Mewujudkan Ruang Impian Anda?</h3>
                    <p class="text-white/80 text-sm">Konsultasikan kebutuhan furniture Anda dengan tim kami</p>
                </div>
                <a href="#" 
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span>Hubungi Kami</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection