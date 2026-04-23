@extends('layouts.frontend')

@section('title', 'Pesanan Berhasil')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Katalog</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">Pesanan Berhasil</span>
        </div>
    </div>
</div>

<!-- Halaman Sukses -->
<div class="bg-white py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Sukses -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Pesanan <span class="text-[#B08968]">Berhasil!</span>
            </h1>
            <div class="w-12 h-0.5 bg-[#B08968] mx-auto rounded-full mt-2"></div>
            <p class="text-gray-500 text-sm mt-3">Terima kasih telah berbelanja di 541 Furniture</p>
        </div>
        
        <!-- Kartu Informasi Pesanan -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-6">
            <div class="bg-gray-50 px-5 py-3 border-b border-gray-100">
                <h2 class="text-sm font-semibold text-gray-800">Detail Pesanan</h2>
            </div>
            
            <div class="p-5 space-y-4">
                <!-- Status Pesanan -->
                <div class="flex items-center gap-2 pb-2 border-b border-gray-100">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs text-gray-500">Status: <span class="font-medium text-green-600">Menunggu Konfirmasi Admin</span></span>
                </div>
                
                <!-- Ringkasan Produk -->
                <div class="flex gap-3">
                    <div class="w-14 h-14 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('images/' . ($produk->gambar_utama ?? 'imagemeja.jpeg')) }}" 
                            alt="{{ $produk->nama_produk }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-sm text-gray-800">{{ $produk->nama_produk }}</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Jumlah: 1 Unit</p>
                        <p class="text-xs text-gray-500 mt-1">Harga akan ditentukan setelah survey & pengukuran</p>
                    </div>
                </div>

                <!-- Informasi Harga (Estimasi) -->
                <div class="bg-gray-50 rounded-lg p-3 space-y-2">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Status Harga</span>
                        <span class="text-amber-600 font-medium">Menunggu Deal</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 mt-1">
                        <div class="flex justify-between">
                            <span class="font-semibold text-sm text-gray-800">Informasi</span>
                            <span class="text-xs text-gray-500">Harga final akan diinformasikan admin setelah survey</span>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Pengiriman -->
                <div class="bg-gray-50 rounded-lg p-3">
                    <h4 class="text-xs font-semibold text-gray-800 mb-2">📍 Informasi Pengiriman</h4>
                    <p class="text-xs text-gray-600 font-medium">{{ $alamat['nama_lengkap'] }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $alamat['alamat_lengkap'] }}</p>
                    <p class="text-xs text-gray-500">{{ $alamat['kecamatan'] }}, {{ $alamat['kota'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">📞 {{ $alamat['no_wa'] }}</p>
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan -->
        <div class="bg-blue-50 rounded-xl p-4 mb-6 border border-blue-100">
            <div class="flex gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-blue-800 font-semibold">Apa yang perlu dilakukan selanjutnya?</p>
                    <p class="text-[11px] text-blue-600 mt-1 leading-relaxed">
                        Tim kami akan menghubungi Anda dalam 1x24 jam untuk konfirmasi pesanan dan jadwal survey.
                        Pastikan nomor WhatsApp yang Anda daftarkan aktif.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('beranda') }}" 
               class="bg-[#B08968] text-white px-6 py-2.5 rounded-lg font-semibold text-center text-sm hover:bg-[#8B6F4F] transition-all duration-300 hover:shadow-md">
                Kembali ke Beranda
            </a>
            <a href="{{ route('katalog') }}" 
               class="border-2 border-[#B08968] text-[#B08968] px-6 py-2.5 rounded-lg font-semibold text-center text-sm hover:bg-[#B08968] hover:text-white transition-all duration-300">
                Lanjut Belanja
            </a>
        </div>
    </div>
</div>
@endsection