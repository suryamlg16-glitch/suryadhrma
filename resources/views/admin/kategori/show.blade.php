@extends('admin.layout')

@section('title', 'Detail Kategori')
@section('header', 'Detail Kategori')
@section('subheader', 'Informasi lengkap kategori')

@section('content')
<div class="space-y-4">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-5">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">{{ $kategori->nama_kategori }}</h1>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $kategori->slug }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" 
                       class="px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm">
                        <i class="fas fa-edit text-xs"></i> Edit
                    </a>
                    <a href="{{ route('admin.kategori.index') }}" 
                       class="px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm">
                        <i class="fas fa-arrow-left text-xs"></i> Kembali
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500">Nama Kategori</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $kategori->nama_kategori }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Slug</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $kategori->slug }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Jumlah Produk</p>
                        <p class="font-medium text-gray-800 text-sm">
                            <span class="px-2 py-0.5 bg-[#B08968]/10 text-[#B08968] text-xs rounded-full">
                                {{ $kategori->produk->count() }} Produk
                            </span>
                        </p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Dibuat</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $kategori->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Terakhir Update</p>
                        <p class="font-medium text-gray-800 text-sm">{{ $kategori->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-xs text-gray-500 mb-2">Deskripsi</p>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-gray-700 text-sm leading-relaxed">{{ $kategori->deskripsi ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Daftar Produk dalam Kategori -->
    @if($kategori->produk->count() > 0)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-5 py-3 border-b border-gray-100">
            <h3 class="font-semibold text-gray-800">
                <i class="fas fa-box text-[#B08968] mr-2"></i> Daftar Produk dalam Kategori Ini
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-[10px] font-semibold text-gray-500">No</th>
                        <th class="px-4 py-2 text-left text-[10px] font-semibold text-gray-500">Nama Produk</th>
                        <th class="px-4 py-2 text-left text-[10px] font-semibold text-gray-500">Harga</th>
                        <th class="px-4 py-2 text-left text-[10px] font-semibold text-gray-500">Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($kategori->produk as $index => $produk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-xs text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">
                            <p class="font-medium text-gray-800 text-sm">{{ $produk->nama_produk }}</p>
                        </td>
                        <td class="px-4 py-2 text-sm text-[#B08968]">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">
                            @if($produk->stok <= 0)
                                <span class="text-red-500 text-xs">Habis</span>
                            @elseif($produk->stok <= 5)
                                <span class="text-yellow-600 text-xs">Sisa {{ $produk->stok }}</span>
                            @else
                                <span class="text-gray-600 text-xs">{{ $produk->stok }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection