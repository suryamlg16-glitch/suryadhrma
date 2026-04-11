@extends('admin.layout')

@section('title', 'Kelola Pemesanan')
@section('header', 'Kelola Pemesanan')
@section('subheader', 'Kelola dan pantau status pesanan pelanggan')

@section('content')
<div class="space-y-4">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Pesanan</p>
                    <p class="text-xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                </div>
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-gray-500 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Diproses</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $statistik['diproses'] }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-spinner text-yellow-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Dikirim</p>
                    <p class="text-xl font-bold text-blue-600">{{ $statistik['dikirim'] }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-truck text-blue-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Selesai</p>
                    <p class="text-xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Dibatalkan</p>
                    <p class="text-xl font-bold text-red-600">{{ $statistik['dibatalkan'] }}</p>
                </div>
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-times-circle text-red-600 text-sm"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari berdasarkan nama pelanggan..." 
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                </div>
            </div>
            <div class="flex gap-2">
                <select id="statusFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="diproses">Diproses</option>
                    <option value="dikirim">Dikirim</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
                <input type="date" id="dateFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
            </div>
        </div>
    </div>
    
    <!-- Orders Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pesanan as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="font-medium text-gray-800 text-sm">#{{ str_pad($item->id_pesanan, 5, '0', STR_PAD_LEFT) }}</span>
                         </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-800 text-sm">{{ $item->user->name ?? 'Guest' }}</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">{{ $item->user->email ?? '-' }}</p>
                            </div>
                         </td>
                        <td class="px-4 py-3 text-xs text-gray-600">
                            {{ \Carbon\Carbon::parse($item->tanggal_pesanan)->format('d/m/Y') }}
                         </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                         </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.pesanan.status', $item->id_pesanan) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-select px-2 py-1 text-xs rounded-lg border focus:ring-2 focus:ring-[#B08968] bg-white 
                                    @if($item->status_pesanan == 'selesai') border-green-300 text-green-600
                                    @elseif($item->status_pesanan == 'dikirim') border-blue-300 text-blue-600
                                    @elseif($item->status_pesanan == 'diproses') border-yellow-300 text-yellow-600
                                    @elseif($item->status_pesanan == 'dibatalkan') border-red-300 text-red-600
                                    @else border-gray-300 text-gray-600 @endif">
                                    <option value="pending" {{ $item->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $item->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="dikirim" {{ $item->status_pesanan == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $item->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $item->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                         </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.pesanan.show', $item->id_pesanan) }}" 
                               class="text-[#B08968] hover:text-[#8B6F4F] transition text-sm">
                                <i class="fas fa-eye text-xs"></i> Detail
                            </a>
                         </td>
                     </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada pesanan</p>
                         </td>
                     </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $pesanan->links() }}
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
    
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        let search = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let name = row.querySelector('td:nth-child(2) p')?.innerText.toLowerCase() || '';
            if (name.includes(search)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Filter by status
    document.getElementById('statusFilter')?.addEventListener('change', function() {
        let status = this.value;
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let select = row.querySelector('td:nth-child(5) select');
            let rowStatus = select?.value || '';
            if (!status || rowStatus === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Filter by date
    document.getElementById('dateFilter')?.addEventListener('change', function() {
        let date = this.value;
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let rowDate = row.querySelector('td:nth-child(3)')?.innerText.trim() || '';
            let formattedRowDate = rowDate.split('/').reverse().join('-');
            if (!date || formattedRowDate === date) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection