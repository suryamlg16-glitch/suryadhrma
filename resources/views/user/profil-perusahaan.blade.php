@extends('layouts.frontend')

@section('title', 'Profil Perusahaan')

@section('content')
    <!-- HERO SECTION -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-10 reveal" data-delay="0">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Profil <span class="text-[#B08968]">Perusahaan</span>
            </h1>
            <div class="w-12 h-0.5 bg-[#B08968] mx-auto rounded-full"></div>
            <p class="text-gray-500 text-sm mt-3 max-w-2xl mx-auto">
                Dedikasi kami dalam menciptakan furniture berkualitas dengan desain modern dan fungsional
            </p>
        </div>
    </div>

    <!-- TENTANG PERUSAHAAN -->
    <div class="bg-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="order-2 lg:order-1 reveal" data-delay="0.1">
                    <span class="text-xs font-semibold text-[#B08968] uppercase tracking-wider">Tentang Kami</span>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mt-2 mb-3">
                        541 Furniture
                    </h2>
                    <div class="w-10 h-0.5 bg-[#B08968] rounded-full mb-4"></div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami menyediakan berbagai produk furniture dan interior custom dengan desain modern, 
                        fungsional, dan berkualitas. Dengan pengalaman pengerjaan mebel rumah dan ruang usaha, 
                        541 Furniture berkomitmen menghadirkan hasil yang rapi, tahan lama, dan sesuai kebutuhan 
                        pelanggan — mulai dari kitchen set, backdrop TV, lemari, hingga panel dekoratif.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-5">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs text-gray-600">Berpengalaman >5 Tahun</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs text-gray-600">100+ Proyek Selesai</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs text-gray-600">Kepuasan 98%</span>
                        </div>
                    </div>
                </div>
                <div class="relative order-1 lg:order-2 reveal" data-delay="0.2">
                    <div class="rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ asset('images/imageprofil.jpeg') }}" 
                                 alt="Toko 541 Furniture" 
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                 loading="lazy"
                                 onerror="this.src='https://via.placeholder.com/600x400?text=541+Furniture'"
                                 style="object-position: 50% 65%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KEUNGGULAN -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 reveal" data-delay="0">
                <span class="text-xs font-semibold text-[#B08968] uppercase tracking-wider">Keunggulan</span>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mt-2">
                    Kenapa Memilih <span class="text-[#B08968]">Kami?</span>
                </h2>
                <div class="w-12 h-0.5 bg-[#B08968] mx-auto rounded-full mt-3"></div>
                <p class="text-gray-500 text-xs mt-3">Keunggulan yang membuat kami berbeda</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @php
                    $advantages = [
                        ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Material Berkualitas', 'desc' => 'Material pilihan dengan standar kualitas terbaik', 'delay' => '0.1'],
                        ['icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'title' => 'Custom Desain', 'desc' => 'Bebas menentukan desain sesuai keinginan', 'delay' => '0.15'],
                        ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Pengerjaan Rapi', 'desc' => 'Detail teliti dengan finishing sempurna', 'delay' => '0.2'],
                        ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Harga Kompetitif', 'desc' => 'Harga bersaing dengan kualitas terbaik', 'delay' => '0.25'],
                        ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'title' => 'Tim Berpengalaman', 'desc' => 'Profesional yang berpengalaman di bidangnya', 'delay' => '0.3'],
                        ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'title' => 'Jangkauan Layanan', 'desc' => 'Melayani Jawa Timur dan sekitarnya', 'delay' => '0.35'],
                    ];
                @endphp
                @foreach($advantages as $adv)
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 reveal" data-delay="{{ $adv['delay'] }}">
                    <div class="w-9 h-9 bg-[#B08968]/10 rounded-lg flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $adv['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-0.5">{{ $adv['title'] }}</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">{{ $adv['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- LAYANAN & PROSES -->
    <div class="bg-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Layanan Kami -->
                <div class="reveal" data-delay="0.1">
                    <h2 class="text-base font-bold text-gray-900 mb-3">Layanan Kami</h2>
                    <div class="w-8 h-0.5 bg-[#B08968] rounded-full mb-4"></div>
                    <div class="grid grid-cols-2 gap-2">
                        @php
                            $services = [
                                'Kitchen Set', 'Backdrop TV', 'Lemari Pakaian', 
                                'Panel Dekoratif', 'Konsultasi Desain', 'Pengukuran Gratis'
                            ];
                        @endphp
                        @foreach($services as $index => $service)
                        <div class="flex items-center gap-2 p-2.5 bg-gray-50 rounded-lg border border-gray-100 hover:border-[#B08968]/30 transition-colors group reveal" data-delay="{{ 0.1 + ($index * 0.05) }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B08968] group-hover:w-2 transition-all"></span>
                            <span class="text-xs text-gray-700 group-hover:text-[#B08968] transition-colors">{{ $service }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Proses Pemesanan -->
                <div class="reveal" data-delay="0.2">
                    <h2 class="text-base font-bold text-gray-900 mb-3">Proses Pemesanan</h2>
                    <div class="w-8 h-0.5 bg-[#B08968] rounded-full mb-4"></div>
                    <div class="space-y-2">
                        @php
                            $steps = [
                                'Konsultasi kebutuhan & desain',
                                'Pengukuran lokasi',
                                'Desain & Penawaran harga',
                                'Produksi',
                                'Pengiriman & Pemasangan',
                            ];
                        @endphp
                        @foreach($steps as $i => $step)
                        <div class="flex items-center gap-3 p-2.5 bg-gray-50 rounded-lg border border-gray-100 group hover:border-[#B08968]/30 transition-all reveal" data-delay="{{ 0.2 + ($i * 0.05) }}">
                            <div class="w-5 h-5 bg-[#B08968] text-white rounded-full flex items-center justify-center text-[10px] font-bold flex-shrink-0">{{ $i + 1 }}</div>
                            <p class="text-xs text-gray-700 group-hover:text-[#B08968] transition-colors">{{ $step }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JANGKAUAN LAYANAN -->
    <div class="bg-gray-50 py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 reveal" data-delay="0.1">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4 text-[#B08968]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <h2 class="text-sm font-bold text-gray-900">Jangkauan Layanan</h2>
                </div>
                <div class="w-8 h-0.5 bg-[#B08968] rounded-full mb-2"></div>
                <p class="text-sm text-gray-600 mb-1">
                    Melayani <span class="font-semibold text-[#B08968]">Jawa Timur (Surabaya, Malang, Sidoarjo, Gresik, Pasuruan, Probolinggo, dan sekitarnya)</span>.
                </p>
                <p class="text-xs text-gray-500">
                    Kami siap melayani kebutuhan furniture Anda, baik untuk rumah tinggal, apartemen, kantor, maupun ruang usaha.
                </p>
            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="bg-[#8B6F4F] py-6 reveal" data-delay="0">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-bold text-white mb-1">Siap Mewujudkan Furniture Impian Anda?</h3>
                    <p class="text-white/90 text-xs">Konsultasikan kebutuhan furniture custom Anda dengan tim kami</p>
                </div>
                <a href="{{ route('kontak') }}" 
                   class="group inline-flex items-center gap-2 bg-white text-[#8B6F4F] px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span>Hubungi Kami</span>
                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Reveal animation on scroll
    (function() {
        const revealElements = document.querySelectorAll('.reveal');
        
        const revealOnScroll = () => {
            revealElements.forEach(el => {
                const windowHeight = window.innerHeight;
                const revealTop = el.getBoundingClientRect().top;
                const revealPoint = 150;
                
                if (revealTop < windowHeight - revealPoint) {
                    const delay = el.getAttribute('data-delay') || 0;
                    setTimeout(() => {
                        el.classList.add('active');
                    }, delay * 1000);
                }
            });
        };
        
        // Add CSS for reveal animation
        const style = document.createElement('style');
        style.textContent = `
            .reveal {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease-out;
            }
            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
        
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
        revealOnScroll();
    })();
</script>
@endpush