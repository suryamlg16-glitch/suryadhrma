@extends('admin.layout')

@section('title', 'Edit Produk')
@section('header', 'Edit Produk')
@section('subheader', 'Edit data produk yang sudah ada')

@section('content')
<div class="space-y-4">

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="p-5 space-y-5">

                {{-- Nama Produk --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Nama Produk <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           name="nama_produk"
                           value="{{ old('nama_produk', $produk->nama_produk) }}"
                           required
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                  placeholder-gray-300 transition-all duration-200">
                    @error('nama_produk')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Harga --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Harga (Estimasi /meter) <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400 pointer-events-none">Rp</span>
                        <input type="number"
                               name="harga"
                               value="{{ old('harga', $produk->harga) }}"
                               required
                               class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                      focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                      placeholder-gray-300 transition-all duration-200">
                    </div>
                    @error('harga')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Deskripsi <span class="text-red-400">*</span>
                    </label>
                    <textarea name="deskripsi"
                              rows="4"
                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                     focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                     placeholder-gray-300 transition-all duration-200 resize-none">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Gambar --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Gambar Produk
                    </label>

                    {{-- Gambar saat ini --}}
                    @if($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama)))
                    <div class="flex items-center gap-3 mb-3 p-3 bg-gray-50 border border-gray-100 rounded-lg">
                        <img src="{{ asset('images/' . $produk->gambar_utama) }}"
                             alt="{{ $produk->nama_produk }}"
                             class="w-12 h-12 object-cover rounded-lg border border-gray-200 flex-shrink-0">
                        <div>
                            <p class="text-xs font-medium text-gray-700">Gambar saat ini</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Upload gambar baru untuk mengganti</p>
                        </div>
                    </div>
                    @endif

                    {{-- Drop Zone --}}
                    <div id="uploadArea"
                         class="border border-dashed border-gray-200 rounded-lg px-4 py-8 text-center cursor-pointer
                                hover:border-[#B08968] hover:bg-[#B08968]/[.02] transition-all duration-200">
                        <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Klik untuk upload gambar baru</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">JPG, PNG — maks. 2MB (opsional)</p>
                            </div>
                        </div>
                    </div>

                    {{-- Preview --}}
                    <div id="previewContainer" class="hidden mt-3 flex items-center gap-3">
                        <img id="previewImage" src="#" alt="Preview"
                             class="w-16 h-16 object-cover rounded-lg border border-gray-100">
                        <div>
                            <p id="previewName" class="text-xs text-gray-700 font-medium"></p>
                            <button type="button" id="removeImage"
                                    class="text-[10px] text-red-400 hover:text-red-500 mt-0.5 transition-colors">
                                Hapus gambar
                            </button>
                        </div>
                    </div>

                    @error('gambar')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer Actions --}}
            <div class="px-5 py-3.5 bg-gray-50 border-t border-gray-100 flex justify-end gap-2">
                <a href="{{ route('admin.produk.index') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 border border-gray-200 text-gray-600 text-sm
                          rounded-lg hover:bg-gray-100 active:scale-[.97] transition-all duration-150">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#B08968] text-white text-sm font-medium
                               rounded-lg hover:bg-[#9a7455] active:scale-[.97] transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Produk
                </button>
            </div>

        </form>
    </div>

</div>

<script>
const uploadArea       = document.getElementById('uploadArea');
const fileInput        = document.getElementById('gambar');
const previewContainer = document.getElementById('previewContainer');
const previewImage     = document.getElementById('previewImage');
const previewName      = document.getElementById('previewName');
const removeImage      = document.getElementById('removeImage');

uploadArea.addEventListener('click', () => fileInput.click());

uploadArea.addEventListener('dragover', e => {
    e.preventDefault();
    uploadArea.classList.add('border-[#B08968]', 'bg-[#B08968]/[.02]');
});
uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('border-[#B08968]', 'bg-[#B08968]/[.02]');
});
uploadArea.addEventListener('drop', e => {
    e.preventDefault();
    uploadArea.classList.remove('border-[#B08968]', 'bg-[#B08968]/[.02]');
    if (e.dataTransfer.files[0]) {
        fileInput.files = e.dataTransfer.files;
        showPreview(e.dataTransfer.files[0]);
    }
});

fileInput.addEventListener('change', function () {
    if (this.files && this.files[0]) showPreview(this.files[0]);
});

function showPreview(file) {
    const reader = new FileReader();
    reader.onload = e => {
        previewImage.src = e.target.result;
        previewName.textContent = file.name;
        previewContainer.classList.remove('hidden');
        uploadArea.classList.add('hidden');
    };
    reader.readAsDataURL(file);
}

removeImage.addEventListener('click', () => {
    fileInput.value = '';
    previewContainer.classList.add('hidden');
    uploadArea.classList.remove('hidden');
});
</script>
@endsection