@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('header', 'Detail Pesanan')
@section('subheader', 'Informasi lengkap pesanan pelanggan')

@section('content')
<div class="space-y-6">
    <!-- Status Banner -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-[#B08968]/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-receipt text-[#B08968] text-xl"></i>
                </div>
                <div>
                    <span class="text-xs text-gray-400 uppercase tracking-wide">INVOICE</span>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $pesanan->kode_invoice ?? 'INV-' . str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}</h2>
                    <p class="text-xs text-gray-500 mt-0.5">ID Pesanan: #{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-5">
                <div>
                    <span class="text-xs text-gray-400 uppercase tracking-wide">Status Pesanan</span>
                    <div class="mt-1">
                        @if($pesanan->status_pesanan == 'pending')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 text-amber-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-clock text-amber-500 text-xs"></i> 📍 Menunggu Survey
                            </span>
                        @elseif($pesanan->status_pesanan == 'dikonfirmasi')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-handshake text-blue-500 text-xs"></i> 🤝 Deal / Negosiasi
                            </span>
                        @elseif($pesanan->status_pesanan == 'diproses')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-purple-100 text-purple-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-cogs text-purple-500 text-xs"></i> 🔧 Dalam Produksi
                            </span>
                        @elseif($pesanan->status_pesanan == 'dikirim')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-truck text-blue-500 text-xs"></i> 🚚 Dikirim
                            </span>
                        @elseif($pesanan->status_pesanan == 'selesai')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-check-circle text-green-500 text-xs"></i> ✅ Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 text-red-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-times-circle text-red-500 text-xs"></i> ❌ Dibatalkan
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="text-xs text-gray-400 uppercase tracking-wide">Tanggal Pesanan</span>
                    <p class="font-semibold text-gray-800 text-sm mt-1">{{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan ?? $pesanan->created_at)->translatedFormat('d M Y, H:i') }}</p>
                </div>
            </div>
            <a href="{{ route('admin.pesanan.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition text-gray-700 text-sm font-medium">
                <i class="fas fa-arrow-left text-xs"></i> Kembali
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <!-- INFORMASI PELANGGAN -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
            <div class="px-5 py-3.5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-user text-[#B08968] mr-2"></i> Informasi Pelanggan
                </h3>
            </div>
            <div class="p-5 space-y-4">
                <div class="flex items-start gap-3">
                    <i class="fas fa-user-circle text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Nama Lengkap</p>
                        <p class="font-semibold text-gray-800 text-sm mt-0.5">{{ $pesanan->nama_pelanggan ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="fab fa-whatsapp text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">No. WhatsApp</p>
                        <p class="font-medium text-gray-800 text-sm mt-0.5">{{ $pesanan->no_wa ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- INFORMASI PENGIRIMAN -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
            <div class="px-5 py-3.5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-truck text-[#B08968] mr-2"></i> Informasi Pengiriman
                </h3>
            </div>
            <div class="p-5 space-y-4">
                <div class="flex items-start gap-3">
                    <i class="fas fa-location-dot text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Alamat Lengkap</p>
                        <p class="font-medium text-gray-800 text-sm mt-0.5">{{ $pesanan->alamat_lengkap ?? '-' }}</p>
                    </div>
                </div>
                @if(!empty($pesanan->catatan))
                <div class="flex items-start gap-3">
                    <i class="fas fa-sticky-note text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Catatan</p>
                        <p class="font-medium text-gray-600 text-sm mt-0.5 italic">{{ $pesanan->catatan }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

<style>
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }
</style>
@endsection