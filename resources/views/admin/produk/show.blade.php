@extends('admin.layout')

@section('title', 'Detail Produk')
@section('header', 'Detail Produk')
@section('subheader', 'Informasi lengkap produk')

@section('content')
<div class="space-y-4">

    {{-- Main Card --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between gap-4 flex-wrap">
            <div class="flex items-center gap-3.5">
                <div class="w-14 h-14 rounded-xl border border-gray-100 overflow-hidden flex-shrink-0 bg-gray-50">
                    @if($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama)))
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}"
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div>
                    <h1 class="text-base font-semibold text-gray-800">{{ $produk->nama_produk }}</h1>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.produk.edit', $produk->id) }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-500 text-white text-xs font-medium
                          rounded-lg hover:bg-blue-600 active:scale-[.97] transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.produk.index') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 border border-gray-200 text-gray-600 text-xs font-medium
                          rounded-lg hover:bg-gray-50 active:scale-[.97] transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        {{-- Body --}}
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Left: Key Info --}}
            <div class="space-y-5">
                <div>
                    <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1">Harga (Estimasi /meter)</p>
                    <p class="text-2xl font-semibold text-[#B08968]">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                </div>

                <div class="h-px bg-gray-100"></div>
            </div>

            {{-- Right: Deskripsi --}}
            <div>
                <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-2">Deskripsi</p>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $produk->deskripsi ?? '—' }}
                </p>
            </div>

        </div>
    </div>

</div>
@endsection