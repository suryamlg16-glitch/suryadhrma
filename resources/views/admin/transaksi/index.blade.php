@extends('admin.layout')

@section('title', 'Kelola Transaksi')
@section('header', 'Kelola Transaksi')
@section('subheader', 'Kelola dan pantau transaksi pembayaran pelanggan')

@section('content')
<div class="space-y-6">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-[#B08968]">Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}</p>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Transaksi</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $statistik['total_transaksi'] }}</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-receipt text-blue-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">COD</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $statistik['total_cod'] }}</p>
                </div>
                <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-hand-holding-usd text-purple-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="grid grid-cols-2 gap-2">
                <div class="text-center">
                    <p class="text-xs text-gray-500">QRIS</p>
                    <p class="text-xl font-bold text-blue-600">{{ $statistik['total_qris'] }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">Transfer</p>
                    <p class="text-xl font-bold text-orange-600">{{ $statistik['total_transfer'] }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
        <form method="GET" action="{{ route('admin.transaksi.index') }}" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label class="block text-xs font-medium text-gray-500 mb-1">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" 
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">
            </div>
            <div class="flex-1">
                <label class="block text-xs font-medium text-gray-500 mb-1">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" 
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">
            </div>
            <div class="w-48">
                <label class="block text-xs font-medium text-gray-500 mb-1">Metode Pembayaran</label>
                <select name="metode" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua</option>
                    <option value="cod" {{ request('metode') == 'cod' ? 'selected' : '' }}>COD</option>
                    <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="transfer" {{ request('metode') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-6 py-2.5 bg-[#B08968] text-white rounded-xl hover:bg-[#8B6F4F] transition">
                    <i class="fas fa-search"></i> Filter
                </button>
                <a href="{{ route('admin.transaksi.index') }}" class="px-6 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition">
                    Reset
                </a>
            </div>
        </form>
    </div>
    
    <!-- Transactions Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Metode</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transaksi as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-800">#{{ str_pad($item->id_pesanan, 5, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($item->tanggal_pesanan)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-gray-800">{{ $item->user->name ?? 'Guest' }}</p>
                                <p class="text-xs text-gray-400">{{ $item->user->email ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-[#B08968]">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full 
                                @if($item->pembayaran && $item->pembayaran->metode_pembayaran == 'cod') bg-purple-100 text-purple-600
                                @elseif($item->pembayaran && $item->pembayaran->metode_pembayaran == 'qris') bg-blue-100 text-blue-600
                                @elseif($item->pembayaran && $item->pembayaran->metode_pembayaran == 'transfer') bg-orange-100 text-orange-600
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ strtoupper($item->pembayaran->metode_pembayaran ?? '-') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full 
                                @if($item->pembayaran && $item->pembayaran->status == 'sukses') bg-green-100 text-green-600
                                @elseif($item->pembayaran && $item->pembayaran->status == 'pending') bg-yellow-100 text-yellow-600
                                @elseif($item->pembayaran && $item->pembayaran->status == 'gagal') bg-red-100 text-red-600
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ ucfirst($item->pembayaran->status ?? 'Pending') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.transaksi.show', $item->id_pesanan) }}" 
                               class="text-[#B08968] hover:text-[#8B6F4F] transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                            <p>Belum ada transaksi selesai</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $transaksi->links() }}
        </div>
    </div>
</div>
@endsection