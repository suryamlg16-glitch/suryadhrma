@extends('admin.layout')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori')
@section('subheader', 'Tambah data kategori baru')

@section('content')
<div class="space-y-4">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf
            
            <div class="p-5 space-y-4">
                <!-- Nama Kategori -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="nama_kategori" 
                           value="{{ old('nama_kategori') }}"
                           required
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                    <p class="text-[10px] text-gray-400 mt-1">Contoh: Kursi, Meja, Lemari, Rak, dll.</p>
                    @error('nama_kategori')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Deskripsi -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" 
                              rows="4"
                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">{{ old('deskripsi') }}</textarea>
                    <p class="text-[10px] text-gray-400 mt-1">Deskripsi singkat tentang kategori ini (opsional).</p>
                    @error('deskripsi')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="px-5 py-3 bg-gray-50 border-t border-gray-100 flex justify-end gap-2">
                <a href="{{ route('admin.kategori.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-sm">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition shadow-sm text-sm">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection