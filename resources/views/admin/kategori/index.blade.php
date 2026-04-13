@extends('admin.layout')

@section('title', 'Kelola Kategori')
@section('header', 'Kelola Kategori')
@section('subheader', 'Kelola dan pantau data kategori produk furniture Anda')

@section('content')
<div class="space-y-4">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Kategori</p>
                    <p class="text-xl font-bold text-gray-800">{{ $totalKategori }}</p>
                </div>
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tags text-gray-500 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Produk</p>
                    <p class="text-xl font-bold text-blue-600">{{ \App\Models\Produk::count() }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-blue-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Rata-rata Produk/Kategori</p>
                    <p class="text-xl font-bold text-green-600">{{ $totalKategori > 0 ? round(\App\Models\Produk::count() / $totalKategori, 1) : 0 }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chart-line text-green-600 text-sm"></i>
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
                           placeholder="Cari berdasarkan nama kategori..." 
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.kategori.create') }}" 
                   class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition shadow-sm text-sm flex items-center gap-2">
                    <i class="fas fa-plus text-xs"></i> Tambah Kategori
                </a>
            </div>
        </div>
    </div>
    
    <!-- Categories Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Nama Kategori</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Slug</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Jumlah Produk</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Dibuat</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kategoris as $index => $item)
                    <tr class="hover:bg-gray-50 transition" data-nama="{{ strtolower($item->nama_kategori) }}">
                        <td class="px-4 py-3">
                            <span class="text-gray-800 text-sm">{{ $loop->iteration + ($kategoris->currentPage() - 1) * $kategoris->perPage() }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-800 text-sm">{{ $item->nama_kategori }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-[10px] text-gray-400">{{ $item->slug }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 bg-[#B08968]/10 text-[#B08968] text-[10px] rounded-full">
                                {{ $item->produk_count }} Produk
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-600">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.kategori.show', $item->id_kategori) }}" 
                                   class="text-[#B08968] hover:text-[#8B6F4F] transition text-sm">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('admin.kategori.edit', $item->id_kategori) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition text-sm">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <button onclick="confirmDelete({{ $item->id_kategori }}, '{{ $item->nama_kategori }}', {{ $item->produk->count() }})" 
                                        class="text-red-500 hover:text-red-700 transition text-sm">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-folder-open text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada kategori. Tambahkan kategori baru!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $kategoris->links() }}
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-5 max-w-sm w-full mx-4">
        <div class="text-center">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-trash-alt text-red-500 text-lg"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Hapus Kategori</h3>
            <p id="deleteMessage" class="text-xs text-gray-500 mb-4">Apakah Anda yakin ingin menghapus kategori ini?</p>
            <div id="warningMessage" class="hidden mb-4 p-2 bg-yellow-50 rounded-lg">
                <p id="warningText" class="text-xs text-yellow-600"></p>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-2">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        Batal
                    </button>
                    <button type="submit" id="confirmDeleteBtn"
                            class="flex-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name, productCount) {
        document.getElementById('deleteMessage').innerHTML = `Apakah Anda yakin ingin menghapus kategori <strong>"${name}"</strong>?`;
        document.getElementById('deleteForm').action = `/admin/kategori/${id}`;
        
        if (productCount > 0) {
            document.getElementById('warningMessage').classList.remove('hidden');
            document.getElementById('warningText').innerHTML = `⚠️ Kategori ini memiliki ${productCount} produk. Kategori tidak bisa dihapus!`;
            document.getElementById('confirmDeleteBtn').disabled = true;
            document.getElementById('confirmDeleteBtn').classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            document.getElementById('warningMessage').classList.add('hidden');
            document.getElementById('confirmDeleteBtn').disabled = false;
            document.getElementById('confirmDeleteBtn').classList.remove('opacity-50', 'cursor-not-allowed');
        }
        
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
    
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        let search = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let name = row.getAttribute('data-nama') || '';
            if (name.includes(search)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection