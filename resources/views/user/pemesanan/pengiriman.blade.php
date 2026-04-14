@extends('layouts.frontend')

@section('title', 'Checkout - Pengiriman')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968]">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968]">Katalog</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('produk.detail', $produk->slug ?? '#') }}" class="text-gray-500 hover:text-[#B08968]">{{ $produk->nama_produk ?? 'Produk' }}</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">Checkout - Pengiriman</span>
        </div>
    </div>
</div>

<!-- Checkout Progress -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-center gap-3 md:gap-6">
            <!-- Step 1: Alamat (Selesai) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-semibold">✓</div>
                <span class="font-medium text-xs text-green-600">Alamat</span>
            </div>
            <div class="w-8 h-px bg-green-500"></div>
            
            <!-- Step 2: Pengiriman (Aktif) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-xs font-semibold">2</div>
                <span class="font-medium text-xs text-[#B08968]">Pengiriman</span>
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

<div class="bg-white py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Alamat Pengiriman -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-5">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-5 py-3 border-b border-gray-100">
                        <h2 class="text-base font-bold text-gray-900">Alamat Pengiriman</h2>
                    </div>
                    
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-[#B08968]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm text-gray-800">{{ $alamat['nama_lengkap'] }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $alamat['email'] }} • {{ $alamat['no_wa'] }}</p>
                                <p class="text-xs text-gray-500 mt-1.5">
                                    {{ $alamat['alamat_lengkap'] }}<br>
                                    {{ $alamat['kecamatan'] }}, {{ $alamat['kota'] }}
                                </p>
                                @if(!empty($alamat['catatan']))
                                    <p class="text-xs text-gray-400 mt-1 italic">Catatan: {{ $alamat['catatan'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pilihan Kurir -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-5 py-3 border-b border-gray-100">
                        <h2 class="text-base font-bold text-gray-900">Pilih Kurir</h2>
                    </div>
                    
                    <form action="{{ route('pesan.store.pengiriman') }}" method="POST" id="formPengiriman">
                        @csrf
                        
                        <div class="p-4 space-y-3">
                            <!-- JNE Reguler -->
                            <label class="block border border-gray-100 rounded-lg p-3 cursor-pointer hover:border-[#B08968] transition has-[:checked]:border-[#B08968] has-[:checked]:bg-[#B08968]/5">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="kurir" value="jne_reguler" class="w-4 h-4 text-[#B08968] focus:ring-[#B08968]" checked required>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <span class="font-medium text-sm text-gray-800">JNE Reguler</span>
                                            <span class="font-semibold text-sm text-[#B08968]">Rp 50.000</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-0.5">Estimasi 4-7 hari kerja</p>
                                    </div>
                                </div>
                            </label>
                            
                            <!-- Cargo Furniture -->
                            <label class="block border border-gray-100 rounded-lg p-3 cursor-pointer hover:border-[#B08968] transition has-[:checked]:border-[#B08968] has-[:checked]:bg-[#B08968]/5">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="kurir" value="cargo_furniture" class="w-4 h-4 text-[#B08968] focus:ring-[#B08968]" required>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <span class="font-medium text-sm text-gray-800">Cargo Furniture</span>
                                            <span class="font-semibold text-sm text-[#B08968]">Rp 150.000</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-0.5">Estimasi 3-5 hari kerja (khusus furniture)</p>
                                    </div>
                                </div>
                            </label>
                            
                            <input type="hidden" name="biaya_pengiriman" id="biaya_pengiriman" value="50000">
                        </div>
                        
                        <!-- Ringkasan Pembayaran -->
                        <div class="border-t border-gray-100 px-4 py-3 bg-gray-50">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs text-gray-500">Subtotal</span>
                                <span class="font-medium text-xs text-gray-700">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs text-gray-500">Ongkos Kirim</span>
                                <span class="font-medium text-xs text-gray-700" id="displayOngkir">Rp 50.000</span>
                            </div>
                            <div class="flex items-center justify-between pt-1.5 border-t border-gray-200 mt-1.5">
                                <span class="text-sm font-bold text-gray-800">Total</span>
                                <span class="text-base font-bold text-[#B08968]" id="totalBayar">Rp {{ number_format($produk->harga + 50000, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <!-- Tombol Lanjut -->
                        <div class="px-4 py-3 border-t border-gray-100">
                            <button type="submit" 
                                    class="w-full bg-[#B08968] text-white font-semibold py-2.5 px-4 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-sm text-sm">
                                Lanjutkan ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Kolom Kanan: Ringkasan Produk -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 sticky top-20">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-5 py-3 border-b border-gray-100">
                        <h2 class="text-base font-bold text-gray-900">Ringkasan Produk</h2>
                    </div>
                    
                    <div class="p-4">
                        <div class="flex gap-3 mb-3">
                            <div class="w-14 h-14 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                                     alt="{{ $produk->nama_produk }}"
                                     class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm text-gray-800">{{ $produk->nama_produk }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">Jumlah: 1</p>
                                <p class="text-xs font-semibold text-[#B08968] mt-1">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-3">
                            <h3 class="font-medium text-xs text-gray-700 mb-2">Metode Pembayaran</h3>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">QRIS</span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">TRANSFER</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Update biaya pengiriman dan total berdasarkan pilihan kurir
document.querySelectorAll('input[name="kurir"]').forEach(radio => {
    radio.addEventListener('change', function() {
        let biaya = this.value === 'jne_reguler' ? 50000 : 150000;
        document.getElementById('biaya_pengiriman').value = biaya;
        document.getElementById('displayOngkir').innerText = 'Rp ' + biaya.toLocaleString('id-ID');
        
        let subtotal = {{ $produk->harga }};
        let total = subtotal + biaya;
        document.getElementById('totalBayar').innerText = 'Rp ' + total.toLocaleString('id-ID');
    });
});
</script>
@endsection