@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('header', 'Detail Pesanan')
@section('subheader', 'Informasi lengkap pesanan pelanggan')

@section('content')
<div class="space-y-4">
    <!-- Status Banner -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between flex-wrap gap-3">
            <div>
                <span class="text-xs text-gray-500">INVOICE</span>
                <h2 class="text-xl font-bold text-gray-800">#{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}</h2>
            </div>
            <div class="flex items-center gap-4">
                <div>
                    <span class="text-xs text-gray-500">Status Pesanan</span>
                    <div>
                        @if($pesanan->status_pesanan == 'pending')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                        @elseif($pesanan->status_pesanan == 'diproses')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-xs">
                                <i class="fas fa-spinner"></i> Diproses
                            </span>
                        @elseif($pesanan->status_pesanan == 'dikirim')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs">
                                <i class="fas fa-truck"></i> Dikirim
                            </span>
                        @elseif($pesanan->status_pesanan == 'selesai')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">
                                <i class="fas fa-check-circle"></i> Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs">
                                <i class="fas fa-times-circle"></i> Dibatalkan
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="text-xs text-gray-500">Tanggal Pesanan</span>
                    <p class="font-medium text-gray-800">{{ $pesanan->tanggal_pesanan->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            <a href="{{ route('admin.pesanan.index') }}" class="text-[#B08968] hover:text-[#8B6F4F] text-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Informasi Pelanggan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-user text-[#B08968] mr-2"></i> Informasi Pelanggan
                </h3>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <p class="text-[10px] text-gray-500">Nama Lengkap</p>
                    <p class="font-medium text-gray-800 text-sm">{{ $pesanan->nama_pelanggan }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500">Email</p>
                    <p class="font-medium text-gray-800 text-sm">{{ $pesanan->email_pelanggan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500">No. Telepon</p>
                    <p class="font-medium text-gray-800 text-sm">{{ $pesanan->no_hp }}</p>
                </div>
            </div>
        </div>
        
        <!-- Informasi Pengiriman -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-truck text-[#B08968] mr-2"></i> Informasi Pengiriman
                </h3>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <p class="text-[10px] text-gray-500">Alamat Lengkap</p>
                    <p class="font-medium text-gray-800 text-sm">{{ $pesanan->alamat }}, {{ $pesanan->kota }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500">Kode Pos</p>
                    <p class="font-medium text-gray-800 text-sm">{{ $pesanan->kode_pos ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500">Metode Pengiriman</p>
                    <p class="font-medium text-gray-800 text-sm uppercase">{{ $pesanan->metode_pengiriman }}</p>
                </div>
            </div>
        </div>
        
        <!-- Informasi Pembayaran -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 text-sm">
                    <i class="fas fa-credit-card text-[#B08968] mr-2"></i> Informasi Pembayaran
                </h3>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <p class="text-[10px] text-gray-500">Metode Pembayaran</p>
                    <p class="font-medium text-gray-800 text-sm uppercase">{{ $pesanan->metode_pembayaran }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500">Status Pembayaran</p>
                    <p class="font-medium text-gray-800 text-sm">
                        @if($pesanan->status_pembayaran == 'paid')
                            <span class="text-green-600">Lunas</span>
                        @elseif($pesanan->status_pembayaran == 'pending')
                            <span class="text-yellow-600">Pending</span>
                        @else
                            <span class="text-red-600">Gagal</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Daftar Produk -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
            <h3 class="font-semibold text-gray-800 text-sm">
                <i class="fas fa-box text-[#B08968] mr-2"></i> Daftar Produk
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-[10px] font-semibold text-gray-500">Produk</th>
                        <th class="px-4 py-2 text-center text-[10px] font-semibold text-gray-500">Kuantitas</th>
                        <th class="px-4 py-2 text-right text-[10px] font-semibold text-gray-500">Harga Satuan</th>
                        <th class="px-4 py-2 text-right text-[10px] font-semibold text-gray-500">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($pesanan->details as $item)
                    <tr>
                        <td class="px-4 py-3">
                            <p class="font-medium text-gray-800 text-sm">{{ $item->produk->nama_produk ?? 'Produk Dihapus' }}</p>
                        </td>
                        <td class="px-4 py-3 text-center text-sm text-gray-600">{{ $item->kuantitas }}</td>
                        <td class="px-4 py-3 text-right text-sm text-gray-600">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50 border-t border-gray-100">
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-right text-sm font-semibold text-gray-700">Subtotal</td>
                        <td class="px-4 py-2 text-right text-sm">Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-right text-sm font-semibold text-gray-700">Biaya Pengiriman</td>
                        <td class="px-4 py-2 text-right text-sm">Rp {{ number_format($pesanan->biaya_pengiriman, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="bg-[#B08968]/5">
                        <td colspan="3" class="px-4 py-2 text-right text-sm font-bold text-gray-800">Total</td>
                        <td class="px-4 py-2 text-right font-bold text-[#B08968] text-lg">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <!-- Catatan -->
    @if($pesanan->catatan)
    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-100">
        <p class="text-xs text-yellow-700">
            <i class="fas fa-sticky-note mr-1"></i> <strong>Catatan:</strong> {{ $pesanan->catatan }}
        </p>
    </div>
    @endif
    
    <!-- Update Status -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <h3 class="font-semibold text-gray-800 text-sm mb-3">
            <i class="fas fa-edit text-[#B08968] mr-2"></i> Update Status Pesanan
        </h3>
        <form action="{{ route('admin.pesanan.status', $pesanan->id_pesanan) }}" method="POST" class="flex items-center gap-3">
            @csrf
            @method('PUT')
            <select name="status" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                <option value="pending" {{ $pesanan->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ $pesanan->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="dikirim" {{ $pesanan->status_pesanan == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ $pesanan->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition text-sm">
                Update Status
            </button>
        </form>
    </div>
</div>
@endsection