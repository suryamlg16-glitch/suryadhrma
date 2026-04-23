@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')
@section('subheader', 'Kelola dan pantau data produk furniture custom Anda')

@section('content')
<div class="space-y-4">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <!-- Total Produk -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Produk</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalProduk ?? $produk->total() }}</p>
            </div>
            <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
        </div>

        <!-- Total Pesanan -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 flex justify-between items-center
                    relative overflow-hidden group cursor-default transition-transform duration-200 hover:-translate-y-0.5">
            <div>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Total Pesanan</p>
                <p class="text-2xl font-semibold text-[#B08968]">{{ $totalPesanan ?? 0 }}</p>
            </div>
            <div class="w-9 h-9 bg-[#B08968]/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#B08968] transition-all duration-500 group-hover:w-full"></div>
        </div>

    </div>

    {{-- Toolbar: Search + Add Button --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-4 py-3 flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
            </svg>
            <input type="text"
                   id="searchInput"
                   placeholder="Cari nama produk..."
                   value="{{ request('search') }}"
                   class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                          placeholder-gray-400 transition-all duration-200">
        </div>
        <a href="{{ route('admin.produk.create') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-[#B08968] text-white text-sm font-medium
                  rounded-lg hover:bg-[#9a7455] active:scale-[.97] transition-all duration-200 whitespace-nowrap">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    {{-- Products Table --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider w-10">No</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider w-14">Gambar</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider">Nama Produk</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider w-32">Harga</th>
                        <th class="px-4 py-3 text-left text-[10px] font-medium text-gray-400 uppercase tracking-wider w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($produk as $item)
                    <tr class="hover:bg-gray-50/70 transition-colors duration-150 group">

                        <td class="px-4 py-3 text-xs text-gray-400">
                            {{ $loop->iteration + ($produk->currentPage() - 1) * $produk->perPage() }}
                        </td>

                        <td class="px-4 py-3">
                            @if($item->gambar_utama && file_exists(public_path('images/' . $item->gambar_utama)))
                                <img src="{{ asset('images/' . $item->gambar_utama) }}"
                                     alt="{{ $item->nama_produk }}"
                                     class="w-10 h-10 object-cover rounded-lg border border-gray-100">
                            @else
                                <div class="w-10 h-10 bg-gray-100 rounded-lg border border-gray-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <p class="text-sm font-medium text-gray-800">{{ $item->nama_produk }}</p>
                        </td>

                        <td class="px-4 py-3">
                            <span class="text-sm font-semibold text-[#B08968]">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.produk.show', $item->id) }}"
                                   class="w-7 h-7 flex items-center justify-center rounded-lg border border-gray-200
                                          hover:bg-[#B08968]/10 hover:border-[#B08968]/30 transition-all duration-150">
                                    <svg class="w-3.5 h-3.5 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.produk.edit', $item->id) }}"
                                   class="w-7 h-7 flex items-center justify-center rounded-lg border border-gray-200
                                          hover:bg-blue-50 hover:border-blue-200 transition-all duration-150">
                                    <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-14 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <p class="text-sm text-gray-400">Belum ada produk</p>
                                <a href="{{ route('admin.produk.create') }}"
                                   class="mt-1 text-xs text-[#B08968] hover:text-[#9a7455] transition-colors">
                                    + Tambahkan produk pertama
                                </a>
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
                Menampilkan {{ $produk->firstItem() ?? 0 }}–{{ $produk->lastItem() ?? 0 }}
                dari {{ $produk->total() }} produk
            </p>
            <div>
                {{ $produk->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

</div>

<script>
let _st;
document.getElementById('searchInput')?.addEventListener('keyup', function () {
    clearTimeout(_st);
    _st = setTimeout(() => submitFilterForm(), 500);
});

function submitFilterForm() {
    const url = new URL(window.location.href);
    url.searchParams.set('search', document.getElementById('searchInput')?.value || '');
    url.searchParams.set('page', '1');
    window.location.href = url.toString();
}
</script>
@endsection