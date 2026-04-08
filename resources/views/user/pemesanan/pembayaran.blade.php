@extends('layouts.frontend')

@section('title', 'Checkout - Pembayaran')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968]">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968]">Katalog</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">Checkout - Pembayaran</span>
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
            
            <!-- Step 2: Pengiriman (Completed) -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-semibold">✓</div>
                <span class="font-medium text-green-600">Pengiriman</span>
            </div>
            <div class="w-12 h-0.5 bg-green-500"></div>
            
            <!-- Step 3: Pembayaran (Active) -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-[#B08968] text-white rounded-full flex items-center justify-center font-semibold">3</div>
                <span class="font-medium text-[#B08968]">Pembayaran</span>
            </div>
        </div>
    </div>
</div>

<!-- Halaman Pembayaran -->
<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tab Metode Pembayaran -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-8">
            <div class="border-b border-gray-200">
                <div class="flex">
                    <button id="tabQRIS" 
                            class="flex-1 py-4 text-center font-semibold text-gray-700 hover:text-[#B08968] border-b-2 border-transparent hover:border-[#B08968] transition">
                        QRIS
                    </button>
                    <button id="tabTransfer" 
                            class="flex-1 py-4 text-center font-semibold text-gray-700 hover:text-[#B08968] border-b-2 border-transparent hover:border-[#B08968] transition">
                        Transfer Bank
                    </button>
                </div>
            </div>
            
            <!-- PANEL QRIS -->
            <div id="panelQRIS" class="p-6">
                <div class="text-center">
                    <div class="bg-gray-100 w-64 h-64 mx-auto rounded-2xl flex items-center justify-center mb-4">
                        <!-- Placeholder QR Code -->
                        <div class="text-center">
                            <svg class="w-32 h-32 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4M12 4h4M4 4h4M4 20h4M12 20h4M4 12h2M12 12h2M20 12h2M12 12h2M12 4h2"></path>
                            </svg>
                            <p class="text-sm text-gray-500 mt-2">QRIS Code</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Scan QR Code menggunakan aplikasi mobile banking atau e-wallet</p>
                    
                    <!-- Ringkasan Pembayaran -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Toko:</span>
                            <span class="font-medium text-gray-900">541 Furniture</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Total:</span>
                            <span class="text-xl font-bold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <form action="#" method="POST" id="formQRIS">
                        @csrf
                        <input type="hidden" name="metode" value="qris">
                        <button type="submit" 
                                class="w-full bg-[#B08968] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-md">
                            Konfirmasi Pembayaran
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- PANEL TRANSFER BANK -->
            <div id="panelTransfer" class="p-6 hidden">
                <!-- Rincian Pembayaran -->
                <div class="bg-gray-50 rounded-xl p-4 mb-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Rincian Pembayaran</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nama Bank</span>
                            <span class="font-medium text-gray-900">BCA / Mandiri / BRI</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Atas Nama</span>
                            <span class="font-medium text-gray-900">541 Furniture</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Pembayaran</span>
                            <span class="font-bold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Batas Pembayaran</span>
                            <span class="font-medium text-gray-900">24 Jam</span>
                        </div>
                    </div>
                </div>
                
                <!-- Input Tanggal Transfer -->
                <div class="bg-white border border-gray-200 rounded-xl p-4 mb-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Tanggal Transfer</h3>
                    <div class="grid grid-cols-4 gap-3">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Bulan</label>
                            <select id="bulanTransfer" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#B08968] focus:border-[#B08968]">
                                @for($i = 1; $i <= 12; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Tanggal</label>
                            <select id="tanggalTransfer" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#B08968] focus:border-[#B08968]">
                                @for($i = 1; $i <= 31; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Tahun</label>
                            <select id="tahunTransfer" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#B08968] focus:border-[#B08968]">
                                @for($i = date('Y'); $i <= date('Y') + 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Jam</label>
                            <input type="time" id="jamTransfer" value="12:00" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#B08968] focus:border-[#B08968]">
                        </div>
                    </div>
                </div>
                
                <!-- Upload Bukti Pembayaran -->
                <div class="bg-white border border-gray-200 rounded-xl p-4 mb-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Upload Bukti Pembayaran</h3>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#B08968] transition cursor-pointer" id="uploadArea">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        <p class="text-gray-600">Klik untuk upload bukti pembayaran</p>
                        <p class="text-xs text-gray-400 mt-1">Format JPG, PNG, PDF (Max 2MB)</p>
                        <input type="file" id="buktiBayar" class="hidden" accept="image/*,.pdf">
                    </div>
                    <div id="fileNameDisplay" class="text-sm text-gray-600 mt-2 text-center hidden">
                        File terpilih: <span id="fileName"></span>
                    </div>
                </div>
                
                <!-- Tombol Bayar -->
                <form action="#" method="POST" id="formTransfer">
                    @csrf
                    <input type="hidden" name="metode" value="transfer">
                    <input type="hidden" name="tanggal_transfer" id="tanggalTransferInput">
                    <input type="hidden" name="bukti_pembayaran" id="buktiPath">
                    <button type="submit" 
                            class="w-full bg-[#B08968] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-md">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Ringkasan Pesanan -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Ringkasan Pesanan</h2>
            </div>
            <div class="p-6">
                <div class="flex gap-4 mb-4">
                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900">{{ $produk->nama_produk }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Ongkos Kirim</span>
                        <span class="font-medium">Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-gray-200">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-xl font-bold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tombol Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('pesan.pengiriman') }}" class="text-gray-500 hover:text-[#B08968] text-sm">
                ← Kembali ke halaman pengiriman
            </a>
        </div>
    </div>
</div>

<!-- JavaScript untuk Tab dan Upload -->
<script>
    // Tab switching
    const tabQRIS = document.getElementById('tabQRIS');
    const tabTransfer = document.getElementById('tabTransfer');
    const panelQRIS = document.getElementById('panelQRIS');
    const panelTransfer = document.getElementById('panelTransfer');
    
    function setActiveTab(active) {
        if (active === 'qris') {
            tabQRIS.classList.add('text-[#B08968]', 'border-[#B08968]');
            tabQRIS.classList.remove('text-gray-700', 'border-transparent');
            tabTransfer.classList.remove('text-[#B08968]', 'border-[#B08968]');
            tabTransfer.classList.add('text-gray-700', 'border-transparent');
            panelQRIS.classList.remove('hidden');
            panelTransfer.classList.add('hidden');
        } else {
            tabTransfer.classList.add('text-[#B08968]', 'border-[#B08968]');
            tabTransfer.classList.remove('text-gray-700', 'border-transparent');
            tabQRIS.classList.remove('text-[#B08968]', 'border-[#B08968]');
            tabQRIS.classList.add('text-gray-700', 'border-transparent');
            panelTransfer.classList.remove('hidden');
            panelQRIS.classList.add('hidden');
        }
    }
    
    tabQRIS.addEventListener('click', () => setActiveTab('qris'));
    tabTransfer.addEventListener('click', () => setActiveTab('transfer'));
    
    // Upload file
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('buktiBayar');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const fileNameSpan = document.getElementById('fileName');
    
    uploadArea.addEventListener('click', () => fileInput.click());
    
    fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            fileNameSpan.textContent = file.name;
            fileNameDisplay.classList.remove('hidden');
            uploadArea.classList.add('border-[#B08968]', 'bg-[#B08968]/5');
        }
    });
    
    // Set tanggal transfer hidden input
    document.getElementById('formTransfer')?.addEventListener('submit', function(e) {
        const bulan = document.getElementById('bulanTransfer').value;
        const tanggal = document.getElementById('tanggalTransfer').value;
        const tahun = document.getElementById('tahunTransfer').value;
        const jam = document.getElementById('jamTransfer').value;
        document.getElementById('tanggalTransferInput').value = `${tahun}-${bulan}-${tanggal} ${jam}`;
    });
</script>
@endsection