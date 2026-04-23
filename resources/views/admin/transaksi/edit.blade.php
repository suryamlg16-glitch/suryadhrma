@extends('admin.layout')

@section('title', 'Update Pembayaran')
@section('header', 'Update Pembayaran')
@section('subheader', 'Catat pembayaran DP, Termin, atau Pelunasan')

@section('content')
<div class="space-y-4">

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <form action="{{ route('admin.transaksi.status', $transaksi->id_pembayaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="p-5 space-y-5">

                {{-- Informasi Transaksi --}}
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3">Informasi Transaksi</h3>
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-[10px] text-gray-500">Kode Transaksi</p>
                            <p class="font-medium text-gray-800">{{ $transaksi->kode_transaksi }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Pelanggan</p>
                            <p class="font-medium text-gray-800">{{ $transaksi->pesanan->nama_pelanggan ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Total Harga Deal</p>
                            <p class="font-semibold text-[#B08968]">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Jumlah Dibayar</p>
                            <p class="font-medium text-green-600">Rp {{ number_format($transaksi->jumlah_dibayar, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500">Sisa Tagihan</p>
                            <p class="font-medium text-red-600">Rp {{ number_format($transaksi->sisa_tagihan, 0, ',', '.') }}</p>
                        </div>
                    </div>
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
                                <span id="dp_nominal" class="text-xs font-semibold text-amber-600">Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}</span>
                                @if($transaksi->termin == 'dp' && $transaksi->status == 'sukses')
                                    <span class="ml-2 text-[10px] text-green-500 bg-green-50 px-1.5 py-0.5 rounded-full">✓ Lunas</span>
                                @endif
                            </div>
                        </div>
                        {{-- Termin 2 30% --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                <span class="text-xs font-medium text-gray-700">Termin 30% (Pengerjaan)</span>
                            </div>
                            <div>
                                <span id="termin2_nominal" class="text-xs font-semibold text-blue-600">Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}</span>
                                @if($transaksi->termin == 'termin2' && $transaksi->status == 'sukses')
                                    <span class="ml-2 text-[10px] text-green-500 bg-green-50 px-1.5 py-0.5 rounded-full">✓ Lunas</span>
                                @endif
                            </div>
                        </div>
                        {{-- Pelunasan 40% --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="text-xs font-medium text-gray-700">Pelunasan 40% (Selesai)</span>
                            </div>
                            <div>
                                <span id="pelunasan_nominal" class="text-xs font-semibold text-green-600">Rp {{ number_format($transaksi->total_harga * 40 / 100, 0, ',', '.') }}</span>
                                @if($transaksi->termin == 'lunas' && $transaksi->status == 'sukses')
                                    <span class="ml-2 text-[10px] text-green-500 bg-green-50 px-1.5 py-0.5 rounded-full">✓ Lunas</span>
                                @endif
                            </div>
                        </div>
                        {{-- Total --}}
                        <div class="border-t border-gray-200 pt-2 mt-1 flex justify-between items-center">
                            <span class="text-xs font-semibold text-gray-800">Total</span>
                            <span class="text-xs font-bold text-[#B08968]">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Pilih Termin yang Dibayarkan --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Termin yang Dibayarkan <span class="text-red-400">*</span>
                    </label>
                    <select name="termin" id="termin_select" required
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50
                                   focus:outline-none focus:ring-2 focus:ring-[#B08968]/25 focus:border-[#B08968]
                                   transition-all duration-200">
                        <option value="dp" {{ $transaksi->termin == 'dp' ? 'selected' : '' }} 
                                data-nominal="{{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}">
                            💰 DP 30% - Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}
                        </option>
                        <option value="termin2" {{ $transaksi->termin == 'termin2' ? 'selected' : '' }}
                                data-nominal="{{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}">
                            🔧 Termin 30% - Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }}
                        </option>
                        <option value="lunas" {{ $transaksi->termin == 'lunas' ? 'selected' : '' }}
                                data-nominal="{{ number_format($transaksi->total_harga * 40 / 100, 0, ',', '.') }}">
                            ✅ Pelunasan 40% - Rp {{ number_format($transaksi->total_harga * 40 / 100, 0, ',', '.') }}
                        </option>
                    </select>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Informasi Pembayaran --}}
                <div class="bg-blue-50 rounded-lg p-3">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs font-medium text-blue-800">Informasi Pembayaran</p>
                            <p class="text-[10px] text-blue-600 mt-0.5">
                                DP 30% diawal, Termin 30% saat pengerjaan, Pelunasan 40% setelah selesai.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Upload Bukti DP 30% --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Bukti DP 30% (Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }})
                    </label>
                    @if($transaksi->bukti_dp)
                    <div class="mb-2 p-2 bg-gray-50 rounded-lg inline-block">
                        <img src="{{ asset('storage/' . $transaksi->bukti_dp) }}" class="w-20 h-20 object-cover rounded border">
                        <p class="text-[10px] text-gray-500 mt-1">Bukti DP saat ini</p>
                    </div>
                    @endif
                    <div id="uploadAreaDp"
                         class="border border-dashed border-gray-200 rounded-lg px-4 py-4 text-center cursor-pointer
                                hover:border-[#B08968] hover:bg-[#B08968]/[.02] transition-all duration-200">
                        <input type="file" id="buktiDp" name="bukti_dp" accept="image/*" class="hidden">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span class="text-xs text-gray-500">Ganti bukti DP</span>
                        </div>
                    </div>
                    <div id="previewContainerDp" class="hidden mt-3 flex items-center gap-3">
                        <img id="previewImageDp" src="#" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-100">
                        <div>
                            <p id="previewNameDp" class="text-xs text-gray-700 font-medium"></p>
                            <button type="button" id="removeImageDp" class="text-[10px] text-red-400 hover:text-red-500 mt-0.5 transition-colors">
                                Hapus gambar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Upload Bukti Termin 2 (30%) --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Bukti Termin 2 (Rp {{ number_format($transaksi->total_harga * 30 / 100, 0, ',', '.') }})
                    </label>
                    @if($transaksi->bukti_termin2)
                    <div class="mb-2 p-2 bg-gray-50 rounded-lg inline-block">
                        <img src="{{ asset('storage/' . $transaksi->bukti_termin2) }}" class="w-20 h-20 object-cover rounded border">
                        <p class="text-[10px] text-gray-500 mt-1">Bukti Termin 2 saat ini</p>
                    </div>
                    @endif
                    <div id="uploadAreaTermin2"
                         class="border border-dashed border-gray-200 rounded-lg px-4 py-4 text-center cursor-pointer
                                hover:border-[#B08968] hover:bg-[#B08968]/[.02] transition-all duration-200">
                        <input type="file" id="buktiTermin2" name="bukti_termin2" accept="image/*" class="hidden">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span class="text-xs text-gray-500">Upload bukti Termin 2</span>
                        </div>
                    </div>
                    <div id="previewContainerTermin2" class="hidden mt-3 flex items-center gap-3">
                        <img id="previewImageTermin2" src="#" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-100">
                        <div>
                            <p id="previewNameTermin2" class="text-xs text-gray-700 font-medium"></p>
                            <button type="button" id="removeImageTermin2" class="text-[10px] text-red-400 hover:text-red-500 mt-0.5 transition-colors">
                                Hapus gambar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-gray-100"></div>

                {{-- Upload Bukti Pelunasan 40% --}}
                <div>
                    <label class="block text-[10px] font-medium text-gray-400 uppercase tracking-widest mb-1.5">
                        Bukti Pelunasan 40% (Rp {{ number_format($transaksi->total_harga * 40 / 100, 0, ',', '.') }})
                    </label>
                    @if($transaksi->bukti_pelunasan)
                    <div class="mb-2 p-2 bg-gray-50 rounded-lg inline-block">
                        <img src="{{ asset('storage/' . $transaksi->bukti_pelunasan) }}" class="w-20 h-20 object-cover rounded border">
                        <p class="text-[10px] text-gray-500 mt-1">Bukti Pelunasan saat ini</p>
                    </div>
                    @endif
                    <div id="uploadAreaPelunasan"
                         class="border border-dashed border-gray-200 rounded-lg px-4 py-4 text-center cursor-pointer
                                hover:border-[#B08968] hover:bg-[#B08968]/[.02] transition-all duration-200">
                        <input type="file" id="buktiPelunasan" name="bukti_pelunasan" accept="image/*" class="hidden">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span class="text-xs text-gray-500">Upload bukti Pelunasan</span>
                        </div>
                    </div>
                    <div id="previewContainerPelunasan" class="hidden mt-3 flex items-center gap-3">
                        <img id="previewImagePelunasan" src="#" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-100">
                        <div>
                            <p id="previewNamePelunasan" class="text-xs text-gray-700 font-medium"></p>
                            <button type="button" id="removeImagePelunasan" class="text-[10px] text-red-400 hover:text-red-500 mt-0.5 transition-colors">
                                Hapus gambar
                            </button>
                        </div>
                    </div>
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
                    Simpan Pembayaran
                </button>
            </div>

        </form>
    </div>

</div>

<script>
// Upload Bukti DP
const uploadAreaDp = document.getElementById('uploadAreaDp');
const buktiDp = document.getElementById('buktiDp');
const previewContainerDp = document.getElementById('previewContainerDp');
const previewImageDp = document.getElementById('previewImageDp');
const previewNameDp = document.getElementById('previewNameDp');
const removeImageDp = document.getElementById('removeImageDp');

if (uploadAreaDp) {
    uploadAreaDp.addEventListener('click', () => buktiDp.click());
    buktiDp.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImageDp.src = e.target.result;
                previewNameDp.textContent = this.files[0].name;
                previewContainerDp.classList.remove('hidden');
                uploadAreaDp.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    if (removeImageDp) {
        removeImageDp.addEventListener('click', () => {
            buktiDp.value = '';
            previewContainerDp.classList.add('hidden');
            uploadAreaDp.classList.remove('hidden');
        });
    }
}

// Upload Bukti Termin 2
const uploadAreaTermin2 = document.getElementById('uploadAreaTermin2');
const buktiTermin2 = document.getElementById('buktiTermin2');
const previewContainerTermin2 = document.getElementById('previewContainerTermin2');
const previewImageTermin2 = document.getElementById('previewImageTermin2');
const previewNameTermin2 = document.getElementById('previewNameTermin2');
const removeImageTermin2 = document.getElementById('removeImageTermin2');

if (uploadAreaTermin2) {
    uploadAreaTermin2.addEventListener('click', () => buktiTermin2.click());
    buktiTermin2.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImageTermin2.src = e.target.result;
                previewNameTermin2.textContent = this.files[0].name;
                previewContainerTermin2.classList.remove('hidden');
                uploadAreaTermin2.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    if (removeImageTermin2) {
        removeImageTermin2.addEventListener('click', () => {
            buktiTermin2.value = '';
            previewContainerTermin2.classList.add('hidden');
            uploadAreaTermin2.classList.remove('hidden');
        });
    }
}

// Upload Bukti Pelunasan
const uploadAreaPelunasan = document.getElementById('uploadAreaPelunasan');
const buktiPelunasan = document.getElementById('buktiPelunasan');
const previewContainerPelunasan = document.getElementById('previewContainerPelunasan');
const previewImagePelunasan = document.getElementById('previewImagePelunasan');
const previewNamePelunasan = document.getElementById('previewNamePelunasan');
const removeImagePelunasan = document.getElementById('removeImagePelunasan');

if (uploadAreaPelunasan) {
    uploadAreaPelunasan.addEventListener('click', () => buktiPelunasan.click());
    buktiPelunasan.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImagePelunasan.src = e.target.result;
                previewNamePelunasan.textContent = this.files[0].name;
                previewContainerPelunasan.classList.remove('hidden');
                uploadAreaPelunasan.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    if (removeImagePelunasan) {
        removeImagePelunasan.addEventListener('click', () => {
            buktiPelunasan.value = '';
            previewContainerPelunasan.classList.add('hidden');
            uploadAreaPelunasan.classList.remove('hidden');
        });
    }
}
</script>
@endsection