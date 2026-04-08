@extends('layouts.frontend')

@section('title', $produk->nama_produk ?? 'Detail Produk')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Katalog</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">{{ $produk->nama_produk ?? 'Detail Produk' }}</span>
        </div>
    </div>
</div>

<!-- Detail Produk -->
<div class="bg-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
            <!-- Gambar Produk -->
            <div>
                <div class="bg-gray-100 rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/' . ($produk->gambar_utama ?? 'imagemeja.jpeg')) }}" 
                         alt="{{ $produk->nama_produk ?? 'Produk' }}"
                         class="w-full h-auto object-cover">
                </div>
            </div>
            
            <!-- Info Produk -->
            <div class="space-y-6">
                <!-- Kategori -->
                <span class="inline-block px-4 py-1.5 bg-[#B08968]/10 text-[#B08968] text-sm font-medium rounded-full">
                    {{ $produk->kategori->nama_kategori ?? 'Inspirasi Furniture' }}
                </span>
                
                <!-- Nama Produk -->
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">
                    {{ $produk->nama_produk ?? 'Nama Produk' }}
                </h1>
                
                <!-- Harga (sebagai estimasi) -->
                <div class="flex items-baseline gap-3">
                    <p class="text-4xl md:text-5xl font-bold text-[#B08968]">
                        Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
                    </p>
                    <p class="text-gray-500 text-lg">/meter lari (estimasi)</p>
                </div>
                
                <!-- Badge Info Custom -->
                <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                    <div class="flex gap-3">
                        <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-blue-800 font-medium">Furniture Custom Sesuai Ukuran</p>
                            <p class="text-xs text-blue-600 mt-1">Harga dapat berubah sesuai ukuran, bahan, dan tingkat kerumitan. Tim kami akan survey dan mengukur langsung di lokasi.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Deskripsi -->
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-600 leading-relaxed">
                        {{ $produk->deskripsi ?? 'Deskripsi produk belum tersedia.' }}
                    </p>
                </div>
                
                <!-- Spesifikasi Bahan -->
                <div class="bg-gray-50 rounded-lg p-5">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Spesifikasi & Material</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-gray-500">Material Utama</p>
                            <p class="font-medium text-gray-800">{{ $produk->bahan ?? 'Kayu Jati' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Finishing</p>
                            <p class="font-medium text-gray-800">Melamin / Cat Duco</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Warna</p>
                            <p class="font-medium text-gray-800">{{ $produk->warna ?? 'Natural / Custom' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Garansi</p>
                            <p class="font-medium text-gray-800">1 Tahun</p>
                        </div>
                    </div>
                </div>
                
                <!-- Layanan yang Didapat -->
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Survey & Pengukuran gratis</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Konsultasi desain bersama tim ahli</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Pemasangan oleh tim profesional</span>
                    </div>
                </div>
                
                <!-- Tombol Konsultasi/Pemesanan -->
                <div class="pt-4">
                    <a href="{{ route('pesan.index', ['slug' => $produk->slug]) }}" 
                       class="inline-block w-full bg-[#B08968] text-white text-center font-semibold py-4 px-6 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-md hover:shadow-lg text-lg">
                        Konsultasikan & Buat Pesanan
                    </a>
                    <p class="text-xs text-gray-400 text-center mt-3">
                        *Tim kami akan menghubungi Anda untuk jadwal survey dan konsultasi
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section: Cara Pemesanan -->
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Bagaimana Cara Memesan?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-[#B08968] text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="font-semibold text-gray-900 mb-2">Konsultasi</h3>
                <p class="text-sm text-gray-600">Diskusikan kebutuhan furniture Anda dengan tim kami</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-[#B08968] text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="font-semibold text-gray-900 mb-2">Survey & Ukur</h3>
                <p class="text-sm text-gray-600">Tim kami akan survey dan mengukur lokasi pemasangan</p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-[#B08968] text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="font-semibold text-gray-900 mb-2">Produksi</h3>
                <p class="text-sm text-gray-600">Pembuatan furniture sesuai ukuran dan desain yang disepakati</p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-[#B08968] text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="font-semibold text-gray-900 mb-2">Pasang</h3>
                <p class="text-sm text-gray-600">Pengiriman dan pemasangan oleh tim profesional</p>
            </div>
        </div>
    </div>
</div>
@endsection