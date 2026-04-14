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
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-clock text-gray-500 text-xs"></i> Pending
                            </span>
                        @elseif($pesanan->status_pesanan == 'dikonfirmasi')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-check-circle text-green-500 text-xs"></i> Dikonfirmasi
                            </span>
                        @elseif($pesanan->status_pesanan == 'diproses')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-yellow-100 text-yellow-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-spinner text-yellow-500 text-xs"></i> Diproses
                            </span>
                        @elseif($pesanan->status_pesanan == 'dikirim')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-truck text-blue-500 text-xs"></i> Dikirim
                            </span>
                        @elseif($pesanan->status_pesanan == 'selesai')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-check-circle text-green-500 text-xs"></i> Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 text-red-700 rounded-xl text-xs font-medium">
                                <i class="fas fa-times-circle text-red-500 text-xs"></i> Dibatalkan
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
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
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
                <div class="flex items-start gap-3">
                    <i class="fas fa-box text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Kurir</p>
                        <p class="font-semibold text-gray-800 text-sm mt-0.5">{{ $pesanan->kurir ?? '-' }}</p>
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
        
        <!-- INFORMASI PEMBAYARAN -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
            <div class="px-5 py-3.5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-credit-card text-[#B08968] mr-2"></i> Informasi Pembayaran
                </h3>
            </div>
            <div class="p-5 space-y-4">
                <div class="flex items-start gap-3">
                    <i class="fas fa-wallet text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Metode Pembayaran</p>
                        <p class="font-semibold text-gray-800 text-sm mt-0.5 uppercase">{{ $pesanan->metode_pembayaran ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="fas fa-circle-check text-gray-400 text-base mt-0.5"></i>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wide">Status Pembayaran</p>
                        <p class="mt-0.5">
                            @if($pesanan->status_pembayaran == 'paid' || $pesanan->status_pembayaran == 'lunas')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-green-100 text-green-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-check-circle text-xs"></i> Lunas
                                </span>
                            @elseif($pesanan->status_pembayaran == 'pending')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-clock text-xs"></i> Pending
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-red-100 text-red-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-times-circle text-xs"></i> Belum Dibayar
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Daftar Produk -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-5 py-3.5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
            <h3 class="font-semibold text-gray-800 text-sm">
                <i class="fas fa-box text-[#B08968] mr-2"></i> Daftar Produk
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga Satuan</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($pesanan->details as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-3">
                                @if($item->produk && $item->produk->gambar_utama)
                                    <img src="{{ asset('images/' . $item->produk->gambar_utama) }}" 
                                         alt="{{ $item->produk->nama_produk }}"
                                         class="w-10 h-10 object-cover rounded-lg">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-sm"></i>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">{{ $item->produk->nama_produk ?? 'Produk Dihapus' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-lg text-sm font-medium text-gray-700">{{ $item->jumlah ?? 1 }}</span>
                        </td>
                        <td class="px-5 py-3.5 text-right text-sm text-gray-600">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-5 py-3.5 text-right font-bold text-[#B08968] text-sm">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50 border-t border-gray-100">
                    <tr>
                        <td colspan="3" class="px-5 py-3 text-right text-sm font-medium text-gray-600">Subtotal</td>
                        <td class="px-5 py-3 text-right text-sm font-semibold text-gray-800">Rp {{ number_format($pesanan->details->sum('subtotal'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="px-5 py-2 text-right text-sm font-medium text-gray-600">Biaya Pengiriman</td>
                        <td class="px-5 py-2 text-right text-sm font-semibold text-gray-800">Rp {{ number_format($pesanan->biaya_pengiriman ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="bg-[#B08968]/5">
                        <td colspan="3" class="px-5 py-3 text-right text-base font-bold text-gray-800">TOTAL</td>
                        <td class="px-5 py-3 text-right font-bold text-[#B08968] text-xl">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <!-- Update Status -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <h3 class="font-semibold text-gray-800 text-sm mb-4">
            <i class="fas fa-edit text-[#B08968] mr-2"></i> Update Status Pesanan
        </h3>
        <form action="{{ route('admin.pesanan.status', $pesanan->id_pesanan) }}" method="POST" class="flex flex-col sm:flex-row gap-3">
            @csrf
            @method('PUT')
            <select name="status" class="flex-1 px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                <option value="pending" {{ $pesanan->status_pesanan == 'pending' ? 'selected' : '' }}>📋 Pending</option>
                <option value="dikonfirmasi" {{ $pesanan->status_pesanan == 'dikonfirmasi' ? 'selected' : '' }}>✅ Dikonfirmasi</option>
                <option value="diproses" {{ $pesanan->status_pesanan == 'diproses' ? 'selected' : '' }}>⚙️ Diproses</option>
                <option value="dikirim" {{ $pesanan->status_pesanan == 'dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                <option value="dibatalkan" {{ $pesanan->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan</option>
            </select>
            <button type="submit" class="px-6 py-2.5 bg-[#B08968] text-white rounded-xl hover:bg-[#8B6F4F] transition text-sm font-medium shadow-sm">
                <i class="fas fa-save mr-2"></i> Update Status
            </button>
        </form>
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