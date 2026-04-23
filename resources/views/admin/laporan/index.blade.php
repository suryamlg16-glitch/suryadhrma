@extends('admin.layout')

@section('title', 'Laporan Transaksi')
@section('header', 'Laporan Transaksi')
@section('subheader', 'Rekap pendapatan dan grafik tren')

@section('content')
<div class="space-y-4">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-[#B08968] to-[#8B6F4F] rounded-xl shadow-sm p-5 text-white">
        <div class="flex flex-col md:flex-row justify-between items-center gap-3">
            <div>
                <h2 class="text-lg font-bold">Laporan Pendapatan</h2>
                <p class="text-white/80 text-xs mt-0.5">Rekap pendapatan dan grafik tren per bulan</p>
            </div>
            <div class="flex gap-2">
                <form method="GET" action="{{ route('admin.laporan.index') }}" class="flex gap-2">
                    <select name="tahun" class="px-3 py-2 text-sm border border-white/30 rounded-lg bg-white/10 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                        @for($i = date('Y') - 2; $i <= date('Y') + 1; $i++)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }} class="text-gray-800">{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="px-4 py-2 bg-white text-[#B08968] rounded-lg hover:bg-gray-100 transition text-sm font-medium">
                        <i class="fas fa-chart-line mr-2"></i> Tampilkan
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest">Pendapatan Bulan Ini</p>
                    <p class="text-2xl font-bold text-green-600">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</p>
                    <p class="text-[10px] text-gray-400 mt-1">{{ Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
                </div>
                <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-green-600 text-sm"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest">Pendapatan Tahun {{ $tahun }}</p>
                    <p class="text-2xl font-bold text-teal-600">Rp {{ number_format($pendapatanTahunIni, 0, ',', '.') }}</p>
                </div>
                <div class="w-9 h-9 bg-teal-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chart-line text-teal-600 text-sm"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest">Rata-rata per Bulan</p>
                    <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($rataRataPerBulan, 0, ',', '.') }}</p>
                </div>
                <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chart-simple text-blue-600 text-sm"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest">Total Transaksi</p>
                    <p class="text-2xl font-bold text-slate-700">{{ $totalTransaksi }}</p>
                </div>
                <div class="w-9 h-9 bg-slate-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-receipt text-slate-500 text-sm"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Grafik Line Chart --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4">
        <h3 class="text-sm font-semibold text-gray-800 mb-3">
            <i class="fas fa-chart-line text-[#B08968] mr-2"></i> Grafik Tren Pendapatan {{ $tahun }}
        </h3>
        <div class="relative" style="height: 350px;">
            <canvas id="pendapatanChart"></canvas>
        </div>
    </div>

    {{-- Ringkasan per Kuartal --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
            <h3 class="text-sm font-semibold text-gray-800">
                <i class="fas fa-chart-pie text-[#B08968] mr-2"></i> Ringkasan per Kuartal - {{ $tahun }}
            </h3>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 p-4">
            @php
                $kuartal = [
                    1 => ['name' => 'Q1 (Jan-Mar)', 'bulan' => [1,2,3]],
                    2 => ['name' => 'Q2 (Apr-Jun)', 'bulan' => [4,5,6]],
                    3 => ['name' => 'Q3 (Jul-Sep)', 'bulan' => [7,8,9]],
                    4 => ['name' => 'Q4 (Okt-Des)', 'bulan' => [10,11,12]],
                ];
            @endphp
            
            @foreach($kuartal as $q)
                @php
                    $pendapatanKuartal = 0;
                    $transaksiKuartal = 0;
                    foreach($q['bulan'] as $b) {
                        $pendapatanKuartal += $dataBulanan[$b-1]['pendapatan'];
                        $transaksiKuartal += $dataBulanan[$b-1]['transaksi'];
                    }
                @endphp
                <div class="bg-gray-50 rounded-lg p-3 text-center card-hover">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">{{ $q['name'] }}</p>
                    <p class="text-base font-bold text-[#B08968] mt-1">Rp {{ number_format($pendapatanKuartal, 0, ',', '.') }}</p>
                    <p class="text-[10px] text-gray-400 mt-1">{{ $transaksiKuartal }} transaksi</p>
                    <div class="w-full bg-gray-200 rounded-full h-1 mt-2">
                        @php
                            $maxPendapatan = max(array_column($dataBulanan, 'pendapatan')) * 3;
                            $persentase = $maxPendapatan > 0 ? ($pendapatanKuartal / $maxPendapatan) * 100 : 0;
                        @endphp
                        <div class="bg-[#B08968] h-1 rounded-full" style="width: {{ min($persentase, 100) }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ========== TABEL RINCI TRANSAKSI ========== --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <h3 class="text-sm font-semibold text-gray-800">
                <i class="fas fa-list-ul text-[#B08968] mr-2"></i> Rincian Transaksi - {{ $tahun }}
            </h3>
            
            {{-- Search - DIPERLEBAR --}}
            <div class="relative w-full sm:w-80 md:w-96">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" id="searchTransaksi" placeholder="Cari nama pelanggan..."
                       class="pl-9 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg bg-white
                              focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                              placeholder-gray-400 transition-all duration-200 w-full">
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full" style="min-width: 800px; white-space: nowrap;">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Kode Transaksi</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Total Harga</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Dibayar</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2.5 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Termin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="transaksiTableBody">
                    @forelse($transaksiList as $index => $item)
                    <tr class="hover:bg-gray-50/70 transition-colors duration-150 transaksi-row"
                        data-kode="{{ $item->kode_transaksi }}"
                        data-pelanggan="{{ strtolower($item->pesanan->nama_pelanggan ?? '') }}">
                        <td class="px-4 py-2.5 text-xs text-gray-500">{{ $transaksiList->firstItem() + $index }}</td>
                        <td class="px-4 py-2.5">
                            <span class="text-xs font-mono font-medium text-gray-800">{{ $item->kode_transaksi }}</span>
                        </td>
                        <td class="px-4 py-2.5 text-xs text-gray-500 whitespace-nowrap">
                            {{ $item->created_at->format('d/m/Y') }}
                            <span class="text-[10px] text-gray-400 ml-1">{{ $item->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-4 py-2.5">
                            <p class="text-xs font-medium text-gray-800">{{ $item->pesanan->nama_pelanggan ?? '-' }}</p>
                        </td>
                        <td class="px-4 py-2.5">
                            <span class="text-xs font-semibold text-[#B08968] whitespace-nowrap">
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-2.5">
                            <span class="text-xs font-semibold text-green-600 whitespace-nowrap">
                                Rp {{ number_format($item->jumlah_dibayar, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-2.5">
                            @if($item->status == 'sukses')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-green-100 text-green-700 rounded-full text-[10px] font-medium">
                                    ✅ Lunas
                                </span>
                            @elseif($item->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-medium">
                                    ⏳ Menunggu
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-[10px] font-medium">
                                    ❌ Gagal
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-2.5">
                            <span class="text-[10px] text-gray-500">
                                @if($item->termin == 'dp')
                                    DP 30%
                                @elseif($item->termin == 'termin2')
                                    Termin 2 (30%)
                                @else
                                    Pelunasan (40%)
                                @endif
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-10 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-sm text-gray-400">Belum ada transaksi untuk tahun {{ $tahun }}</p>
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
                Menampilkan {{ $transaksiList->firstItem() ?? 0 }}–{{ $transaksiList->lastItem() ?? 0 }}
                dari {{ $transaksiList->total() }} transaksi
            </p>
            <div class="flex justify-center">
                @if ($transaksiList->hasPages())
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($transaksiList->onFirstPage())
                            <span class="relative inline-flex items-center px-2 py-1.5 rounded-l-md border border-gray-200 bg-gray-100 text-gray-300 text-xs cursor-not-allowed">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $transaksiList->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-1.5 rounded-l-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-[#B08968] text-xs transition-all duration-150">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($transaksiList->getUrlRange(1, $transaksiList->lastPage()) as $page => $url)
                            @if ($page == $transaksiList->currentPage())
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
                        @if ($transaksiList->hasMorePages())
                            <a href="{{ $transaksiList->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-1.5 rounded-r-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-[#B08968] text-xs transition-all duration-150">
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

    {{-- Informasi Tambahan --}}
    <div class="bg-blue-50 rounded-xl border border-blue-100 p-3">
        <div class="flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500 text-sm"></i>
            <p class="text-[10px] text-blue-600">
                Menampilkan ringkasan per kuartal dan rincian transaksi untuk tahun {{ $tahun }}. 
                Klik "Tampilkan" pada filter tahun untuk melihat data tahun lainnya.
            </p>
        </div>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('pendapatanChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($namaBulan) !!},
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: {!! json_encode($dataGrafik) !!},
                    borderColor: '#B08968',
                    backgroundColor: 'rgba(176, 137, 104, 0.1)',
                    borderWidth: 3,
                    pointBackgroundColor: '#8B6F4F',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            font: { size: 11 },
                            boxWidth: 12
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            },
                            font: { size: 10 }
                        },
                        grid: { color: '#e5e7eb' }
                    },
                    x: {
                        ticks: { font: { size: 10 } },
                        grid: { display: false }
                    }
                }
            }
        });
    });

    // Search functionality untuk tabel rincian transaksi
    const searchInput = document.getElementById('searchTransaksi');
    const tableRows = document.querySelectorAll('.transaksi-row');
    
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            tableRows.forEach(row => {
                const kode = row.getAttribute('data-kode') || '';
                const pelanggan = row.getAttribute('data-pelanggan') || '';
                
                if (kode.includes(searchTerm) || pelanggan.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
</script>

<style>
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }
    
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