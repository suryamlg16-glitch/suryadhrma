@extends('layouts.frontend')

@section('title', $produk->nama_produk ?? 'Detail Produk')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Beranda</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#B08968] transition-colors">Katalog</a>
            <span class="text-gray-400">/</span>
            <span class="text-[#B08968] font-medium">{{ $produk->nama_produk ?? 'Detail Produk' }}</span>
        </div>
    </div>
</div>

<!-- Detail Produk -->
<div class="bg-white py-6 md:py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-8">
            <!-- Gambar Produk -->
            <div class="flex justify-center">
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm max-w-md w-full">
                    <img src="{{ asset('images/' . ($produk->gambar_utama ?? 'imagemeja.jpeg')) }}" 
                         alt="{{ $produk->nama_produk ?? 'Produk' }}"
                         class="w-full h-auto object-cover">
                </div>
            </div>
            
            <!-- Info Produk -->
            <div class="space-y-3">
                <!-- Kategori -->
                <span class="inline-block px-2.5 py-0.5 bg-[#B08968]/10 text-[#B08968] text-[11px] font-medium rounded-full">
                    {{ $produk->kategori->nama_kategori ?? 'Inspirasi Furniture' }}
                </span>
                
                <!-- Nama Produk -->
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    {{ $produk->nama_produk ?? 'Nama Produk' }}
                </h1>
                
                <!-- Harga (Estimasi - BUKAN HARGA FINAL) -->
                <div class="flex items-baseline gap-1.5">
                    <p class="text-2xl md:text-3xl font-bold text-[#B08968]">
                        Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
                    </p>
                    <p class="text-gray-400 text-[11px]">/meter lari</p>
                </div>
                <div class="inline-flex items-center gap-1.5 bg-amber-50 border border-amber-200 rounded-full px-2.5 py-1 w-fit">
                    <svg class="w-3 h-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-[10px] text-amber-700 font-medium">Harga estimasi, bukan harga final</p>
                </div>
                
                <!-- Badge Info Custom -->
                <div class="bg-blue-50 border border-blue-100 rounded-lg p-2.5">
                    <div class="flex gap-2">
                        <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-[11px] text-blue-800 font-medium">Furniture Custom Sesuai Ukuran</p>
                            <p class="text-[10px] text-blue-600 mt-0.5">Harga final akan ditentukan setelah survey & pengukuran lokasi. Tim kami akan memberikan penawaran harga terbaik sesuai kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Deskripsi -->
                <div class="prose prose-gray max-w-none">
                    <p class="text-xs text-gray-600 leading-relaxed">
                        {{ $produk->deskripsi ?? 'Deskripsi produk belum tersedia.' }}
                    </p>
                </div>
                
                <!-- Spesifikasi Bahan -->
                <div class="bg-gray-50 rounded-lg p-3">
                    <h3 class="text-xs font-semibold text-gray-900 mb-2">Spesifikasi & Material</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-[10px] text-gray-500">Material Utama</p>
                            <p class="text-xs font-medium text-gray-800">{{ $produk->bahan ?? 'Kayu Jati' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Finishing</p>
                            <p class="text-xs font-medium text-gray-800">Melamin / Cat Duco</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Warna</p>
                            <p class="text-xs font-medium text-gray-800">{{ $produk->warna ?? 'Natural / Custom' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Garansi</p>
                            <p class="text-xs font-medium text-gray-800">1 Tahun</p>
                        </div>
                    </div>
                </div>
                
                <!-- Layanan yang Didapat -->
                <div class="space-y-1">
                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                        <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Survey & Pengukuran gratis</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                        <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Konsultasi desain bersama tim ahli</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-600">
                        <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Pemasangan oleh tim profesional</span>
                    </div>
                </div>
                
                <!-- TOMBOL - 2 BUTTON -->
                <div class="pt-2 space-y-2.5">
                    <!-- Tombol 1: Buat Pesanan -->
                    <a href="{{ route('pesan.index', ['slug' => $produk->slug]) }}"
                       class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg bg-[#B08968] hover:bg-[#9A7357] active:bg-[#8B6448] text-white text-xs font-medium tracking-wide transition-colors duration-200">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                            <path d="M9 12h6M9 16h4"/>
                        </svg>
                        Buat Pesanan
                    </a>

                    <!-- Tombol 2: Konsultasi via WhatsApp -->
                    <a href="https://wa.me/6282231289379?text=Halo%20saya%20ingin%20konsultasi%20mengenai%20produk%20{{ urlencode($produk->nama_produk ?? '') }}%20di%20541%20Furniture"
                       target="_blank"
                       class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg border border-[#3a7d4e] text-[#3a7d4e] hover:bg-[#f0f8f3] active:bg-[#e2f2e8] text-xs font-medium tracking-wide transition-colors duration-200">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#3a7d4e" d="M16.003 2.667C8.638 2.667 2.667 8.638 2.667 16c0 2.354.635 4.558 1.74 6.458L2.667 29.333l7.09-1.713A13.27 13.27 0 0016.003 29.333C23.365 29.333 29.333 23.362 29.333 16S23.365 2.667 16.003 2.667z"/>
                            <path fill="#fff" d="M22.003 19.348c-.325-.163-1.924-.948-2.222-1.057-.298-.108-.515-.163-.732.163-.217.325-.839 1.057-.028 1.003-.217.325-.434.366-.759.203-1.924-.948-3.182-1.698-4.44-3.85-.336-.577.336-.537.962-1.787.108-.217.054-.406-.027-.569-.081-.163-.732-1.762-1.003-2.412-.264-.633-.533-.546-.732-.556-.19-.009-.406-.011-.623-.011s-.569.081-.867.406c-.298.325-1.138 1.111-1.138 2.71s1.165 3.143 1.328 3.36c.163.217 2.288 3.494 5.545 4.902.774.334 1.379.534 1.85.683.777.247 1.484.212 2.042.129.623-.093 1.924-.786 2.195-1.545.271-.759.271-1.41.19-1.545-.081-.136-.298-.217-.623-.38z"/>
                        </svg>
                        Konsultasi via WhatsApp
                    </a>
                </div>         
                <p class="text-[10px] text-gray-400 text-center mt-1.5">
                    *Tim kami akan menghubungi Anda untuk jadwal survey dan konsultasi
                </p>
            </div>
        </div>
    </div>
</div>

<!-- PROSES PEMESANAN -->
<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 reveal" data-delay="0">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Bagaimana <span class="text-[#B08968]">Cara Memesan?</span>
            </h2>
            <p class="text-sm text-gray-600">Proses mudah untuk mewujudkan furniture impian Anda</p>
        </div>

        <div class="relative">
            <!-- Connector line -->
            <div class="hidden md:block absolute z-0"
                 style="
                     top: calc(20px + 24px);
                     transform: translateY(-50%);
                     left: calc(25% / 2 + 24px);
                     right: calc(25% / 2 + 24px);
                     height: 1px;
                     background: repeating-linear-gradient(to right, #B08968 0, #B08968 6px, transparent 6px, transparent 12px);
                     opacity: 0.4;
                 "></div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative z-10">

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.1">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">1</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Konsultasi</h3>
                    <p class="text-xs text-gray-500">Diskusikan kebutuhan furniture Anda dengan tim ahli kami</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.2">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">2</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Survey & Ukur</h3>
                    <p class="text-xs text-gray-500">Tim kami akan survey dan mengukur lokasi pemasangan</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.3">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">3</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Produksi</h3>
                    <p class="text-xs text-gray-500">Pembuatan furniture sesuai ukuran dan desain yang disepakati</p>
                </div>

                <div class="reveal text-center px-3 py-5 rounded-2xl border border-transparent
                            transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                            hover:-translate-y-2 hover:bg-[#fdf8f4] hover:border-[#e8d5c0]
                            hover:shadow-[0_8px_24px_rgba(176,137,104,0.12)]
                            group" data-delay="0.4">
                    <div class="w-12 h-12 bg-[#B08968] text-white rounded-full flex items-center justify-center text-lg font-bold mx-auto mb-3 shadow-md
                                transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]
                                group-hover:scale-110 group-hover:shadow-[0_6px_18px_rgba(176,137,104,0.4)]">4</div>
                    <h3 class="font-semibold text-gray-900 text-sm mb-1 transition-colors duration-200 group-hover:text-[#B08968]">Pasang</h3>
                    <p class="text-xs text-gray-500">Pengiriman dan pemasangan oleh tim profesional</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection