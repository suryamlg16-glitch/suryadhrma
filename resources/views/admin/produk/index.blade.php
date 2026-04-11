@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')
@section('subheader', 'Kelola data produk furniture Anda')

@section('content')
<div class="space-y-4">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Daftar Produk</h1>
            <p class="text-xs text-gray-500 mt-0.5">Total {{ $produk->total() }} produk tersedia</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" 
           class="inline-flex items-center gap-2 bg-[#B08968] text-white px-4 py-2 rounded-lg hover:bg-[#8B6F4F] transition shadow-md hover:shadow-lg text-sm">
            <i class="fas fa-plus text-xs"></i>
            <span>Tambah Produk Baru</span>
        </a>
    </div>
    
    <!-- Search & Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3">
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari produk berdasarkan nama..." 
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                </div>
            </div>
            <div class="flex gap-2">
                <select id="kategoriFilter" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Kategori::all() as $kat)
                        <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                <select id="sortBy" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] bg-white">
                    <option value="terbaru">Terbaru</option>
                    <option value="termurah">Termurah</option>
                    <option value="termahal">Termahal</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-semibold text-gray-500 uppercase tracking-wider">#</th>
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
                        <td class="px-4 py-3 text-xs text-gray-500">{{ $produk->firstItem() + $index }}</td>
                        <td class="px-4 py-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden">
                                @if($item->gambar_utama && file_exists(public_path('images/' . $item->gambar_utama)))
                                    <img src="{{ asset('images/' . $item->gambar_utama) }}" 
                                         alt="{{ $item->nama_produk }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-xs"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-gray-800 text-sm">{{ $item->nama_produk }}</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">{{ $item->slug }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 bg-[#B08968]/10 text-[#B08968] text-[10px] rounded-full">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-[#B08968] text-sm">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            @if($item->harga_min && $item->harga_max)
                                <p class="text-[10px] text-gray-400">Min-Max</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($item->stok <= 5)
                                <span class="text-red-500 font-medium text-xs">{{ $item->stok }} tersisa</span>
                            @else
                                <span class="text-gray-600 text-xs">{{ $item->stok }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.produk.edit', $item->id) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition text-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama_produk }}')" 
                                        class="text-red-500 hover:text-red-700 transition text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="{{ route('admin.produk.show', $item->id) }}" 
                                   class="text-gray-500 hover:text-gray-700 transition text-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500 text-sm">
                            <i class="fas fa-box-open text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada produk. Tambahkan produk baru!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $produk->links() }}
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