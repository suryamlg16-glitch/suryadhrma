@extends('admin.layout')

@section('title', 'Kelola Transaksi')
@section('header', 'Kelola Transaksi')
@section('subheader', 'Kelola dan pantau transaksi pembayaran pelanggan')

@section('content')
<div class="space-y-4">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Pendapatan</p>
                    <p class="text-xl font-bold text-green-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
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
                    <p class="text-xl font-bold text-gray-800">{{ $totalTransaksi }}</p>
                </div>
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-receipt text-gray-500 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Sukses</p>
                    <p class="text-xl font-bold text-green-600">{{ $transaksiSukses }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Pending</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $transaksiPending }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Gagal</p>
                    <p class="text-xl font-bold text-red-600">{{ $transaksiGagal }}</p>
                </div>
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-times-circle text-red-600 text-sm"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistik Metode Pembayaran -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">COD</p>
                    <p class="text-lg font-bold text-gray-800">Rp {{ number_format($statistikMetode['cod'], 0, ',', '.') }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-truck text-blue-600 text-sm"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Transfer Bank</p>
                    <p class="text-lg font-bold text-gray-800">Rp {{ number_format($statistikMetode['transfer'], 0, ',', '.') }}</p>
                </div>
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-university text-purple-600 text-sm"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">QRIS</p>
                    <p class="text-lg font-bold text-gray-800">Rp {{ number_format($statistikMetode['qris'], 0, ',', '.') }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-qrcode text-green-600 text-sm"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
        <form method="GET" action="{{ route('admin.transaksi.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <label class="block text-[10px] text-gray-500 mb-1">Dari Tanggal</label>
                    <input type="date" name="dari_tanggal" value="{{ request('dari_tanggal') }}" 
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                </div>
                <div>
                    <label class="block text-[10px] text-gray-500 mb-1">Sampai Tanggal</label>
                    <input type="date" name="sampai_tanggal" value="{{ request('sampai_tanggal') }}" 
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                </div>
            </div>
            <div class="flex gap-2">
                <select name="metode" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Metode</option>
                    <option value="cod" {{ request('metode') == 'cod' ? 'selected' : '' }}>COD</option>
                    <option value="transfer" {{ request('metode') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
                </select>
                <select name="status" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="sukses" {{ request('status') == 'sukses' ? 'selected' : '' }}>Sukses</option>
                    <option value="gagal" {{ request('status') == 'gagal' ? 'selected' : '' }}>Gagal</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition text-sm">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="{{ route('admin.transaksi.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                    <i class="fas fa-undo"></i> Reset
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
                            <span class="font-medium text-gray-800 text-sm">{{ $item->kode_transaksi }}</span>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-600">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-gray-800 text-sm">{{ $item->pesanan->nama_pelanggan ?? '-' }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->jumlah_dibayar, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-full uppercase">
                                {{ $item->metode_pembayaran }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.transaksi.status', $item->id_pembayaran) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-select px-2 py-1 text-xs rounded-lg border focus:ring-2 focus:ring-[#B08968] bg-white 
                                    @if($item->status == 'sukses') border-green-300 text-green-600
                                    @elseif($item->status == 'pending') border-yellow-300 text-yellow-600
                                    @else border-red-300 text-red-600 @endif">
                                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="sukses" {{ $item->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                    <option value="gagal" {{ $item->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.transaksi.show', $item->id_pembayaran) }}" 
                               class="text-[#B08968] hover:text-[#8B6F4F] transition text-sm">
                                <i class="fas fa-eye text-xs"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-receipt text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada transaksi</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $transaksi->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<script>
    // Auto-submit when status changes
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            this.closest('.status-form').submit();
        });
    });
</script>
@endsection