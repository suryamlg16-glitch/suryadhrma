@extends('admin.layout')

@section('title', 'Kelola Transaksi')
@section('header', 'Kelola Transaksi')
@section('subheader', 'Riwayat transaksi pembayaran pelanggan')

@section('content')
<div class="space-y-4">

    {{-- Card Total Pendapatan --}}
    <div class="bg-gradient-to-r from-green-50 to-white rounded-xl border border-green-100 shadow-sm p-5 flex justify-between items-center
                relative overflow-hidden group cursor-default">
        <div>
            <p class="text-[10px] text-green-600 uppercase tracking-widest mb-1">TOTAL PENDAPATAN</p>
            <p class="text-3xl font-bold text-green-700">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            <p class="text-[10px] text-gray-400 mt-1">Dari semua transaksi sukses</p>
        </div>
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 h-1 w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></div>
    </div>

    {{-- Stat Cards 3 kolom --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Transaksi</p>
                <p class="text-2xl font-semibold text-slate-700">{{ $totalTransaksi }}</p>
            </div>
            <div class="w-9 h-9 bg-slate-100 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-slate-400 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Sukses</p>
                <p class="text-2xl font-semibold text-teal-600">{{ $transaksiSukses }}</p>
            </div>
            <div class="w-9 h-9 bg-teal-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-teal-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Pending</p>
                <p class="text-2xl font-semibold text-amber-600">{{ $transaksiPending }}</p>
            </div>
            <div class="w-9 h-9 bg-amber-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-amber-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

    </div>

    {{-- Toolbar: Search + Filter Status --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
        <div class="flex flex-col md:flex-row gap-3">
            <!-- Search -->
            <div class="flex-1">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                    <input type="text" id="searchInput" placeholder="Cari nama pelanggan atau kode transaksi..."
                           value="{{ request('search') }}"
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                  placeholder-gray-400 transition-all duration-200">
                </div>
            </div>
            
            <!-- Filter Status -->
            <div>
                <select id="statusFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                                  appearance-none cursor-pointer transition-all duration-200">
                    <option value="">📋 Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Menunggu</option>
                    <option value="sukses" {{ request('status') == 'sukses' ? 'selected' : '' }}>✅ Lunas</option>
                    <option value="gagal" {{ request('status') == 'gagal' ? 'selected' : '' }}>❌ Gagal</option>
                </select>
            </div>
            
            <!-- Tombol Tambah Transaksi -->
            <div>
                <a href="{{ route('admin.transaksi.create') }}"
                   class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-[#B08968] text-white text-sm font-medium
                          rounded-lg hover:bg-[#9a7455] active:scale-[.97] transition-all duration-200 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Transaksi
                </a>
            </div>
        </div>
    </div>

    {{-- Transactions Table --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full" style="min-width: 900px; white-space: nowrap;">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Kode Transaksi</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Total Harga</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Dibayar</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Sisa</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="transaksiTableBody">
                    @forelse($transaksi as $item)
                    <tr class="hover:bg-gray-50/70 transition-colors duration-150 group">
                        <td class="px-4 py-3">
                            <span class="text-sm font-mono font-medium text-gray-800">{{ $item->kode_transaksi }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
                            {{ $item->created_at->format('d/m/Y') }}
                            <span class="text-[10px] text-gray-400 ml-1">{{ $item->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-sm font-medium text-gray-800">{{ $item->pesanan->nama_pelanggan ?? '-' }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-[#B08968] whitespace-nowrap">
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-green-600 whitespace-nowrap">
                                Rp {{ number_format($item->jumlah_dibayar, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-red-500 whitespace-nowrap">
                                Rp {{ number_format($item->sisa_tagihan, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->status == 'sukses')
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium whitespace-nowrap">
                                    <i class="fas fa-check-circle text-xs"></i> Lunas
                                </span>
                            @elseif($item->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-medium whitespace-nowrap">
                                    <i class="fas fa-clock text-xs"></i> Menunggu
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium whitespace-nowrap">
                                    <i class="fas fa-times-circle text-xs"></i> Gagal
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.transaksi.show', $item->id_pembayaran) }}"
                                   class="w-7 h-7 flex items-center justify-center rounded-lg border border-gray-200
                                          hover:bg-[#B08968]/10 hover:border-[#B08968]/30 transition-all duration-150"
                                   title="Detail">
                                    <svg class="w-3.5 h-3.5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                @if($item->status == 'pending' || $item->status == 'gagal')
                                <a href="{{ route('admin.transaksi.edit', $item->id_pembayaran) }}"
                                   class="w-7 h-7 flex items-center justify-center rounded-lg border border-gray-200
                                          hover:bg-yellow-50 hover:border-yellow-300 transition-all duration-150"
                                   title="Update Status">
                                    <svg class="w-3.5 h-3.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-14 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-sm text-gray-400">Belum ada transaksi</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination yang DIPERBAGUS --}}
        <div class="px-4 py-3 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-400">
                Menampilkan {{ $transaksi->firstItem() ?? 0 }}–{{ $transaksi->lastItem() ?? 0 }}
                dari {{ $transaksi->total() }} transaksi
            </p>
            <div class="flex justify-center">
                @if ($transaksi->hasPages())
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($transaksi->onFirstPage())
                            <span class="relative inline-flex items-center px-2 py-1.5 rounded-l-md border border-gray-200 bg-gray-100 text-gray-300 text-xs cursor-not-allowed">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $transaksi->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-1.5 rounded-l-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-[#B08968] text-xs transition-all duration-150">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)
                            @if ($page == $transaksi->currentPage())
                                <span class="relative inline-flex items-center px-3 py-1.5 border border-[#B08968] bg-[#B08968] text-white text-xs font-medium">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1.5 border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 hover:text-[#B08968] text-xs transition-all duration-150">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($transaksi->hasMorePages())
                            <a href="{{ $transaksi->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-1.5 rounded-r-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-[#B08968] text-xs transition-all duration-150">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-2 py-1.5 rounded-r-md border border-gray-200 bg-gray-100 text-gray-300 text-xs cursor-not-allowed">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        @endif
                    </nav>
                @endif
            </div>
        </div>
    </div>

</div>

<script>
    // Search functionality (dengan debounce)
    let searchTimeout;
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const url = new URL(window.location.href);
                if (this.value) {
                    url.searchParams.set('search', this.value);
                } else {
                    url.searchParams.delete('search');
                }
                url.searchParams.set('page', '1');
                window.location.href = url.toString();
            }, 500);
        });
    }
    
    // Filter status - LANGSUNG FILTER
    const statusFilter = document.getElementById('statusFilter');
    if (statusFilter) {
        statusFilter.addEventListener('change', function() {
            const url = new URL(window.location.href);
            if (this.value) {
                url.searchParams.set('status', this.value);
            } else {
                url.searchParams.delete('status');
            }
            url.searchParams.set('page', '1');
            window.location.href = url.toString();
        });
    }
</script>

<style>
    select { cursor: pointer; }
    
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #B08968;
        border-radius: 10px;
    }
</style>
@endsection