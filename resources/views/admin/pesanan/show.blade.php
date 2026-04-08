@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('header', 'Detail Pesanan')
@section('subheader', 'Informasi lengkap pesanan pelanggan')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">#{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-sm text-gray-500 mt-1">Tanggal: {{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <span class="px-4 py-2 rounded-full text-sm font-semibold 
                        @if($pesanan->status_pesanan == 'selesai') bg-green-100 text-green-700
                        @elseif($pesanan->status_pesanan == 'dikirim') bg-blue-100 text-blue-700
                        @elseif($pesanan->status_pesanan == 'diproses') bg-yellow-100 text-yellow-700
                        @elseif($pesanan->status_pesanan == 'dibatalkan') bg-red-100 text-red-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ ucfirst($pesanan->status_pesanan) }}
                    </span>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <!-- 2 Kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Info Pelanggan -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-100 pb-2">Informasi Pelanggan</h3>
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="font-medium text-gray-800">{{ $pesanan->user->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium text-gray-800">{{ $pesanan->user->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="text-gray-700">{{ session('pemesanan.alamat.alamat_lengkap') ?? 'Belum diisi' }}</p>
                    </div>
                </div>
                
                <!-- Info Pengiriman -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-100 pb-2">Informasi Pengiriman</h3>
                    <div>
                        <p class="text-sm text-gray-500">Metode Pengiriman</p>
                        <p class="font-medium text-gray-800">{{ session('pemesanan.kurir') ?? 'Belum dipilih' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Biaya Pengiriman</p>
                        <p class="font-medium text-[#B08968]">Rp {{ number_format(session('pemesanan.biaya_pengiriman', 0), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Detail Produk -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-100 pb-2 mb-4">Detail Produk</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500">Produk</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500">Harga</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500">Qty</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pesanan->detailPesanan as $detail)
                            <tr>
                                <td class="px-4 py-3">
                                    <p class="font-medium text-gray-800">{{ $detail->produk->nama_produk ?? '-' }}</p>
                                </td>
                                <td class="px-4 py-3 text-gray-600">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $detail->jumlah }}</td>
                                <td class="px-4 py-3 font-semibold text-[#B08968]">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada detail produk
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-right font-semibold">Total</td>
                                <td class="px-4 py-3 font-bold text-[#B08968] text-lg">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <!-- Tombol Kembali -->
            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.pesanan.index') }}" 
                   class="px-6 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection