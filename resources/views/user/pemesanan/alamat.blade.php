@extends('layouts.frontend')

@section('title', 'Checkout - Alamat')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Katalog</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('produk.detail', $produk->slug) }}" class="text-gray-500 hover:text-[#B08968] text-xs">{{ $produk->nama_produk }}</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium text-xs">Checkout</span>
        </div>
    </div>
</div>

<!-- Checkout Progress -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-center gap-3 md:gap-6">
            <!-- Step 1: Alamat (Active) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-xs font-semibold">1</div>
                <span class="font-medium text-xs text-[#B08968]">Alamat</span>
            </div>
            <div class="w-8 h-px bg-gray-200"></div>
            
            <!-- Step 2: Pengiriman -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center text-xs font-semibold">2</div>
                <span class="font-medium text-xs text-gray-400">Pengiriman</span>
            </div>
            <div class="w-8 h-px bg-gray-200"></div>
            
            <!-- Step 3: Pembayaran -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center text-xs font-semibold">3</div>
                <span class="font-medium text-xs text-gray-400">Pembayaran</span>
            </div>
        </div>
    </div>
</div>

<!-- Form Alamat -->
<div class="bg-white py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-5 py-3 border-b border-gray-100">
                <h2 class="text-base font-bold text-gray-900">Informasi Alamat</h2>
            </div>
            
            <!-- Info Produk Ringkas -->
            <div class="px-5 py-3 bg-gray-50 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-sm text-gray-900">{{ $produk->nama_produk }}</h3>
                        <p class="text-xs text-gray-500">Rp {{ number_format($produk->harga, 0, ',', '.') }} (estimasi /meter)</p>
                    </div>
                </div>
            </div>
            
            <!-- Catatan Custom -->
            <div class="px-5 py-2.5 bg-amber-50 border-b border-amber-100">
                <div class="flex items-center gap-2 text-amber-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-xs font-medium">Harga final akan ditentukan setelah survey dan pengukuran oleh tim kami.</p>
                </div>
            </div>
            
            <!-- Form -->
            <form action="{{ route('pesan.store.alamat') }}" method="POST" class="p-5">
                @csrf
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Lengkap -->
                    <div class="md:col-span-2">
                        <label for="nama_lengkap" class="block text-xs font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" 
                               id="nama_lengkap" 
                               name="nama_lengkap" 
                               value="{{ old('nama_lengkap') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                               placeholder="Masukkan nama lengkap">
                        @error('nama_lengkap')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                               placeholder="contoh@email.com">
                        @error('email')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- No WhatsApp -->
                    <div>
                        <label for="no_wa" class="block text-xs font-medium text-gray-700 mb-1">No WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" 
                               id="no_wa" 
                               name="no_wa" 
                               value="{{ old('no_wa') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                               placeholder="081234567890">
                        @error('no_wa')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Kota -->
                    <div>
                        <label for="kota" class="block text-xs font-medium text-gray-700 mb-1">Kota <span class="text-red-500">*</span></label>
                        <input type="text" 
                               id="kota" 
                               name="kota" 
                               value="{{ old('kota') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                               placeholder="Contoh: Surabaya">
                        @error('kota')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Kecamatan -->
                    <div>
                        <label for="kecamatan" class="block text-xs font-medium text-gray-700 mb-1">Kecamatan <span class="text-red-500">*</span></label>
                        <input type="text" 
                               id="kecamatan" 
                               name="kecamatan" 
                               value="{{ old('kecamatan') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                               placeholder="Contoh: Sukolilo">
                        @error('kecamatan')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Alamat Lengkap -->
                    <div class="md:col-span-2">
                        <label for="alamat_lengkap" class="block text-xs font-medium text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea id="alamat_lengkap" 
                                  name="alamat_lengkap" 
                                  rows="2"
                                  required
                                  class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                                  placeholder="Nama jalan, nomor rumah, RT/RW, dsb.">{{ old('alamat_lengkap') }}</textarea>
                        @error('alamat_lengkap')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Catatan Tambahan -->
                    <div class="md:col-span-2">
                        <label for="catatan" class="block text-xs font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                        <textarea id="catatan" 
                                  name="catatan" 
                                  rows="2"
                                  class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50"
                                  placeholder="Contoh: preferensi bahan, warna, atau permintaan khusus lainnya">{{ old('catatan') }}</textarea>
                    </div>
                </div>
                
                <!-- Info Jadwal Survey -->
                <div class="mt-5 p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#B08968] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-xs font-medium text-gray-700">Jadwal Survey</p>
                            <p class="text-[11px] text-gray-500 mt-0.5">Tim kami akan menghubungi Anda via WhatsApp dalam 1x24 jam untuk menentukan jadwal survey dan pengukuran.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tombol Submit -->
                <div class="mt-6">
                    <button type="submit" 
                            class="w-full bg-[#B08968] text-white font-semibold py-2.5 px-4 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-md hover:shadow-lg text-sm">
                        Lanjutkan Ke Pengiriman
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection