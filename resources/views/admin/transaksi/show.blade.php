@extends('admin.layout')

@section('title', 'Detail Transaksi')
@section('header', 'Detail Transaksi')
@section('subheader', 'Informasi lengkap transaksi pembayaran')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">#{{ str_pad($transaksi->id_pesanan, 5, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-xs text-gray-500 mt-0.5">Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal_pesanan)->translatedFormat('d F Y, H:i') }}</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                        <i class="fas fa-check-circle text-xs"></i> Selesai
                    </span>
                </div>
            </div>
        </div>
        
        <div class="p-5">
            <!-- Informasi Transaksi -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Metode Pembayaran</p>
                    <p class="text-base font-semibold text-gray-800 mt-0.5">
                        {{ strtoupper($transaksi->pembayaran->metode_pembayaran ?? '-') }}
                    </p>
                </div>
                <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Status Pembayaran</p>
                    <p class="text-base font-semibold 
                        @if($transaksi->pembayaran && $transaksi->pembayaran->status == 'sukses') text-green-600
                        @elseif($transaksi->pembayaran && $transaksi->pembayaran->status == 'pending') text-yellow-600
                        @else text-red-600 @endif mt-0.5">
                        {{ ucfirst($transaksi->pembayaran->status ?? 'Pending') }}
                    </p>
                </div>
                <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Total Pembayaran</p>
                    <p class="text-xl font-bold text-[#B08968] mt-0.5">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>
            
            <!-- Detail Pelanggan -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-800 border-b border-gray-100 pb-1.5 mb-3">Informasi Pelanggan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <p class="text-[10px] text-gray-500">Nama</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->user->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Email</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $transaksi->user->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Telepon</p>
                        <p class="font-medium text-gray-800 text-sm">{{ session('pemesanan.alamat.no_wa') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500">Alamat</p>
                        <p class="font-medium text-gray-800 text-sm">{{ session('pemesanan.alamat.alamat_lengkap') ?? '-' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Detail Produk -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-800 border-b border-gray-100 pb-1.5 mb-3">Detail Produk</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-[10px] font-semibold text-gray-500">Produk</th>
                                <th class="px-3 py-2 text-left text-[10px] font-semibold text-gray-500">Harga Satuan</th>
                                <th class="px-3 py-2 text-left text-[10px] font-semibold text-gray-500">Jumlah</th>
                                <th class="px-3 py-2 text-left text-[10px] font-semibold text-gray-500">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($transaksi->detailPesanan as $detail)
                            <tr>
                                <td class="px-3 py-2.5">
                                    <p class="font-medium text-gray-800 text-sm">{{ $detail->produk->nama_produk ?? '-' }}</p>
                                </td>
                                <td class="px-3 py-2.5 text-xs text-gray-600">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                <td class="px-3 py-2.5 text-xs text-gray-600">{{ $detail->jumlah }}</td>
                                <td class="px-3 py-2.5 font-semibold text-[#B08968] text-sm">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-3 py-6 text-center text-gray-500 text-sm">
                                    Tidak ada detail produk
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-3 py-2.5 text-right font-semibold text-sm">Total</td>
                                <td class="px-3 py-2.5 font-bold text-[#B08968] text-base">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <!-- Bukti Pembayaran (jika ada) -->
            @if($transaksi->pembayaran && $transaksi->pembayaran->bukti_pembayaran)
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-800 border-b border-gray-100 pb-1.5 mb-3">Bukti Pembayaran</h3>
                <div class="bg-gray-50 rounded-lg p-3">
                    <img src="{{ asset('storage/' . $transaksi->pembayaran->bukti_pembayaran) }}" 
                         alt="Bukti Pembayaran"
                         class="max-w-xs rounded-lg shadow-sm">
                </div>
            </div>
            @endif
            
            <!-- Tombol Kembali -->
            <div class="flex justify-end">
                <a href="{{ route('admin.transaksi.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                    <i class="fas fa-arrow-left text-xs"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection