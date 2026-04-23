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
                        <p class="text-xs text-gray-500">Harga akan ditentukan setelah survey & pengukuran</p>
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
            <form action="{{ route('pesan.store.alamat') }}" method="POST" class="p-5" id="checkoutForm">
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
                        KIRIM PESANAN
                    </button>
                </div>
                
                <!-- Tombol Hapus Data Tersimpan -->
                <div class="mt-3 text-center">
                    <button type="button" 
                            id="resetDataBtn"
                            class="text-xs text-red-400 hover:text-red-600 transition">
                        Hapus Data Tersimpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // KEY untuk menyimpan di localStorage
    const STORAGE_KEY = 'guest_checkout_data';
    
    function loadSavedData() {
        const savedData = localStorage.getItem(STORAGE_KEY);
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                if (data.nama_lengkap && !document.getElementById('nama_lengkap').value) 
                    document.getElementById('nama_lengkap').value = data.nama_lengkap;
                if (data.email && !document.getElementById('email').value) 
                    document.getElementById('email').value = data.email;
                if (data.no_wa && !document.getElementById('no_wa').value) 
                    document.getElementById('no_wa').value = data.no_wa;
                if (data.kota && !document.getElementById('kota').value) 
                    document.getElementById('kota').value = data.kota;
                if (data.kecamatan && !document.getElementById('kecamatan').value) 
                    document.getElementById('kecamatan').value = data.kecamatan;
                if (data.alamat_lengkap && !document.getElementById('alamat_lengkap').value) 
                    document.getElementById('alamat_lengkap').value = data.alamat_lengkap;
                if (data.catatan && !document.getElementById('catatan').value) 
                    document.getElementById('catatan').value = data.catatan;
            } catch (e) {
                console.error('Error loading saved data:', e);
            }
        }
    }
    
    function saveFormData() {
        const formData = {
            nama_lengkap: document.getElementById('nama_lengkap').value,
            email: document.getElementById('email').value,
            no_wa: document.getElementById('no_wa').value,
            kota: document.getElementById('kota').value,
            kecamatan: document.getElementById('kecamatan').value,
            alamat_lengkap: document.getElementById('alamat_lengkap').value,
            catatan: document.getElementById('catatan').value,
            last_updated: new Date().toISOString()
        };
        localStorage.setItem(STORAGE_KEY, JSON.stringify(formData));
    }
    
    function resetSavedData() {
        if (confirm('Apakah Anda yakin ingin menghapus semua data alamat tersimpan?')) {
            localStorage.removeItem(STORAGE_KEY);
            document.getElementById('nama_lengkap').value = '';
            document.getElementById('email').value = '';
            document.getElementById('no_wa').value = '';
            document.getElementById('kota').value = '';
            document.getElementById('kecamatan').value = '';
            document.getElementById('alamat_lengkap').value = '';
            document.getElementById('catatan').value = '';
            alert('Data tersimpan telah dihapus!');
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        loadSavedData();
        
        const inputIds = ['nama_lengkap', 'email', 'no_wa', 'kota', 'kecamatan', 'alamat_lengkap', 'catatan'];
        inputIds.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener('input', saveFormData);
                input.addEventListener('change', saveFormData);
            }
        });
        
        const resetBtn = document.getElementById('resetDataBtn');
        if (resetBtn) {
            resetBtn.addEventListener('click', resetSavedData);
        }
    });
    
    const checkoutForm = document.getElementById('checkoutForm');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function() {
            saveFormData();
        });
    }
</script>
@endsection