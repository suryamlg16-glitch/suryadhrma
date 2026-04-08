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
            <span class="text-[#B08968] font-medium">Checkout - Pengiriman</span>
        </div>
    </div>
</div>

<!-- Checkout Progress -->
<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-center gap-4 md:gap-8">
            <!-- Step 1: Alamat (Completed) -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-semibold">✓</div>
                <span class="font-medium text-green-600">Alamat</span>
            </div>
            <div class="w-12 h-0.5 bg-green-500"></div>
            
            <!-- Step 2: Pengiriman (Active) -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-[#B08968] text-white rounded-full flex items-center justify-center font-semibold">2</div>
                <span class="font-medium text-[#B08968]">Pengiriman</span>
            </div>
            <div class="w-12 h-0.5 bg-gray-300"></div>
            
            <!-- Step 3: Pembayaran -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold">3</div>
                <span class="font-medium text-gray-500">Pembayaran</span>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Alamat Pengiriman -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-6">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Alamat Pengiriman</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[#B08968]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $alamat['nama_lengkap'] }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $alamat['email'] }} • {{ $alamat['no_wa'] }}</p>
                                <p class="text-sm text-gray-600 mt-2">
                                    {{ $alamat['alamat_lengkap'] }}<br>
                                    {{ $alamat['kecamatan'] }}, {{ $alamat['kota'] }}
                                </p>
                                @if(!empty($alamat['catatan']))
                                    <p class="text-sm text-gray-500 mt-2 italic">Catatan: {{ $alamat['catatan'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pilihan Pengiriman -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Pilih Kurir</h2>
                    </div>
                    
                    <form action="{{ route('pesan.store.pengiriman') }}" method="POST" id="formPengiriman">
                        @csrf
                        
                        <div class="p-6 space-y-4">
                            <!-- JNE Reguler -->
                            <label class="block border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-[#B08968] transition has-[:checked]:border-[#B08968] has-[:checked]:bg-[#B08968]/5">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="kurir" value="jne_reguler" class="w-5 h-5 text-[#B08968] focus:ring-[#B08968]" checked required>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <span class="font-semibold text-gray-900">JNE Reguler</span>
                                            <span class="font-bold text-[#B08968]">Rp 50.000</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Estimasi 4-7 hari kerja</p>
                                    </div>
                                </div>
                            </label>
                            
                            <!-- Cargo Furniture -->
                            <label class="block border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-[#B08968] transition has-[:checked]:border-[#B08968] has-[:checked]:bg-[#B08968]/5">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="kurir" value="cargo_furniture" class="w-5 h-5 text-[#B08968] focus:ring-[#B08968]" required>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <span class="font-semibold text-gray-900">Cargo Furniture</span>
                                            <span class="font-bold text-[#B08968]">Rp 150.000</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Estimasi 3-5 hari kerja (khusus furniture)</p>
                                    </div>
                                </div>
                            </label>
                            
                            <input type="hidden" name="biaya_pengiriman" id="biaya_pengiriman" value="50000">
                        </div>
                        
                        <!-- Metode Pembayaran Preview -->
                        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-900">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-600">Ongkos Kirim</span>
                                <span class="font-semibold text-gray-900" id="displayOngkir">Rp 50.000</span>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-gray-200 mt-2">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-[#B08968]" id="totalBayar">Rp {{ number_format($produk->harga + 50000, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <!-- Tombol Lanjut -->
                        <div class="px-6 py-4 border-t border-gray-200">
                            <button type="submit" 
                                    class="w-full bg-[#B08968] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-md hover:shadow-lg">
                                Lanjutkan Ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Kolom Kanan: Ringkasan Produk -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 sticky top-24">
                    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Ringkasan Produk</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex gap-4 mb-4">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                                     alt="{{ $produk->nama_produk }}"
                                     class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $produk->nama_produk }}</h3>
                                <p class="text-sm text-gray-500 mt-1">Qty : 1</p>
                                <p class="text-[#B08968] font-bold mt-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="font-semibold text-gray-900 mb-3">Metode Pembayaran</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-full">COD</span>
                                <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-full">QRIS</span>
                                <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-full">TF BANK</span>
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