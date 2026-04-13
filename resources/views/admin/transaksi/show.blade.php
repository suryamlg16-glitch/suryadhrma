@extends('admin.layout')

@section('title', 'Detail Transaksi')
@section('header', 'Detail Transaksi')
@section('subheader', 'Informasi lengkap transaksi pembayaran')

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
                                <i class="fas fa-check-circle"></i> Sukses
                            </span>
                        @elseif($transaksi->status == 'pending')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-xs">
                                <i class="fas fa-clock"></i> Pending
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
                        <p class="font-medium text-gray-800 text-sm uppercase">{{ $transaksi->metode_pembayaran }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Jumlah Dibayar</p>
                        <p class="font-bold text-[#B08968] text-lg">Rp {{ number_format($transaksi->jumlah_dibayar, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Tanggal Pembayaran</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->tanggal_pembayaran ? $transaksi->tanggal_pembayaran->format('d/m/Y H:i') : '-' }}</p>
                    </div>
                </div>
                @if($transaksi->catatan)
                <div>
                    <p class="text-[10px] text-gray-500">Catatan</p>
                    <p class="text-sm text-gray-600 bg-gray-50 p-2 rounded-lg">{{ $transaksi->catatan }}</p>
                </div>
                @endif
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
                        <p class="font-medium text-gray-800 text-sm">{{ ucfirst($transaksi->pesanan->status_pesanan ?? '-') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Pelanggan</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->pesanan->nama_pelanggan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Total Pesanan</p>
                        <p class="font-medium text-gray-800 text-sm">Rp {{ number_format($transaksi->pesanan->total_harga ?? 0, 0, ',', '.') }}</p>
                    </div>
                </div>
                <a href="{{ route('admin.pesanan.show', $transaksi->id_pesanan) }}" 
                   class="inline-flex items-center gap-1 text-[#B08968] hover:text-[#8B6F4F] text-xs">
                    <i class="fas fa-external-link-alt"></i> Lihat Detail Pesanan
                </a>
            </div>
        </div>
    </div>
    
    <!-- Update Status -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <h3 class="font-semibold text-gray-800 text-sm mb-3">
            <i class="fas fa-edit text-[#B08968] mr-2"></i> Update Status Transaksi
        </h3>
        <form action="{{ route('admin.transaksi.status', $transaksi->id_pembayaran) }}" method="POST" class="flex items-center gap-3">
            @csrf
            @method('PUT')
            <select name="status" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sukses" {{ $transaksi->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                <option value="gagal" {{ $transaksi->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition text-sm">
                Update Status
            </button>
        </form>
    </div>
    
    <!-- Bukti Pembayaran -->
    @if($transaksi->bukti_pembayaran && file_exists(public_path('storage/' . $transaksi->bukti_pembayaran)))
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <h3 class="font-semibold text-gray-800 text-sm mb-3">
            <i class="fas fa-image text-[#B08968] mr-2"></i> Bukti Pembayaran
        </h3>
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" 
                 alt="Bukti Pembayaran"
                 class="max-w-md rounded-lg shadow-sm border">
        </div>
    </div>
    @endif
</div>
@endsection