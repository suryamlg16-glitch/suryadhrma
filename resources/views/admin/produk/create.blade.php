@extends('admin.layout')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk')
@section('subheader', 'Tambah data produk baru ke dalam katalog')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="p-5 space-y-4">
                <!-- Nama Produk -->
                <div>
                    <label for="nama_produk" class="block text-xs font-semibold text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="nama_produk" 
                           name="nama_produk" 
                           value="{{ old('nama_produk') }}"
                           required
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                    @error('nama_produk')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Kategori -->
                <div>
                    <label for="kategori_id" class="block text-xs font-semibold text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select id="kategori_id" 
                            name="kategori_id" 
                            required
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}" {{ old('kategori_id') == $kat->id_kategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Harga & Stok -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="harga" class="block text-xs font-semibold text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" 
                               id="harga" 
                               name="harga" 
                               value="{{ old('harga') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        @error('harga')
                            <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stok" class="block text-xs font-semibold text-gray-700 mb-1">Stok <span class="text-red-500">*</span></label>
                        <input type="number" 
                               id="stok" 
                               name="stok" 
                               value="{{ old('stok') }}"
                               required
                               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        @error('stok')
                            <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Gambar -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Gambar Produk</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-4 text-center hover:border-[#B08968] transition cursor-pointer" id="uploadArea">
                        <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
                        <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                        <p class="text-gray-500 text-xs">Klik untuk upload atau drag & drop</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">Format: JPG, PNG (Max 2MB)</p>
                    </div>
                    <div id="previewContainer" class="mt-2 hidden">
                        <img id="previewImage" src="#" alt="Preview" class="w-20 h-20 object-cover rounded-lg">
                        <button type="button" id="removeImage" class="text-red-500 text-[10px] mt-1">Hapus</button>
                    </div>
                    @error('gambar')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-xs font-semibold text-gray-700 mb-1">Deskripsi Produk <span class="text-red-500">*</span></label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="5"
                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B08968]">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="px-5 py-3 bg-gray-50 border-t border-gray-100 flex justify-end gap-2">
                <a href="{{ route('admin.produk.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-sm">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-[#B08968] text-white rounded-lg hover:bg-[#8B6F4F] transition shadow-md text-sm">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('gambar');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const removeImage = document.getElementById('removeImage');
    
    uploadArea.addEventListener('click', () => fileInput.click());
    
    fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    removeImage.addEventListener('click', function() {
        fileInput.value = '';
        previewContainer.classList.add('hidden');
        uploadArea.classList.remove('hidden');
    });
</script>
@endsection