@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')

{{-- Welcome --}}
<div class="mb-5">
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
        <div>
            <h1 class="text-xl font-semibold text-gray-800">
                Selamat datang kembali, <span class="text-[#B08968]">{{ Auth::user()->name }}</span>
            </h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola dan pantau performa bisnis Anda dengan mudah.</p>
        </div>
        <span class="text-xs text-gray-400 bg-gray-50 border border-gray-100 px-3 py-1.5 rounded-full whitespace-nowrap">
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </span>
    </div>
</div>

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">

    {{-- Total Produk --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 relative overflow-hidden group cursor-default
                transition-transform duration-200 hover:-translate-y-0.5 hover:border-gray-200">
        <div class="flex justify-between items-start mb-3">
            <div class="w-9 h-9 rounded-lg bg-[#B08968]/10 flex items-center justify-center
                        transition-colors duration-250 group-hover:bg-[#B08968]">
                <svg class="w-4 h-4 text-[#B08968] transition-colors duration-250 group-hover:text-white"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <span class="text-2xl font-semibold text-gray-800">{{ $data['total_produk'] }}</span>
        </div>
        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-2">Total Produk</p>
        <span class="inline-flex items-center gap-1 text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
            +{{ $data['total_produk'] }} total
        </span>
        {{-- Animated bottom bar --}}
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- Total Pesanan --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 relative overflow-hidden group cursor-default
                transition-transform duration-200 hover:-translate-y-0.5 hover:border-gray-200">
        <div class="flex justify-between items-start mb-3">
            <div class="w-9 h-9 rounded-lg bg-[#B08968]/10 flex items-center justify-center
                        transition-colors duration-250 group-hover:bg-[#B08968]">
                <svg class="w-4 h-4 text-[#B08968] transition-colors duration-250 group-hover:text-white"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <span class="text-2xl font-semibold text-gray-800">{{ $data['total_pesanan'] }}</span>
        </div>
        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-2">Total Pesanan</p>
        <span class="inline-flex items-center gap-1 text-[10px] text-orange-600 bg-orange-50 px-2 py-0.5 rounded-full">
            {{ $data['total_pesanan'] }} pesanan
        </span>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- Total Customer --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 relative overflow-hidden group cursor-default
                transition-transform duration-200 hover:-translate-y-0.5 hover:border-gray-200">
        <div class="flex justify-between items-start mb-3">
            <div class="w-9 h-9 rounded-lg bg-[#B08968]/10 flex items-center justify-center
                        transition-colors duration-250 group-hover:bg-[#B08968]">
                <svg class="w-4 h-4 text-[#B08968] transition-colors duration-250 group-hover:text-white"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <span class="text-2xl font-semibold text-gray-800">{{ $data['total_customer'] }}</span>
        </div>
        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-2">Total Customer</p>
        <span class="inline-flex items-center gap-1 text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
            {{ $data['total_customer'] }} customer
        </span>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- Total Pendapatan --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 relative overflow-hidden group cursor-default
                transition-transform duration-200 hover:-translate-y-0.5 hover:border-gray-200">
        <div class="flex justify-between items-start mb-3">
            <div class="w-9 h-9 rounded-lg bg-[#B08968]/10 flex items-center justify-center
                        transition-colors duration-250 group-hover:bg-[#B08968]">
                <svg class="w-4 h-4 text-[#B08968] transition-colors duration-250 group-hover:text-white"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-lg font-semibold text-[#B08968] leading-none mt-0.5">
                Rp {{ number_format($data['total_pendapatan'], 0, ',', '.') }}
            </span>
        </div>
        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-2">Total Pendapatan</p>
        <span class="inline-flex items-center gap-1 text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
            Dari pesanan selesai
        </span>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
    </div>

</div>

{{-- Bottom Section --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    {{-- Recent Orders --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-5 py-3.5 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-sm font-semibold text-gray-800">Pesanan terbaru</h3>
            <a href="{{ route('admin.pesanan.index') }}"
               class="text-xs text-[#B08968] hover:text-[#9a7455] transition-colors">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Customer</th>
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($data['pesanan_terbaru'] as $pesanan)
                    <tr class="hover:bg-gray-50/60 transition-colors duration-150">
                        <td class="px-5 py-3 text-xs font-mono font-medium text-gray-700">
                            #{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-5 py-3 text-xs text-gray-500">{{ $pesanan->nama_pelanggan ?? 'Guest' }}</td>
                        <td class="px-5 py-3 text-xs font-semibold text-[#B08968]">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-3">
                            <span class="inline-block text-[10px] font-medium px-2 py-0.5 rounded-full
                                @if($pesanan->status_pesanan == 'selesai')  bg-green-50  text-green-700
                                @elseif($pesanan->status_pesanan == 'dikirim') bg-blue-50  text-blue-700
                                @elseif($pesanan->status_pesanan == 'diproses') bg-amber-50 text-amber-700
                                @else bg-gray-100 text-gray-500 @endif">
                                {{ ucfirst($pesanan->status_pesanan) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-10 text-center text-sm text-gray-400">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="flex flex-col gap-4">

        {{-- Low Stock Alert --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
            <div class="flex items-center gap-2.5 mb-3">
                <div class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Stok menipis</h3>
            </div>

            <div class="space-y-0 divide-y divide-gray-50">
                @forelse($data['produk_stok_menipis'] as $produk)
                <div class="flex justify-between items-center py-2.5">
                    <span class="text-xs text-gray-500">{{ $produk->nama_produk }}</span>
                    <span class="text-[10px] font-medium text-red-500 bg-red-50 px-2 py-0.5 rounded-full">
                        {{ $produk->stok }}
                    </span>
                </div>
                @empty
                <p class="text-xs text-gray-400 text-center py-3">Semua produk stok aman</p>
                @endforelse
            </div>

            <a href="{{ route('admin.produk.index') }}"
               class="mt-3 inline-block text-xs text-[#B08968] hover:text-[#9a7455] transition-colors">
                Kelola stok →
            </a>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-[#B08968] rounded-xl p-4">
            <h3 class="text-sm font-semibold text-white/90 mb-3">Aksi cepat</h3>
            <div class="space-y-1">
                <a href="{{ route('admin.produk.create') }}"
                   class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10
                          px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah produk baru
                </a>
                <a href="{{ route('admin.pesanan.index') }}"
                   class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10
                          px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Kelola pesanan
                </a>
                <a href="{{ route('admin.transaksi.index') }}"
                   class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10
                          px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Lihat laporan
                </a>
            </div>
        </div>

    </div>
</div>

@endsection