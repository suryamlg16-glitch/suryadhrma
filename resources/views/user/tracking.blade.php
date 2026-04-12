@extends('layouts.frontend')

@section('title', 'Cek Pesanan')

@section('content')
<div class="bg-white py-10">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-[#B08968]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8 text-[#B08968]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mb-1">Cek Pesanan</h1>
            <p class="text-xs text-gray-500">Masukkan nomor pesanan dan WhatsApp Anda</p>
        </div>
        
        <!-- Pesan Error -->
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-xs text-red-600">{{ session('error') }}</p>
                </div>
            </div>
        @endif
        
        <!-- Form Cek Pesanan -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5">
            <form action="{{ route('tracking.cek') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Nomor Pesanan</label>
                    <input type="text" 
                           name="invoice" 
                           placeholder="Contoh: INV-20240409-ABC123" 
                           value="{{ old('invoice') }}"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50">
                    @error('invoice')
                        <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" 
                           name="no_wa" 
                           placeholder="081234567890" 
                           value="{{ old('no_wa') }}"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#B08968] focus:border-[#B08968] transition bg-gray-50">
                    @error('no_wa')
                        <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" 
                        class="w-full bg-[#B08968] text-white font-semibold py-2.5 rounded-lg text-sm hover:bg-[#8B6F4F] transition duration-300 shadow-sm">
                    Lihat Status Pesanan
                </button>
            </form>
        </div>
        
        <!-- Alternatif: Hubungi Admin -->
        <div class="text-center mt-5">
            <p class="text-xs text-gray-400 mb-2">Atau hubungi admin via WhatsApp</p>
            <a href="https://wa.me/6282231289379?text=Saya%20ingin%20cek%20status%20pesanan%20saya" 
               target="_blank" 
               class="inline-flex items-center gap-2 text-[#3a7d4e] hover:bg-[#f0f8f3] transition px-3 py-1.5 rounded-lg">
                <!-- Icon WhatsApp dari kode yang Anda berikan -->
                <svg class="w-3.5 h-3.5 flex-shrink-0" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#3a7d4e" d="M16.003 2.667C8.638 2.667 2.667 8.638 2.667 16c0 2.354.635 4.558 1.74 6.458L2.667 29.333l7.09-1.713A13.27 13.27 0 0016.003 29.333C23.365 29.333 29.333 23.362 29.333 16S23.365 2.667 16.003 2.667z"/>
                    <path fill="#fff" d="M22.003 19.348c-.325-.163-1.924-.948-2.222-1.057-.298-.108-.515-.163-.732.163-.217.325-.839 1.057-.028 1.003-.217.325-.434.366-.759.203-1.924-.948-3.182-1.698-4.44-3.85-.336-.577.336-.537.962-1.787.108-.217.054-.406-.027-.569-.081-.163-.732-1.762-1.003-2.412-.264-.633-.533-.546-.732-.556-.19-.009-.406-.011-.623-.011s-.569.081-.867.406c-.298.325-1.138 1.111-1.138 2.71s1.165 3.143 1.328 3.36c.163.217 2.288 3.494 5.545 4.902.774.334 1.379.534 1.85.683.777.247 1.484.212 2.042.129.623-.093 1.924-.786 2.195-1.545.271-.759.271-1.41.19-1.545-.081-.136-.298-.217-.623-.38z"/>
                </svg>
                <span class="text-xs font-medium">Chat Admin via WhatsApp</span>
            </a>
        </div>
    </div>
</div>
@endsection