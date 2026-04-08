@extends('admin.layout')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk')
@section('subheader', 'Tambah data produk baru ke dalam katalog')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="p-6 space-y-6">
                <!-- Nama Produk -->
                <div>
                    <label for="nama_produk" class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="nama_produk" 
                           name="nama_produk" 
                           value="{{ old('nama_produk') }}"
                           required
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968] focus:border-transparent">
                    @error('nama_produk')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Kategori -->
                <div>
                    <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select id="kategori_id" 
                            name="kategori_id" 
                            required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}" {{ old('kategori_id') == $kat->id_kategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Harga & Stok -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" 
                               id="harga" 
                               name="harga" 
                               value="{{ old('harga') }}"
                               required
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">Stok <span class="text-red-500">*</span></label>
                        <input type="number" 
                               id="stok" 
                               name="stok" 
                               value="{{ old('stok') }}"
                               required
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        @error('stok')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-1">Gambar Produk</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-[#B08968] transition cursor-pointer" id="uploadArea">
                        <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Klik untuk upload atau drag & drop</p>
                        <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max 2MB)</p>
                    </div>
                    <div id="previewContainer" class="mt-3 hidden">
                        <img id="previewImage" src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
                        <button type="button" id="removeImage" class="text-red-500 text-sm mt-1">Hapus</button>
                    </div>
                    @error('gambar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk <span class="text-red-500">*</span></label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="6"
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B08968]">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.produk.index') }}" 
                   class="px-5 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-[#B08968] text-white rounded-xl hover:bg-[#8B6F4F] transition shadow-md">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Upload area click
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