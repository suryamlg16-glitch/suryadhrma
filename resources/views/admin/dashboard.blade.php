@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<section class="relative bg-amber-50">
    <div class="relative h-96 md:h-[500px] overflow-hidden">
        <img class="w-full h-full object-cover" src="https://via.placeholder.com/1200x500?text=Kitchen+Interior" alt="Kitchen Interior">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Ciptakan Ruang yang Nyaman</h1>
                <p class="text-lg md:text-xl">Temukan furniture terbaik untuk rumah impian Anda</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-amber-50 rounded-lg shadow-md p-8 text-center">
                <h3 class="text-2xl font-bold text-amber-800 mb-4">TOTAL USER</h3>
                <p class="text-4xl font-bold text-gray-900">150</p>
            </div>
            <div class="bg-amber-50 rounded-lg shadow-md p-8 text-center">
                <h3 class="text-2xl font-bold text-amber-800 mb-4">TOTAL PRODUK</h3>
                <p class="text-4xl font-bold text-gray-900">75</p>
            </div>
            <div class="bg-amber-50 rounded-lg shadow-md p-8 text-center">
                <h3 class="text-2xl font-bold text-amber-800 mb-4">TOTAL PEMESANAN</h3>
                <p class="text-4xl font-bold text-gray-900">45</p>
            </div>
        </div>
    </div>
</section>
@endsection
