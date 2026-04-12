@extends('admin.layout')

@section('title', 'Detail Produk')
@section('header', 'Detail Produk')
@section('subheader', 'Informasi lengkap produk')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-5">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden">
                        @if($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama)))
                            <img src="{{ asset('images/' . $produk->gambar_utama) }}" 
                                 alt="{{ $produk->nama_produk }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-xl"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">{{ $produk->nama_produk }}</h1>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $produk->slug }}</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.produk.edit', $produk->id) }}" 
                       class="px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm">
                        <i class="fas fa-edit text-xs"></i> Edit
                    </a>
                    <a href="{{ route('admin.produk.index') }}" 
                       class="px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        <i class="fas fa-arrow-left text-xs"></i> Kembali
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500">Kategori</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $produk->kategori->nama_kategori ?? 'Umum' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Harga</p>
                        <p class="text-xl font-bold text-[#B08968]">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Stok</p>
                        <p class="font-medium text-gray-800 text-sm {{ $produk->stok <= 5 ? 'text-red-500' : '' }}">{{ $produk->stok }} unit</p>
                    </div>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Deskripsi</p>
                    <p class="text-gray-700 mt-1 leading-relaxed text-sm">{{ $produk->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection