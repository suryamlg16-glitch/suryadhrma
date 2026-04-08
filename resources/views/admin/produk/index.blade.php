@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')
@section('subheader', 'Kelola data produk furniture Anda')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Total {{ $produk->total() }} produk tersedia</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" 
           class="inline-flex items-center gap-2 bg-[#B08968] text-white px-5 py-2.5 rounded-xl hover:bg-[#8B6F4F] transition shadow-md hover:shadow-lg">
            <i class="fas fa-plus"></i>
            <span>Tambah Produk Baru</span>
        </a>
    </div>
    
    <!-- Search & Filter -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari produk berdasarkan nama..." 
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                </div>
            </div>
            <div class="flex gap-3">
                <select id="kategoriFilter" class="px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Kategori::all() as $kat)
                        <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                <select id="sortBy" class="px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="terbaru">Terbaru</option>
                    <option value="termurah">Termurah</option>
                    <option value="termahal">Termahal</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Products Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($produk as $index => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $produk->firstItem() + $index }}</td>
                        <td class="px-6 py-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden">
                                @if($item->gambar_utama && file_exists(public_path('images/' . $item->gambar_utama)))
                                    <img src="{{ asset('images/' . $item->gambar_utama) }}" 
                                         alt="{{ $item->nama_produk }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">{{ $item->nama_produk }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $item->slug }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-[#B08968]/10 text-[#B08968] text-xs rounded-full">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-[#B08968]">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            @if($item->harga_min && $item->harga_max)
                                <p class="text-xs text-gray-400">Min-Max</p>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($item->stok <= 5)
                                <span class="text-red-500 font-medium">{{ $item->stok }} tersisa</span>
                            @else
                                <span class="text-gray-600">{{ $item->stok }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.produk.edit', $item->id) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama_produk }}')" 
                                        class="text-red-500 hover:text-red-700 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="{{ route('admin.produk.show', $item->id) }}" 
                                   class="text-gray-500 hover:text-gray-700 transition">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-box-open text-4xl mb-3 text-gray-300"></i>
                            <p>Belum ada produk. Tambahkan produk baru!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $produk->links() }}
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-red-500 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Hapus Produk</h3>
            <p id="deleteMessage" class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus produk ini?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="submit" 
                            class="flex-1 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
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
    
    // Close modal on outside click
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
    
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        let search = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let name = row.querySelector('td:nth-child(3) p')?.innerText.toLowerCase() || '';
            if (name.includes(search)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Filter by kategori
    document.getElementById('kategoriFilter')?.addEventListener('change', function() {
        let kategori = this.value;
        let rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            let kategoriText = row.querySelector('td:nth-child(4) span')?.innerText || '';
            if (!kategori || kategoriText === kategori) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection