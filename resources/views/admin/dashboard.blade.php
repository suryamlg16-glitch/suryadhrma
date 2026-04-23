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
            <p class="text-xs text-gray-400 mt-0.5">Kelola survey, produksi, dan pesanan custom furniture Anda.</p>
        </div>
        <span class="text-xs text-gray-400 bg-gray-50 border border-gray-100 px-3 py-1.5 rounded-full whitespace-nowrap">
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </span>
    </div>
</div>

{{-- Stat Cards Baris Pertama --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">

    {{-- 1. Menunggu Survey --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Menunggu Survey</p>
            <p class="text-2xl font-semibold text-amber-600">{{ $data['menunggu_survey'] ?? 0 }}</p>
        </div>
        <div class="w-9 h-9 bg-amber-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-amber-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- 2. Deal / Negosiasi --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Deal / Negosiasi</p>
            <p class="text-2xl font-semibold text-blue-600">{{ $data['deal_negosiasi'] ?? 0 }}</p>
        </div>
        <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-blue-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- 3. Dalam Produksi --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Dalam Produksi</p>
            <p class="text-2xl font-semibold text-purple-600">{{ $data['dalam_produksi'] ?? 0 }}</p>
        </div>
        <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-purple-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- 4. Total Pendapatan --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Pendapatan</p>
            <p class="text-xl font-semibold text-green-600">Rp {{ number_format($data['total_pendapatan'] ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></div>
    </div>
</div>

{{-- Stat Cards Baris Kedua --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-5">

    {{-- 5. Total Pesanan --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Pesanan</p>
            <p class="text-2xl font-semibold text-gray-800">{{ $data['total_pesanan'] ?? 0 }}</p>
        </div>
        <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-gray-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- 6. Total Customer --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Customer</p>
            <p class="text-2xl font-semibold text-teal-600">{{ $data['total_customer'] ?? 0 }}</p>
        </div>
        <div class="w-9 h-9 bg-teal-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-teal-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- 7. Rata-rata Proyek --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Rata-rata Proyek</p>
            <p class="text-xl font-semibold text-indigo-600">Rp {{ number_format($data['rata_rata_proyek'] ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="w-9 h-9 bg-indigo-100 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-indigo-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

</div>

{{-- Bottom Section --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    {{-- Recent Orders / Pesanan Terbaru --}}
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
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($data['pesanan_terbaru'] as $pesanan)
                    <tr class="hover:bg-gray-50/60 transition-colors duration-150">
                        <td class="px-5 py-3 text-xs font-mono font-medium text-gray-700">
                            #{{ str_pad($pesanan->id_pesanan, 5, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-5 py-3 text-xs text-gray-500">{{ $pesanan->nama_pelanggan ?? 'Guest' }}</td>
                        <td class="px-5 py-3">
                            <span class="inline-block text-[10px] font-medium px-2 py-0.5 rounded-full
                                @if($pesanan->status_pesanan == 'selesai') bg-green-50 text-green-700
                                @elseif($pesanan->status_pesanan == 'dikirim') bg-blue-50 text-blue-700
                                @elseif($pesanan->status_pesanan == 'diproses') bg-purple-50 text-purple-700
                                @elseif($pesanan->status_pesanan == 'dikonfirmasi') bg-blue-50 text-blue-700
                                @elseif($pesanan->status_pesanan == 'pending') bg-amber-50 text-amber-700
                                @else bg-gray-100 text-gray-500 @endif">
                                @if($pesanan->status_pesanan == 'pending')
                                    📍 Menunggu Survey
                                @elseif($pesanan->status_pesanan == 'dikonfirmasi')
                                    🤝 Deal / Negosiasi
                                @elseif($pesanan->status_pesanan == 'diproses')
                                    🔧 Dalam Produksi
                                @elseif($pesanan->status_pesanan == 'dikirim')
                                    🚚 Dikirim
                                @elseif($pesanan->status_pesanan == 'selesai')
                                    ✅ Selesai
                                @elseif($pesanan->status_pesanan == 'dibatalkan')
                                    ❌ Dibatalkan
                                @else
                                    {{ ucfirst($pesanan->status_pesanan) }}
                                @endif
                            </span>
                        </td>
                        <td class="px-5 py-3">
                            <a href="{{ route('admin.pesanan.show', $pesanan->id_pesanan) }}" 
                               class="text-[10px] text-[#B08968] hover:underline">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-10 text-center text-sm text-gray-400">Belum ada pesanan</td
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="flex flex-col gap-4">

        {{-- Quick Actions --}}
        <div class="bg-[#B08968] rounded-xl p-4">
            <h3 class="text-sm font-semibold text-white/90 mb-3">Aksi cepat</h3>
            <div class="space-y-1">
                <a href="{{ route('admin.produk.create') }}"
                class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah produk baru
                </a>
                <a href="{{ route('admin.pesanan.index') }}"
                class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Kelola pesanan
                </a>
                <a href="{{ route('admin.transaksi.index') }}"
                class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Lihat transaksi
                </a>
                {{-- ✅ Menu Laporan --}}
                <a href="{{ route('admin.laporan.index') }}"
                class="flex items-center gap-2.5 text-white/80 hover:text-white hover:bg-white/10 px-3 py-2 rounded-lg transition-all duration-200 text-xs group">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Lihat Laporan
                </a>
            </div>
        </div>

        {{-- Peringatan Survey --}}
        <div class="bg-amber-50 border-l-4 border-amber-500 rounded-lg p-3">
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-xs font-medium text-amber-800">Butuh Survey Segera</p>
                    <p class="text-[10px] text-amber-700 mt-0.5">{{ $data['butuh_survey'] ?? 0 }} pesanan menunggu jadwal survey</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection