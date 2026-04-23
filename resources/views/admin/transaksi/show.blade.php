@extends('admin.layout')

@section('title', 'Detail Transaksi')
@section('header', 'Detail Transaksi')
@section('subheader', 'Detail transaksi dari pesanan yang sudah deal')

@section('content')
<div class="space-y-4">
    <!-- Status Banner -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between flex-wrap gap-3">
            <div>
                <span class="text-xs text-gray-500">KODE TRANSAKSI</span>
                <h2 class="text-xl font-bold text-gray-800">{{ $transaksi->kode_transaksi }}</h2>
            </div>
            <div class="flex items-center gap-4">
                <div>
                    <span class="text-xs text-gray-500">Status</span>
                    <div>
                        @if($transaksi->status == 'sukses')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">
                                <i class="fas fa-check-circle"></i> Lunas
                            </span>
                        @elseif($transaksi->status == 'pending')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-xs">
                                <i class="fas fa-clock"></i> Menunggu Pembayaran
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs">
                                <i class="fas fa-times-circle"></i> Gagal
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="text-xs text-gray-500">Tanggal Transaksi</span>
                    <p class="font-medium text-gray-800">{{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            <a href="{{ route('admin.transaksi.index') }}" class="text-[#B08968] hover:text-[#8B6F4F] text-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Informasi Transaksi -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-info-circle text-[#B08968] mr-2"></i> Informasi Transaksi
                </h3>
            </div>
            <div class="p-4 space-y-3">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <p class="text-[10px] text-gray-500">Kode Transaksi</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->kode_transaksi }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Metode Pembayaran</p>
                        <p class="font-medium text-gray-800 text-sm">Transfer Bank</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Total Harga Deal</p>
                        <p class="font-bold text-[#B08968] text-lg">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Jumlah Dibayar</p>
                        <p class="font-medium text-green-600 text-lg">Rp {{ number_format($transaksi->jumlah_dibayar, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Sisa Tagihan</p>
                        <p class="font-medium text-red-600 text-lg">Rp {{ number_format($transaksi->sisa_tagihan, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Tanggal Pembayaran</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->tanggal_pembayaran ? $transaksi->tanggal_pembayaran->format('d/m/Y H:i') : '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Termin</p>
                        <p class="font-medium text-gray-800 text-sm">
                            @if($transaksi->termin == 'dp') 💰 DP 30%
                            @elseif($transaksi->termin == 'termin2') 🔧 Termin 30%
                            @else ✅ Pelunasan 40%
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Persentase</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->persentase ?? 0 }}%</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informasi Pesanan Terkait -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-shopping-cart text-[#B08968] mr-2"></i> Informasi Pesanan
                </h3>
            </div>
            <div class="p-4 space-y-3">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <p class="text-[10px] text-gray-500">ID Pesanan</p>
                        <p class="font-medium text-gray-800 text-sm">#{{ str_pad($transaksi->pesanan->id_pesanan ?? 0, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Status Pesanan</p>
                        <p class="font-medium text-gray-800 text-sm">
                            @if($transaksi->pesanan->status_pesanan == 'diproses') 🔧 Dalam Produksi
                            @elseif($transaksi->pesanan->status_pesanan == 'dikirim') 🚚 Dikirim
                            @elseif($transaksi->pesanan->status_pesanan == 'selesai') ✅ Selesai
                            @else {{ ucfirst($transaksi->pesanan->status_pesanan ?? '-') }}
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Pelanggan</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->pesanan->nama_pelanggan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Harga Deal</p>
                        <p class="font-medium text-gray-800 text-sm">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <a href="{{ route('admin.pesanan.show', $transaksi->id_pesanan) }}" 
                   class="inline-flex items-center gap-1 text-[#B08968] hover:text-[#8B6F4F] text-xs">
                    <i class="fas fa-external-link-alt"></i> Lihat Detail Pesanan
                </a>
            </div>
        </div>
    </div>
    
    <!-- Bukti Pembayaran -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <h3 class="font-semibold text-gray-800 text-sm mb-3">
            <i class="fas fa-image text-[#B08968] mr-2"></i> Bukti Pembayaran
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if($transaksi->bukti_dp)
            <div>
                <p class="text-[10px] text-gray-500 mb-1">💰 Bukti DP 30%</p>
                <img src="{{ asset('storage/' . $transaksi->bukti_dp) }}" 
                     alt="Bukti DP"
                     class="w-full max-w-[200px] rounded-lg shadow-sm border">
            </div>
            @endif
            
            @if($transaksi->bukti_termin2)
            <div>
                <p class="text-[10px] text-gray-500 mb-1">🔧 Bukti Termin 2 (30%)</p>
                <img src="{{ asset('storage/' . $transaksi->bukti_termin2) }}" 
                     alt="Bukti Termin 2"
                     class="w-full max-w-[200px] rounded-lg shadow-sm border">
            </div>
            @endif
            
            @if($transaksi->bukti_pelunasan)
            <div>
                <p class="text-[10px] text-gray-500 mb-1">✅ Bukti Pelunasan 40%</p>
                <img src="{{ asset('storage/' . $transaksi->bukti_pelunasan) }}" 
                     alt="Bukti Pelunasan"
                     class="w-full max-w-[200px] rounded-lg shadow-sm border">
            </div>
            @endif
        </div>
        
        @if(!$transaksi->bukti_dp && !$transaksi->bukti_termin2 && !$transaksi->bukti_pelunasan)
        <p class="text-sm text-gray-400 text-center py-4">Belum ada bukti pembayaran</p>
        @endif
    </div>
</div>
@endsection