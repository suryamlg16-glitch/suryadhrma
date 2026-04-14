@extends('admin.layout')

@section('title', 'Kelola Pesanan')
@section('header', 'Kelola Pesanan')
@section('subheader', 'Kelola dan pantau status pesanan pelanggan')

@section('content')
<div class="space-y-4">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">

        <!-- Total Pesanan - Slate -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
            relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Pesanan</p>
                <p class="text-2xl font-semibold text-slate-700">{{ $statistik['total'] }}</p>
            </div>
            <div class="w-9 h-9 bg-slate-100 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-slate-400 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Pending (Warna Orange/Kuning) -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Pending</p>
                <p class="text-2xl font-semibold text-amber-600">{{ $statistik['pending'] }}</p>
            </div>
            <div class="w-9 h-9 bg-amber-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-amber-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Dikonfirmasi (Warna Hijau) -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Dikonfirmasi</p>
                <p class="text-2xl font-semibold text-green-600">{{ $statistik['dikonfirmasi'] ?? 0 }}</p>
            </div>
            <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Diproses (Warna Kuning) -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Dalam Produksi</p>
                <p class="text-2xl font-semibold text-yellow-600">{{ $statistik['diproses'] }}</p>
            </div>
            <div class="w-9 h-9 bg-yellow-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-yellow-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Dikirim (Warna Biru) -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Dikirim</p>
                <p class="text-2xl font-semibold text-blue-600">{{ $statistik['dikirim'] }}</p>
            </div>
            <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 18H6a2 2 0 01-2-2V7a2 2 0 012-2h8a2 2 0 012 2v9a2 2 0 01-2 2h-2m-4 0h4m-4 0v3h4v-3m-4 0H6m8-9h2m0 0v5m0-5h2a2 2 0 012 2v3a2 2 0 01-2 2h-2"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-blue-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Selesai (Warna Hijau Tua) -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Selesai</p>
                <p class="text-2xl font-semibold text-emerald-600">{{ $statistik['selesai'] }}</p>
            </div>
            <div class="w-9 h-9 bg-emerald-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-emerald-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

    </div>

    {{-- Toolbar: Search + Filter + Date --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-4 py-3 flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
            </svg>
            <input type="text"
                   id="searchInput"
                   placeholder="Cari nama pelanggan..."
                   value="{{ request('search') }}"
                   class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                          placeholder-gray-400 transition-all duration-200">
        </div>
        <div class="flex gap-2">
            <div class="relative">
                <select id="statusFilter" class="pl-3 pr-8 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                                  appearance-none cursor-pointer transition-all duration-200">
                    <option value="">📋 Semua Status</option>
                    <option value="pending">⏳ Pending</option>
                    <option value="dikonfirmasi">✅ Dikonfirmasi</option>
                    <option value="diproses">⚙️ Diproses</option>
                    <option value="dikirim">🚚 Dikirim</option>
                    <option value="selesai">✅ Selesai</option>
                    <option value="dibatalkan">❌ Dibatalkan</option>
                </select>
                <svg class="absolute right-2 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <div class="relative">
                <input type="date" id="dateFilter"
                       value="{{ request('date') }}"
                       class="pl-3 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                              transition-all duration-200 cursor-pointer">
            </div>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($pesanan as $item)
                    <tr class="hover:bg-gray-50/70 transition-colors duration-150 group">
                        <td class="px-4 py-3">
                            <span class="text-sm font-medium text-gray-800">#{{ str_pad($item->id_pesanan, 5, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-sm font-medium text-gray-800">{{ $item->nama_pelanggan ?? 'Guest' }}</p>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($item->tanggal_pesanan)->translatedFormat('d M Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-[#B08968]">
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.pesanan.status', $item->id_pesanan) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <div class="relative inline-block">
                                    <select name="status" class="status-select pl-3 pr-8 py-1.5 text-xs font-medium rounded-lg border bg-white cursor-pointer transition-all duration-200
                                        @if($item->status_pesanan == 'selesai') border-green-300 text-green-700 bg-green-50
                                        @elseif($item->status_pesanan == 'dikirim') border-blue-300 text-blue-700 bg-blue-50
                                        @elseif($item->status_pesanan == 'diproses') border-yellow-300 text-yellow-700 bg-yellow-50
                                        @elseif($item->status_pesanan == 'dikonfirmasi') border-green-300 text-green-700 bg-green-50
                                        @elseif($item->status_pesanan == 'dibatalkan') border-red-300 text-red-700 bg-red-50
                                        @else border-gray-300 text-gray-700 bg-gray-50 @endif">
                                        <option value="pending" {{ $item->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="dikonfirmasi" {{ $item->status_pesanan == 'dikonfirmasi' ? 'selected' : '' }}>✅ Dikonfirmasi</option>
                                        <option value="diproses" {{ $item->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="dikirim" {{ $item->status_pesanan == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="selesai" {{ $item->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="dibatalkan" {{ $item->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                    <svg class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.pesanan.show', $item->id_pesanan) }}"
                                   class="w-7 h-7 flex items-center justify-center rounded-lg border border-gray-200
                                          hover:bg-[#B08968]/10 hover:border-[#B08968]/30 transition-all duration-150">
                                    <svg class="w-3.5 h-3.5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-14 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <p class="text-sm text-gray-400">Belum ada pesanan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between gap-3 flex-wrap">
            <p class="text-xs text-gray-400">
                Menampilkan {{ $pesanan->firstItem() ?? 0 }}–{{ $pesanan->lastItem() ?? 0 }}
                dari {{ $pesanan->total() }} pesanan
            </p>
            <div>
                {{ $pesanan->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

</div>

<script>
    // Auto-submit when status changes (dropdown di tabel)
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            const form = this.closest('.status-form');
            const newStatus = this.value;
            const oldStatus = this.getAttribute('data-old-status') || '';

            if (newStatus === 'dibatalkan') {
                if (confirm('Batalkan pesanan ini? Tindakan ini tidak dapat dibatalkan.')) {
                    form.submit();
                } else {
                    this.value = oldStatus;
                }
            } else {
                form.submit();
            }
        });

        select.setAttribute('data-old-status', select.value);
        select.addEventListener('focus', function() {
            this.setAttribute('data-old-status', this.value);
        });
    });

    // Filter by status (dropdown di toolbar) - reload page
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

        const urlParams = new URLSearchParams(window.location.search);
        const currentStatus = urlParams.get('status');
        if (currentStatus) {
            statusFilter.value = currentStatus;
        }
    }

    // Filter by date
    const dateFilter = document.getElementById('dateFilter');
    if (dateFilter) {
        dateFilter.addEventListener('change', function() {
            const url = new URL(window.location.href);
            if (this.value) {
                url.searchParams.set('date', this.value);
            } else {
                url.searchParams.delete('date');
            }
            url.searchParams.set('page', '1');
            window.location.href = url.toString();
        });

        const urlParams = new URLSearchParams(window.location.search);
        const currentDate = urlParams.get('date');
        if (currentDate) {
            dateFilter.value = currentDate;
        }
    }

    // Search functionality - debounce
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
</script>

<style>
    .status-select {
        transition: all 0.2s ease;
    }
    .status-select:hover {
        filter: brightness(0.98);
    }
    select {
        cursor: pointer;
    }
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: 0.5;
        transition: opacity 0.2s;
    }
    input[type="date"]::-webkit-calendar-picker-indicator:hover {
        opacity: 1;
    }
</style>
@endsection