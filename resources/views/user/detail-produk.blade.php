@extends('layouts.frontend')

@section('title', $produk->nama_produk)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <div class="mb-8">
        <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-indigo-600">Beranda</a>
        <span class="mx-2 text-gray-400">/</span>
        <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-indigo-600">Katalog</a>
        <span class="mx-2 text-gray-400">/</span>
        <span class="text-indigo-600">{{ $produk->nama_produk }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Gambar Produk -->
        <div>
            <img src="{{ $produk->gambar ?? 'https://via.placeholder.com/600x400' }}" 
                 alt="{{ $produk->nama_produk }}"
                 class="w-full rounded-lg shadow-lg">
        </div>
        
        <!-- Detail Produk -->
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $produk->nama_produk }}</h1>
            
            <div class="mb-4">
                <span class="text-sm text-gray-500">Kategori: </span>
                <a href="{{ route('katalog.kategori', $produk->kategori->slug) }}" 
                   class="text-indigo-600 hover:underline">
                    {{ $produk->kategori->nama_kategori }}
                </a>
            </div>
            
            <div class="mb-6">
                <span class="text-3xl font-bold text-indigo-600">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </span>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
                <p class="text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Stok</h3>
                <p class="text-gray-600">{{ $produk->stok }} unit tersedia</p>
            </div>
            
            <!-- Tombol Aksi -->
            <div class="flex space-x-4">
                <button class="flex-1 bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition">
                    Tambah ke Keranjang
                </button>
                <button class="flex-1 bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition">
                    Beli Sekarang
                </button>
            </div>
        </div>
    </div>
    
    <!-- Produk Terkait -->
    @if($produkTerkait->count() > 0)
    <div class="mt-16">
        <h2 class="text-2xl font-bold mb-8">Produk Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($produkTerkait as $related)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ $related->gambar ?? 'https://via.placeholder.com/300x200' }}" 
                     alt="{{ $related->nama_produk }}"
                     class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">{{ $related->nama_produk }}</h3>
                    <p class="text-indigo-600 font-bold mb-3">
                        Rp {{ number_format($related->harga, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('produk.detail', $related->slug) }}" 
                       class="block text-center bg-gray-100 text-gray-700 py-2 rounded hover:bg-gray-200">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
