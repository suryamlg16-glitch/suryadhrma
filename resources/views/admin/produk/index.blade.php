@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')
@section('subheader', 'Kelola dan pantau data produk furniture Anda')

@section('content')
<div class="space-y-4">
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Produk</p>
                    <p class="text-xl font-bold text-gray-800">{{ $totalProduk ?? $produk->total() }}</p>
                </div>
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-gray-500 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Stok Aman</p>
                    <p class="text-xl font-bold text-green-600">{{ $stokAman ?? 0 }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Stok Menipis</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stokMenipis ?? 0 }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-sm"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] text-gray-500">Total Kategori</p>
                    <p class="text-xl font-bold text-blue-600">{{ $totalKategori ?? 0 }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tags text-blue-600 text-sm"></i>
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
                           placeholder="Cari berdasarkan nama produk..." 
                           value="{{ request('search') }}"
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                </div>
            </div>
            <div class="flex gap-2">
                <select id="kategoriFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris ?? [] as $kat)
                        <option value="{{ $kat->id_kategori }}" {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                <select id="sortFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Termurah</option>
                    <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Termahal</option>
                </select>
                <a href="{{ route('admin.produk.create') }}" 
                   class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition shadow-sm text-sm flex items-center gap-2">
                    <i class="fas fa-plus text-xs"></i> Tambah Produk
                </a>
            </div>
        </div>
    </div>
    
    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Nama Produk</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Stok</th>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($produk as $index => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="text-gray-800 text-sm">{{ $loop->iteration + ($produk->currentPage() - 1) * $produk->perPage() }}</span>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->gambar_utama && file_exists(public_path('images/' . $item->gambar_utama)))
                                <img src="{{ asset('images/' . $item->gambar_utama) }}" 
                                     alt="{{ $item->nama_produk }}"
                                     class="w-10 h-10 object-cover rounded-lg">
                            @else
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-sm"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-800 text-sm">{{ $item->nama_produk }}</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">{{ $item->slug }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 bg-[#B08968]/10 text-[#B08968] text-[10px] rounded-full">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->stok <= 0)
                                <span class="text-red-500 font-medium text-xs">Habis</span>
                            @elseif($item->stok <= 5)
                                <span class="text-yellow-600 font-medium text-xs">Sisa {{ $item->stok }}</span>
                            @else
                                <span class="text-gray-600 text-xs">{{ $item->stok }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.produk.show', $item->id) }}" 
                                   class="text-[#B08968] hover:text-[#8B6F4F] transition text-sm">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('admin.produk.edit', $item->id) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition text-sm">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama_produk }}')" 
                                        class="text-red-500 hover:text-red-700 transition text-sm">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-box-open text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada produk. Tambahkan produk baru!</p>
                        </td
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $produk->appends(request()->query())->links() }}
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
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Hapus Produk</h3>
            <p id="deleteMessage" class="text-xs text-gray-500 mb-4">Apakah Anda yakin ingin menghapus produk ini?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-2">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        Batal
                    </button>
                    <button type="submit" 
                            class="flex-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('deleteMessage').innerHTML = `Apakah Anda yakin ingin menghapus produk <strong>"${name}"</strong>?`;
        document.getElementById('deleteForm').action = `/admin/produk/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
    
    // ========== FILTER DENGAN RELOAD HALAMAN ==========
    
    // Search functionality - Submit form saat mengetik (dengan delay)
    let searchTimeout;
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            submitFilterForm();
        }, 500);
    });
    
    // Filter kategori - Submit form saat berubah
    document.getElementById('kategoriFilter')?.addEventListener('change', function() {
        submitFilterForm();
    });
    
    // Sort filter - Submit form saat berubah
    document.getElementById('sortFilter')?.addEventListener('change', function() {
        submitFilterForm();
    });
    
    function submitFilterForm() {
        let search = document.getElementById('searchInput')?.value || '';
        let kategori = document.getElementById('kategoriFilter')?.value || '';
        let sort = document.getElementById('sortFilter')?.value || 'terbaru';
        
        let url = new URL(window.location.href);
        url.searchParams.set('search', search);
        url.searchParams.set('kategori', kategori);
        url.searchParams.set('sort', sort);
        url.searchParams.set('page', '1'); // Reset ke halaman 1 saat filter
        
        window.location.href = url.toString();
    }
</script>
@endsection