@extends('admin.layout')

@section('title', 'Kelola Transaksi')
@section('header', 'Kelola Transaksi')
@section('subheader', 'Kelola dan pantau transaksi pembayaran pelanggan')

@section('content')
<div class="space-y-4">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">

        <!-- Total Pendapatan -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
            relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Pendapatan</p>
                <p class="text-2xl font-semibold text-green-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            </div>
            <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Total Transaksi -->
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

        <!-- Sukses (Warna Teal) -->
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

        <!-- Pending -->
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

        <!-- Gagal -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Gagal</p>
                <p class="text-2xl font-semibold text-red-600">{{ $transaksiGagal }}</p>
            </div>
            <div class="w-9 h-9 bg-red-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-red-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

    </div>

    {{-- Statistik Metode Pembayaran --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Transfer Bank -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Transfer Bank</p>
                <p class="text-2xl font-semibold text-purple-600">Rp {{ number_format($statistikMetode['transfer'], 0, ',', '.') }}</p>
            </div>
            <div class="w-9 h-9 bg-purple-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-purple-500 transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- QRIS -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">QRIS</p>
                <p class="text-2xl font-semibold text-green-600">Rp {{ number_format($statistikMetode['qris'], 0, ',', '.') }}</p>
            </div>
            <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4M12 4h4M4 4h4M4 20h4M12 20h4M4 12h2M12 12h2M20 12h2M12 12h2M12 4h2"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></div>
        </div>
    </div>

    {{-- Toolbar: Filter Tanggal + Metode --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-4 py-3 flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <label class="block text-[10px] text-gray-500 mb-1">Dari Tanggal</label>
                <input type="date" name="dari_tanggal" id="dariTanggal" value="{{ request('dari_tanggal') }}" 
                       class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                              transition-all duration-200">
            </div>
            <div>
                <label class="block text-[10px] text-gray-500 mb-1">Sampai Tanggal</label>
                <input type="date" name="sampai_tanggal" id="sampaiTanggal" value="{{ request('sampai_tanggal') }}" 
                       class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                              transition-all duration-200">
            </div>
        </div>
        <div class="flex gap-2">
            <div class="relative">
                <select id="metodeFilter" class="pl-3 pr-8 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                                  appearance-none cursor-pointer transition-all duration-200">
                    <option value="">Semua Metode</option>
                    <option value="transfer" {{ request('metode') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
                </select>
                <svg class="absolute right-2 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <button type="button" id="filterBtn" class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition text-sm">
                <i class="fas fa-filter"></i> Filter
            </button>
            <a href="{{ route('admin.transaksi.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                <i class="fas fa-undo"></i> Reset
            </a>
        </div>
    </div>

    {{-- Transactions Table --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Metode</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($transaksi as $item)
                    <tr class="hover:bg-gray-50/70 transition-colors duration-150 group">
                        <td class="px-4 py-3">
                            <span class="text-sm font-medium text-gray-800">{{ $item->kode_transaksi }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-sm font-medium text-gray-800">{{ $item->pesanan->nama_pelanggan ?? '-' }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-[#B08968]">
                                Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-[10px] rounded-full uppercase">
                                {{ $item->metode_pembayaran == 'transfer' ? 'Transfer Bank' : 'QRIS' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->status == 'sukses')
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-check-circle text-xs"></i> Sukses
                                </span>
                            @elseif($item->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-clock text-xs"></i> Pending
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium">
                                    <i class="fas fa-times-circle text-xs"></i> Gagal
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.transaksi.show', $item->id_pembayaran) }}"
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
                        <td colspan="7" class="px-4 py-14 text-center">
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

        {{-- Pagination --}}
        <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between gap-3 flex-wrap">
            <p class="text-xs text-gray-400">
                Menampilkan {{ $transaksi->firstItem() ?? 0 }}–{{ $transaksi->lastItem() ?? 0 }}
                dari {{ $transaksi->total() }} transaksi
            </p>
            <div>
                {{ $transaksi->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

</div>

<script>
    // Filter functionality
    const filterBtn = document.getElementById('filterBtn');
    if (filterBtn) {
        filterBtn.addEventListener('click', function() {
            const url = new URL(window.location.href);
            const dariTanggal = document.getElementById('dariTanggal').value;
            const sampaiTanggal = document.getElementById('sampaiTanggal').value;
            const metode = document.getElementById('metodeFilter').value;
            
            if (dariTanggal) {
                url.searchParams.set('dari_tanggal', dariTanggal);
            } else {
                url.searchParams.delete('dari_tanggal');
            }
            
            if (sampaiTanggal) {
                url.searchParams.set('sampai_tanggal', sampaiTanggal);
            } else {
                url.searchParams.delete('sampai_tanggal');
            }
            
            if (metode) {
                url.searchParams.set('metode', metode);
            } else {
                url.searchParams.delete('metode');
            }
            
            url.searchParams.set('page', '1');
            window.location.href = url.toString();
        });
    }
</script>

<style>
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