@extends('layouts.frontend')

@section('title', 'Status Pesanan - ' . $pesanan->kode_invoice)

@section('content')
<div class="bg-white py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-xl font-bold text-gray-900 mb-1">Status Pesanan</h1>
            <p class="text-xs text-gray-500">Nomor Pesanan: {{ $pesanan->kode_invoice }}</p>
            <div class="mt-2">
                {!! $pesanan->status_badge !!}
            </div>
        </div>
        
        <!-- Timeline Status -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-6">
            <h2 class="text-sm font-semibold text-gray-800 mb-4">Perkembangan Pesanan</h2>
            
            <div class="relative">
                <!-- Garis vertikal -->
                <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                
                @foreach($timeline as $index => $step)
                    @php
                        $isCompleted = $step['time'] !== null;
                        $isCurrent = $step['status'] === $pesanan->status_pesanan;
                    @endphp
                    
                    <div class="relative flex items-start gap-3 mb-6 last:mb-0">
                        <!-- Icon Circle -->
                        <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $isCompleted ? 'bg-green-500 text-white shadow-md' : 'bg-gray-100 text-gray-400' }}">
                            {{ $step['icon'] }}
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 pb-2 {{ !$isCompleted ? 'opacity-60' : '' }}">
                            <div class="flex flex-wrap justify-between items-center gap-2">
                                <h3 class="text-sm font-semibold {{ $isCurrent ? 'text-[#B08968]' : 'text-gray-800' }}">
                                    {{ $step['label'] }}
                                    @if($isCurrent)
                                        <span class="ml-2 text-[10px] bg-[#B08968]/10 text-[#B08968] px-1.5 py-0.5 rounded-full">Saat Ini</span>
                                    @endif
                                </h3>
                                @if($step['time'])
                                    <span class="text-[10px] text-gray-400">
                                        {{ \Carbon\Carbon::parse($step['time'])->translatedFormat('d F Y, H:i') }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 mt-1">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Detail Pesanan -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 px-4 py-2.5 border-b border-gray-100">
                <h2 class="text-sm font-semibold text-gray-800">Detail Pesanan</h2>
            </div>
            
            <div class="p-4 space-y-4">
                <!-- Produk -->
                @foreach($pesanan->detailPesanan as $detail)
                <div class="flex gap-3">
                    <div class="w-14 h-14 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('images/' . ($detail->produk->gambar_utama ?? 'imagemeja.jpeg')) }}" 
                             alt="{{ $detail->produk->nama_produk }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-sm text-gray-800">{{ $detail->produk->nama_produk }}</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Jumlah: {{ $detail->jumlah }}</p>
                        <p class="text-xs font-semibold text-[#B08968] mt-1">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
                
                <!-- Rincian Harga -->
                <div class="border-t border-gray-100 pt-3 space-y-1.5">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="text-gray-700">Rp {{ number_format($pesanan->detailPesanan->sum('subtotal'), 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500">Ongkos Kirim</span>
                        <span class="text-gray-700">Rp {{ number_format($pesanan->total_harga - $pesanan->detailPesanan->sum('subtotal'), 0, ',', '.') }}</span>
                    </div>
                    <div class="border-t border-gray-100 pt-2 mt-1">
                        <div class="flex justify-between">
                            <span class="font-semibold text-sm text-gray-800">Total</span>
                            <span class="text-base font-bold text-[#B08968]">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Pengiriman -->
                <div class="bg-gray-50 rounded-lg p-3">
                    <h4 class="text-xs font-semibold text-gray-800 mb-1.5">Informasi Pengiriman</h4>
                    <p class="text-xs text-gray-600">{{ $pesanan->nama_pelanggan }}</p>
                    <p class="text-xs text-gray-600">{{ $pesanan->alamat_lengkap }}</p>
                    <p class="text-xs text-gray-600 mt-1">Kurir: {{ ucfirst(str_replace('_', ' ', $pesanan->kurir)) }}</p>
                    <p class="text-xs text-gray-600 mt-1">📞 {{ $pesanan->no_wa }}</p>
                </div>
                
                <!-- Metode Pembayaran -->
                <div class="flex justify-between text-xs pt-1">
                    <span class="text-gray-500">Metode Pembayaran</span>
                    <span class="font-medium text-gray-700 uppercase">{{ $pesanan->metode_pembayaran ?? 'Belum dipilih' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ route('tracking.index') }}" 
               class="flex-1 border border-[#B08968] text-[#B08968] text-center py-2.5 rounded-lg text-sm font-semibold hover:bg-[#B08968] hover:text-white transition">
                Cek Pesanan Lain
            </a>
            <a href="{{ route('beranda') }}" 
               class="flex-1 bg-[#B08968] text-white text-center py-2.5 rounded-lg text-sm font-semibold hover:bg-[#8B6F4F] transition">
                Kembali ke Beranda
            </a>
        </div>
        
        <!-- Catatan -->
        <p class="text-center text-[11px] text-gray-400 mt-5">
            *Status pesanan akan diperbarui oleh admin secara berkala
        </p>
    </div>
</div>
@endsection