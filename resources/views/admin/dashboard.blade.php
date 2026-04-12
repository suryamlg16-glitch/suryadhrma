@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Welcome Section -->
<div class="mb-6">
    <div class="bg-gradient-to-r from-[#B08968]/10 to-[#8B6F4F]/10 rounded-xl p-4 border border-[#B08968]/20">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Selamat Datang, <span class="text-[#B08968]">{{ Auth::user()->name }}</span>!</h1>
                <p class="text-xs text-gray-500 mt-0.5">Berikut adalah ringkasan performa toko Anda hari ini</p>
            </div>
            <div class="flex items-center gap-2 bg-white/50 backdrop-blur-sm px-3 py-1.5 rounded-full">
                <span class="text-xs text-gray-600">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Statistik Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Total Produk -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden group">
        <div class="p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-[#B08968]/10 rounded-lg flex items-center justify-center group-hover:bg-[#B08968] transition-colors duration-300">
                    <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-800">{{ $data['total_produk'] }}</span>
            </div>
            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Produk</h3>
            <div class="mt-2 flex items-center gap-1.5 text-[10px] text-green-600">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
                <span>+{{ $data['total_produk'] }} total</span>
            </div>
        </div>
        <div class="h-0.5 w-0 group-hover:w-full bg-[#B08968] transition-all duration-500"></div>
    </div>
    
    <!-- Total Pesanan -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden group">
        <div class="p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-[#B08968]/10 rounded-lg flex items-center justify-center group-hover:bg-[#B08968] transition-colors duration-300">
                    <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-800">{{ $data['total_pesanan'] }}</span>
            </div>
            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Pesanan</h3>
            <div class="mt-2 flex items-center gap-1.5 text-[10px] text-orange-600">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ $data['total_pesanan'] }} pesanan</span>
            </div>
        </div>
        <div class="h-0.5 w-0 group-hover:w-full bg-[#B08968] transition-all duration-500"></div>
    </div>
    
    <!-- Total Customer -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden group">
        <div class="p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-[#B08968]/10 rounded-lg flex items-center justify-center group-hover:bg-[#B08968] transition-colors duration-300">
                    <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-800">{{ $data['total_customer'] }}</span>
            </div>
            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Customer</h3>
            <div class="mt-2 flex items-center gap-1.5 text-[10px] text-green-600">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
                <span>{{ $data['total_customer'] }} customer</span>
            </div>
        </div>
        <div class="h-0.5 w-0 group-hover:w-full bg-[#B08968] transition-all duration-500"></div>
    </div>
    
    <!-- Total Pendapatan -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden group">
        <div class="p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-[#B08968]/10 rounded-lg flex items-center justify-center group-hover:bg-[#B08968] transition-colors duration-300">
                    <svg class="w-5 h-5 text-[#B08968] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold text-[#B08968]">Rp {{ number_format($data['total_pendapatan'], 0, ',', '.') }}</span>
            </div>
            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Pendapatan</h3>
            <div class="mt-2 flex items-center gap-1.5 text-[10px] text-green-600">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
                <span>Dari pesanan selesai</span>
            </div>
        </div>
        <div class="h-0.5 w-0 group-hover:w-full bg-[#B08968] transition-all duration-500"></div>
    </div>
</div>

<!-- Recent Orders & Low Stock -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-base font-semibold text-gray-800">Pesanan Terbaru</h3>
            <a href="{{ route('admin.pesanan.index') }}" class="text-xs text-[#B08968] hover:text-[#8B6F4F] transition">Lihat Semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-[10px] font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-4 py-2 text-left text-[10px] font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-4 py-2 text-left text-[10px] font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-2 text-left text-[10px] font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data['pesanan_terbaru'] as $pesanan)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-xs font-medium text-gray-900">#{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4 py-3 text-xs text-gray-600">{{ $pesanan->nama_pelanggan ?? 'Guest' }}</td>
                        <td class="px-4 py-3 text-xs font-semibold text-[#B08968]">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-1.5 py-0.5 text-[10px] rounded-full 
                                @if($pesanan->status_pesanan == 'selesai') bg-green-100 text-green-700
                                @elseif($pesanan->status_pesanan == 'dikirim') bg-blue-100 text-blue-700
                                @elseif($pesanan->status_pesanan == 'diproses') bg-yellow-100 text-yellow-700
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ ucfirst($pesanan->status_pesanan) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Low Stock Alert -->
    <div class="space-y-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Stok Menipis</h3>
            </div>
            <div class="space-y-2">
                @forelse($data['produk_stok_menipis'] as $produk)
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-600">{{ $produk->nama_produk }}</span>
                    <span class="text-xs font-medium text-red-500">Stok: {{ $produk->stok }}</span>
                </div>
                @empty
                <p class="text-xs text-gray-500 text-center py-2">Semua produk stok aman</p>
                @endforelse
            </div>
            <a href="{{ route('admin.produk.index') }}" class="mt-3 inline-block text-xs text-[#B08968] hover:text-[#8B6F4F] transition">Kelola Stok →</a>
        </div>
        
        <!-- Quick Actions -->
        <div class="bg-gradient-to-r from-[#B08968] to-[#8B6F4F] rounded-xl shadow-md p-4 text-white">
            <h3 class="text-base font-semibold mb-2">Aksi Cepat</h3>
            <div class="space-y-1.5">
                <a href="{{ route('admin.produk.create') }}" class="flex items-center gap-2 text-white/90 hover:text-white transition group text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Produk Baru</span>
                </a>
                <a href="{{ route('admin.pesanan.index') }}" class="flex items-center gap-2 text-white/90 hover:text-white transition group text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Kelola Pesanan</span>
                </a>
                <a href="{{ route('admin.transaksi.index') }}" class="flex items-center gap-2 text-white/90 hover:text-white transition group text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Lihat Laporan</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection