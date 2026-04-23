@extends('admin.layout')

@section('title', 'Tambah Transaksi')
@section('header', 'Tambah Transaksi')
@section('subheader', 'Input transaksi manual dari pesanan yang sudah deal')

@section('content')
<div class="space-y-4">

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <form action="{{ route('admin.transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="p-5 space-y-5">

                {{-- Pilih Pesanan --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Pilih Pesanan (Sudah Deal) <span class="text-red-400">*</span>
                    </label>
                    <select name="id_pesanan" id="id_pesanan" required
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                   focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                   transition-all duration-200">
                        <option value="">-- Pilih Pesanan --</option>
                        @foreach($pesananDeal as $item)
                            <option value="{{ $item->id_pesanan }}" data-nama="{{ $item->nama_pelanggan }}" {{ old('id_pesanan') == $item->id_pesanan ? 'selected' : '' }}>
                                #{{ str_pad($item->id_pesanan, 5, '0', STR_PAD_LEFT) }} - {{ $item->nama_pelanggan }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_pesanan')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Metode Pembayaran (Hanya Transfer Bank) --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Metode Pembayaran <span class="text-red-400">*</span>
                    </label>
                    <div>
                        <label class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition
                              {{ old('metode_pembayaran') == 'transfer' ? 'border-[#B08968] bg-[#B08968]/5' : '' }}">
                            <input type="radio" name="metode_pembayaran" value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'checked' : '' }} required>
                            <span class="text-sm">🏦 Transfer Bank</span>
                        </label>
                    </div>
                    @error('metode_pembayaran')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Harga Final (Total Harga Deal) --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Harga Final (Rp) <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">Rp</span>
                        <input type="number" name="total_harga" id="total_harga" value="{{ old('total_harga') }}" required
                               placeholder="0"
                               class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                      focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                      transition-all duration-200">
                    </div>
                    @error('total_harga')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Preview Termin --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Rincian Termin Pembayaran
                    </label>
                    <div class="bg-gray-50 rounded-lg p-3 space-y-2">
                        {{-- DP 30% --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                <span class="text-xs font-medium text-gray-700">DP 30% (Awal)</span>
                            </div>
                            <div>
                                <span id="dp_nominal" class="text-xs font-semibold text-amber-600">Rp 0</span>
                            </div>
                        </div>
                        {{-- Termin 2 30% --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                <span class="text-xs font-medium text-gray-700">Termin 30% (Pengerjaan)</span>
                            </div>
                            <div>
                                <span id="termin2_nominal" class="text-xs font-semibold text-blue-600">Rp 0</span>
                            </div>
                        </div>
                        {{-- Pelunasan 40% --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="text-xs font-medium text-gray-700">Pelunasan 40% (Selesai)</span>
                            </div>
                            <div>
                                <span id="pelunasan_nominal" class="text-xs font-semibold text-green-600">Rp 0</span>
                            </div>
                        </div>
                        {{-- Total --}}
                        <div class="border-t border-gray-200 pt-2 mt-1 flex justify-between items-center">
                            <span class="text-xs font-semibold text-gray-800">Total</span>
                            <span id="total_nominal" class="text-xs font-bold text-[#B08968]">Rp 0</span>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-1.5">*Nominal akan muncul setelah mengisi Harga Final</p>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Pilih Termin --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Termin yang Dibayarkan <span class="text-red-400">*</span>
                    </label>
                    <select name="termin" id="termin_select" required
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                   focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                   transition-all duration-200">
                        <option value="dp" {{ old('termin') == 'dp' ? 'selected' : '' }}>💰 DP 30% - Awal</option>
                        <option value="termin2" {{ old('termin') == 'termin2' ? 'selected' : '' }}>🔧 Termin 30% - Pengerjaan</option>
                        <option value="lunas" {{ old('termin') == 'lunas' ? 'selected' : '' }}>✅ Pelunasan 40% - Selesai</option>
                    </select>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Tanggal Pembayaran --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Tanggal Pembayaran <span class="text-red-400">*</span>
                    </label>
                    <input type="datetime-local" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran') }}" required
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                  transition-all duration-200">
                    @error('tanggal_pembayaran')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Upload Bukti Pembayaran --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Upload Bukti Pembayaran <span class="text-red-400">*</span>
                    </label>
                    <div id="uploadArea"
                         class="border border-dashed border-gray-200 rounded-lg px-4 py-8 text-center cursor-pointer
                                hover:border-[#B08968] hover:bg-[#B08968]/[.02] transition-all duration-200">
                        <input type="file" id="buktiFile" name="bukti_dp" accept="image/*" class="hidden">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500" id="uploadText">Klik untuk upload bukti pembayaran</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">JPG, PNG — maks. 2MB</p>
                            </div>
                        </div>
                    </div>
                    <div id="previewContainer" class="hidden mt-3 flex items-center gap-3">
                        <img id="previewImage" src="#" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-100">
                        <div>
                            <p id="previewName" class="text-xs text-gray-700 font-medium"></p>
                            <button type="button" id="removeImage" class="text-[10px] text-red-400 hover:text-red-500 mt-0.5 transition-colors">
                                Hapus gambar
                            </button>
                        </div>
                    </div>
                    @error('bukti_dp')
                        <p class="text-red-400 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer Actions --}}
            <div class="px-5 py-3.5 bg-gray-50 border-t border-gray-100 flex justify-between gap-2">
                <a href="{{ route('admin.transaksi.index') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 border border-gray-200 text-gray-600 text-sm
                          rounded-lg hover:bg-gray-100 active:scale-[.97] transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#B08968] text-white text-sm font-medium
                               rounded-lg hover:bg-[#9a7455] active:scale-[.97] transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Transaksi
                </button>
            </div>

        </form>
    </div>

</div>

<script>
// Format Rupiah
function formatRupiah(angka) {
    return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
}

// Hitung dan update semua nominal termin
function updateTerminNominal() {
    const hargaInput = document.getElementById('total_harga');
    let harga = parseInt(hargaInput.value) || 0;
    
    const dp30 = Math.floor(harga * 30 / 100);
    const termin30 = Math.floor(harga * 30 / 100);
    const pelunasan40 = Math.floor(harga * 40 / 100);
    
    document.getElementById('dp_nominal').innerText = formatRupiah(dp30);
    document.getElementById('termin2_nominal').innerText = formatRupiah(termin30);
    document.getElementById('pelunasan_nominal').innerText = formatRupiah(pelunasan40);
    document.getElementById('total_nominal').innerText = formatRupiah(harga);
}

// Update text upload berdasarkan termin yang dipilih
function updateUploadText() {
    const terminSelect = document.getElementById('termin_select');
    const terminValue = terminSelect.value;
    const uploadText = document.getElementById('uploadText');
    
    if (terminValue === 'dp') {
        uploadText.innerHTML = 'Klik untuk upload bukti DP 30% (Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(document.getElementById('total_harga').value) * 30 / 100) + ')';
    } else if (terminValue === 'termin2') {
        uploadText.innerHTML = 'Klik untuk upload bukti Termin 30% (Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(document.getElementById('total_harga').value) * 30 / 100) + ')';
    } else {
        uploadText.innerHTML = 'Klik untuk upload bukti Pelunasan 40% (Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(document.getElementById('total_harga').value) * 40 / 100) + ')';
    }
}

// Event Listener
const hargaInput = document.getElementById('total_harga');
if (hargaInput) {
    hargaInput.addEventListener('input', function() {
        updateTerminNominal();
        updateUploadText();
    });
}

const terminSelect = document.getElementById('termin_select');
if (terminSelect) {
    terminSelect.addEventListener('change', function() {
        updateUploadText();
    });
}

// Panggil sekali untuk inisialisasi
updateTerminNominal();
updateUploadText();

// Upload Bukti Pembayaran
const uploadArea = document.getElementById('uploadArea');
const fileInput = document.getElementById('buktiFile');
const previewContainer = document.getElementById('previewContainer');
const previewImage = document.getElementById('previewImage');
const previewName = document.getElementById('previewName');
const removeImage = document.getElementById('removeImage');

if (uploadArea) {
    uploadArea.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImage.src = e.target.result;
                previewName.textContent = this.files[0].name;
                previewContainer.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    if (removeImage) {
        removeImage.addEventListener('click', () => {
            fileInput.value = '';
            previewContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');
        });
    }
}
</script>
@endsection