@extends('layouts.frontend')

@section('title', 'Checkout - Pembayaran')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968]">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968]">Katalog</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">Checkout - Pembayaran</span>
        </div>
    </div>
</div>

<!-- Checkout Progress -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-center gap-3 md:gap-6">
            <!-- Step 1: Alamat (Completed) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-semibold">✓</div>
                <span class="font-medium text-xs text-green-600">Alamat</span>
            </div>
            <div class="w-8 h-px bg-green-500"></div>
            
            <!-- Step 2: Pengiriman (Completed) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-semibold">✓</div>
                <span class="font-medium text-xs text-green-600">Pengiriman</span>
            </div>
            <div class="w-8 h-px bg-green-500"></div>
            
            <!-- Step 3: Pembayaran (Active) -->
            <div class="flex items-center gap-1.5">
                <div class="w-6 h-6 bg-[#B08968] text-white rounded-full flex items-center justify-center text-xs font-semibold">3</div>
                <span class="font-medium text-xs text-[#B08968]">Pembayaran</span>
            </div>
        </div>
    </div>
</div>

<!-- Halaman Pembayaran -->
<div class="bg-white py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tab Metode Pembayaran -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-6">
            <div class="border-b border-gray-100">
                <div class="flex">
                    <button id="tabQRIS" 
                            class="flex-1 py-3 text-center font-medium text-sm text-gray-600 hover:text-[#B08968] border-b-2 border-transparent hover:border-[#B08968] transition">
                        QRIS
                    </button>
                    <button id="tabTransfer" 
                            class="flex-1 py-3 text-center font-medium text-sm text-gray-600 hover:text-[#B08968] border-b-2 border-transparent hover:border-[#B08968] transition">
                        Transfer Bank
                    </button>
                </div>
            </div>
            
            <!-- PANEL QRIS -->
            <div id="panelQRIS" class="p-5">
                <div class="text-center">
                    <div class="bg-gray-100 w-48 h-48 mx-auto rounded-xl flex items-center justify-center mb-3">
                        <div class="text-center">
                            <svg class="w-24 h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4M12 4h4M4 4h4M4 20h4M12 20h4M4 12h2M12 12h2M20 12h2M12 12h2M12 4h2"></path>
                            </svg>
                            <p class="text-xs text-gray-500 mt-1">QRIS Code</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mb-3">Scan QR Code menggunakan aplikasi mobile banking atau e-wallet</p>
                    
                    <!-- Ringkasan Pembayaran -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex justify-between mb-1.5">
                            <span class="text-xs text-gray-500">Toko:</span>
                            <span class="font-medium text-sm text-gray-800">541 Furniture</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Total:</span>
                            <span class="text-lg font-bold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <form action="#" method="POST" id="formQRIS">
                        @csrf
                        <input type="hidden" name="metode" value="qris">
                        <button type="submit" 
                                class="w-full bg-[#B08968] text-white font-semibold py-2.5 px-4 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-sm text-sm">
                            Konfirmasi Pembayaran
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- PANEL TRANSFER BANK -->
            <div id="panelTransfer" class="p-5 hidden">
                <!-- Rincian Pembayaran -->
                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                    <h3 class="font-semibold text-sm text-gray-800 mb-2">Rincian Pembayaran</h3>
                    <div class="space-y-1.5">
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Nama Bank</span>
                            <span class="font-medium text-gray-700">BCA / Mandiri / BRI</span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Atas Nama</span>
                            <span class="font-medium text-gray-700">541 Furniture</span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Jumlah Pembayaran</span>
                            <span class="font-semibold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Batas Pembayaran</span>
                            <span class="font-medium text-gray-700">24 Jam</span>
                        </div>
                    </div>
                </div>
                
                <!-- Input Tanggal Transfer -->
                <div class="bg-white border border-gray-100 rounded-lg p-3 mb-4">
                    <h3 class="font-semibold text-sm text-gray-800 mb-2">Tanggal Transfer</h3>
                    <div class="grid grid-cols-4 gap-2">
                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Bulan</label>
                            <select id="bulanTransfer" class="w-full px-2 py-1.5 text-xs border border-gray-200 rounded-md focus:ring-[#B08968] focus:border-[#B08968] bg-gray-50">
                                @for($i = 1; $i <= 12; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Tanggal</label>
                            <select id="tanggalTransfer" class="w-full px-2 py-1.5 text-xs border border-gray-200 rounded-md focus:ring-[#B08968] focus:border-[#B08968] bg-gray-50">
                                @for($i = 1; $i <= 31; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Tahun</label>
                            <select id="tahunTransfer" class="w-full px-2 py-1.5 text-xs border border-gray-200 rounded-md focus:ring-[#B08968] focus:border-[#B08968] bg-gray-50">
                                @for($i = date('Y'); $i <= date('Y') + 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Jam</label>
                            <input type="time" id="jamTransfer" value="12:00" class="w-full px-2 py-1.5 text-xs border border-gray-200 rounded-md focus:ring-[#B08968] focus:border-[#B08968] bg-gray-50">
                        </div>
                    </div>
                </div>
                
                <!-- Upload Bukti Pembayaran -->
                <div class="bg-white border border-gray-100 rounded-lg p-3 mb-4">
                    <h3 class="font-semibold text-sm text-gray-800 mb-2">Upload Bukti Pembayaran</h3>
                    <div class="border border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-[#B08968] transition cursor-pointer" id="uploadArea">
                        <svg class="w-8 h-8 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        <p class="text-xs text-gray-500">Klik untuk upload bukti pembayaran</p>
                        <p class="text-[10px] text-gray-400 mt-1">Format JPG, PNG, PDF (Max 2MB)</p>
                        <input type="file" id="buktiBayar" class="hidden" accept="image/*,.pdf">
                    </div>
                    <div id="fileNameDisplay" class="text-xs text-gray-500 mt-2 text-center hidden">
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
                            class="w-full bg-[#B08968] text-white font-semibold py-2.5 px-4 rounded-lg hover:bg-[#8B6F4F] transition duration-300 shadow-sm text-sm">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Ringkasan Pesanan -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-5 py-3 border-b border-gray-100">
                <h2 class="text-base font-bold text-gray-900">Ringkasan Pesanan</h2>
            </div>
            <div class="p-4">
                <div class="flex gap-3 mb-3">
                    <div class="w-14 h-14 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-sm text-gray-800">{{ $produk->nama_produk }}</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="border-t border-gray-100 pt-3 space-y-1.5">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-medium text-gray-700">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Ongkos Kirim</span>
                        <span class="font-medium text-gray-700">Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between pt-1.5 border-t border-gray-100">
                        <span class="text-sm font-bold text-gray-800">Total</span>
                        <span class="text-base font-bold text-[#B08968]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tombol Kembali -->
        <div class="mt-5 text-center">
            <a href="{{ route('pesan.pengiriman') }}" class="text-gray-400 hover:text-[#B08968] text-xs">
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
            tabQRIS.classList.remove('text-gray-600', 'border-transparent');
            tabTransfer.classList.remove('text-[#B08968]', 'border-[#B08968]');
            tabTransfer.classList.add('text-gray-600', 'border-transparent');
            panelQRIS.classList.remove('hidden');
            panelTransfer.classList.add('hidden');
        } else {
            tabTransfer.classList.add('text-[#B08968]', 'border-[#B08968]');
            tabTransfer.classList.remove('text-gray-600', 'border-transparent');
            tabQRIS.classList.remove('text-[#B08968]', 'border-[#B08968]');
            tabQRIS.classList.add('text-gray-600', 'border-transparent');
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