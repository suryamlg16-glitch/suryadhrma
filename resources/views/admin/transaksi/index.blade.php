@extends('admin.layout')

@section('title', 'Kelola Transaksi')
@section('header', 'Kelola Transaksi')
@section('subheader', 'Kelola dan pantau transaksi pembayaran pelanggan')

@section('content')
<div class="space-y-4">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Pendapatan</p>
                    <p class="text-lg font-bold text-[#B08968]">Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-green-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Transaksi</p>
                    <p class="text-xl font-bold text-gray-800">{{ $statistik['total_transaksi'] }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-receipt text-blue-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">COD</p>
                    <p class="text-xl font-bold text-purple-600">{{ $statistik['total_cod'] }}</p>
                </div>
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hand-holding-usd text-purple-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="grid grid-cols-2 gap-2">
                <div class="text-center">
                    <p class="text-[9px] text-gray-500">QRIS</p>
                    <p class="text-base font-bold text-blue-600">{{ $statistik['total_qris'] }}</p>
                </div>
                <div class="text-center">
                    <p class="text-[9px] text-gray-500">Transfer</p>
                    <p class="text-base font-bold text-orange-600">{{ $statistik['total_transfer'] }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filter Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
        <form method="GET" action="{{ route('admin.transaksi.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <label class="block text-[10px] font-medium text-gray-500 mb-0.5">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" 
                       class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
            </div>
            <div class="flex-1">
                <label class="block text-[10px] font-medium text-gray-500 mb-0.5">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" 
                       class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
            </div>
            <div class="w-40">
                <label class="block text-[10px] font-medium text-gray-500 mb-0.5">Metode Pembayaran</label>
                <select name="metode" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua</option>
                    <option value="cod" {{ request('metode') == 'cod' ? 'selected' : '' }}>COD</option>
                    <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="transfer" {{ request('metode') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition text-sm">
                    <i class="fas fa-search text-xs"></i> Filter
                </button>
                <a href="{{ route('admin.transaksi.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                    Reset
                </a>
            </div>
        </form>
    </div>
    
    <!-- Transactions Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Metode</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transaksi as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="font-medium text-gray-800 text-sm">#{{ str_pad($item->id_pesanan, 5, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-600">
                            {{ \Carbon\Carbon::parse($item->tanggal_pesanan)->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-800 text-sm">{{ $item->user->name ?? 'Guest' }}</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">{{ $item->user->email ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-[10px] rounded-full 
                                @if($item->pembayaran && $item->pembayaran->metode_pembayaran == 'cod') bg-purple-100 text-purple-600
                                @elseif($item->pembayaran && $item->pembayaran->metode_pembayaran == 'qris') bg-blue-100 text-blue-600
                                @elseif($item->pembayaran && $item->pembayaran->metode_pembayaran == 'transfer') bg-orange-100 text-orange-600
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ strtoupper($item->pembayaran->metode_pembayaran ?? '-') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-[10px] rounded-full 
                                @if($item->pembayaran && $item->pembayaran->status == 'sukses') bg-green-100 text-green-600
                                @elseif($item->pembayaran && $item->pembayaran->status == 'pending') bg-yellow-100 text-yellow-600
                                @elseif($item->pembayaran && $item->pembayaran->status == 'gagal') bg-red-100 text-red-600
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ ucfirst($item->pembayaran->status ?? 'Pending') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.transaksi.show', $item->id_pesanan) }}" 
                               class="text-[#B08968] hover:text-[#8B6F4F] transition text-sm">
                                <i class="fas fa-eye text-xs"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada transaksi selesai</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $transaksi->links() }}
        </div>
    </div>
</div>
@endsection