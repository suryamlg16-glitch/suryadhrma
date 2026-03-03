@extends('layouts.frontend')

@section('title', 'Katalog Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Katalog Produk</h1>
        <p class="text-gray-600 mt-2">
            Temukan berbagai pilihan furniture berkualitas dalam katalog produk kami 
            — lengkap dengan desain dan kisaran harga.
        </p>
    </div>
    
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Sidebar / Filter -->
        <div class="md:w-64">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-semibold text-lg mb-4">Kategori</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('katalog') }}" 
                           class="text-gray-600 hover:text-indigo-600 {{ !request('kategori') ? 'font-semibold text-indigo-600' : '' }}">
                            Semua Produk
                        </a>
                    </li>
                    @foreach($kategori as $kat)
                    <li>
                        <a href="{{ route('katalog.kategori', $kat->slug) }}" 
                        class="text-gray-600 hover:text-indigo-600 {{ isset($kategoriTerpilih) && $kategoriTerpilih->id_kategori == $kat->id_kategori ? 'font-semibold text-indigo-600' : '' }}">
                        {{ $kat->nama_kategori }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                
                <!-- Menu Navigasi (dari desain) -->
                <h3 class="font-semibold text-lg mt-8 mb-4">MENU</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('beranda') }}" class="text-gray-600 hover:text-indigo-600">HOME</a></li>
                    <li><a href="{{ route('katalog') }}" class="text-gray-600 hover:text-indigo-600">KATALOG PRODUK</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-indigo-600">FITUR PEMESANAN</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-indigo-600">PROFIL PERUSAHAAN</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-indigo-600">CONTACT US</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Grid Produk -->
        <div class="flex-1">
            <!-- Search Bar -->
            <div class="mb-6">
                <form action="{{ route('katalog') }}" method="GET">
                    <div class="flex gap-2">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari produk..." 
                               value="{{ request('search') }}"
                               class="flex-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Produk Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($produk as $item)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    <img src="{{ $item->gambar ?? 'https://via.placeholder.com/300x200' }}" 
                         alt="{{ $item->nama_produk }}"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-2">{{ $item->nama_produk }}</h3>
                        <p class="text-indigo-600 font-bold">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('produk.detail', $item->slug) }}" 
                           class="mt-4 block text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500">Tidak ada produk ditemukan</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection