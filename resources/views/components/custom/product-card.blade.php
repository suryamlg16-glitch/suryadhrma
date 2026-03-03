@props([
    'product' => null,
    'image' => 'https://via.placeholder.com/300x200',
    'name' => 'Nama Produk',
    'price' => 0,
    'slug' => '#'
])

<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
    <img src="{{ $product->gambar ?? $image }}" 
         alt="{{ $product->nama_produk ?? $name }}"
         class="w-full h-56 object-cover">
    
    <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-2">
            {{ $product->nama_produk ?? $name }}
        </h3>
        
        <div class="flex items-center justify-between mb-4">
            <span class="text-2xl font-bold text-indigo-600">
                Rp {{ number_format($product->harga ?? $price, 0, ',', '.') }}
            </span>
            @if(isset($product->stok) && $product->stok < 10)
            <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">
                Stok {{ $product->stok }}
            </span>
            @endif
        </div>
        
        <a href="{{ route('produk.detail', $product->slug ?? $slug) }}" 
           class="block w-full text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
            Lihat Detail
        </a>
    </div>
</div>