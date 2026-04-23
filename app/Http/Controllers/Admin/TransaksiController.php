<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pembayaran::with('pesanan');
        
        // Filter by status (HARUS ADA)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Filter by date range
        if ($request->has('dari_tanggal') && $request->dari_tanggal != '') {
            $query->whereDate('created_at', '>=', $request->dari_tanggal);
        }
        
        if ($request->has('sampai_tanggal') && $request->sampai_tanggal != '') {
            $query->whereDate('created_at', '<=', $request->sampai_tanggal);
        }
        
        // Search by customer name or kode_transaksi
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_transaksi', 'like', '%' . $search . '%')
                  ->orWhereHas('pesanan', function($sub) use ($search) {
                      $sub->where('nama_pelanggan', 'like', '%' . $search . '%');
                  });
            });
        }
        
        $transaksi = $query->latest()->paginate(10);
        
        // Statistics
        $totalPendapatan = Pembayaran::where('status', 'sukses')->sum('total_harga');
        $totalTransaksi = Pembayaran::count();
        $transaksiSukses = Pembayaran::where('status', 'sukses')->count();
        $transaksiPending = Pembayaran::where('status', 'pending')->count();
        $transaksiGagal = Pembayaran::where('status', 'gagal')->count();
        
        // Statistics by payment method (hanya Transfer)
        $statistikMetode = [
            'transfer' => Pembayaran::where('metode_pembayaran', 'transfer')->where('status', 'sukses')->sum('total_harga'),
        ];
        
        return view('admin.transaksi.index', compact('transaksi', 'totalPendapatan', 'totalTransaksi', 
            'transaksiSukses', 'transaksiPending', 'transaksiGagal', 'statistikMetode'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        // Ambil pesanan yang statusnya dikonfirmasi (Deal/Negosiasi)
        $pesananDeal = Pesanan::where('status_pesanan', 'dikonfirmasi')
                              ->whereDoesntHave('pembayaran')
                              ->orderBy('created_at', 'desc')
                              ->get();
        
        return view('admin.transaksi.create', compact('pesananDeal'));
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|exists:pesanans,id_pesanan',
            'metode_pembayaran' => 'required|in:transfer', // Hanya transfer
            'total_harga' => 'required|numeric|min:0',
            'termin' => 'required|in:dp,termin2,lunas',
            'tanggal_pembayaran' => 'required|date',
            'bukti_dp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        $pesanan = Pesanan::find($request->id_pesanan);
        $totalHarga = $request->total_harga;
        
        // Hitung jumlah dibayar berdasarkan termin (pakai round)
        if ($request->termin == 'dp') {
            $jumlahDibayar = round($totalHarga * 30 / 100);
            $sisaTagihan = $totalHarga - $jumlahDibayar;
            $persentase = 30;
            $status = 'pending';
        } elseif ($request->termin == 'termin2') {
            $jumlahDibayar = round($totalHarga * 60 / 100);
            $sisaTagihan = $totalHarga - $jumlahDibayar;
            $persentase = 60;
            $status = 'pending';
        } else {
            $jumlahDibayar = $totalHarga;
            $sisaTagihan = 0;
            $persentase = 100;
            $status = 'sukses';
        }
        
        // Generate kode transaksi
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(6));
        
        // Upload bukti DP
        $buktiDp = null;
        if ($request->hasFile('bukti_dp')) {
            $file = $request->file('bukti_dp');
            $filename = time() . '_dp_' . $file->getClientOriginalName();
            $file->move(public_path('storage/bukti'), $filename);
            $buktiDp = 'bukti/' . $filename;
        }
        
        // Simpan transaksi
        Pembayaran::create([
            'kode_transaksi' => $kodeTransaksi,
            'id_pesanan' => $request->id_pesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $totalHarga,
            'jumlah_dibayar' => $jumlahDibayar,
            'sisa_tagihan' => $sisaTagihan,
            'persentase' => $persentase,
            'termin' => $request->termin,
            'status' => $status,
            'bukti_dp' => $buktiDp,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);
        
        // Update pesanan
        $pesanan->harga_final = $totalHarga;
        $pesanan->total_harga = $totalHarga;
        $pesanan->status_deal = 'deal';
        $pesanan->save();
        
        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Pembayaran::with('pesanan')->findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the transaction.
     */
    public function edit($id)
    {
        $transaksi = Pembayaran::with('pesanan')->findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update transaction status with termin (DP, Termin2, Lunas)
     */
    public function updateStatus(Request $request, $id)
    {
        $transaksi = Pembayaran::findOrFail($id);
        $totalHarga = $transaksi->total_harga;
        
        $request->validate([
            'termin' => 'required|in:dp,termin2,lunas',
            'bukti_dp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_termin2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_pelunasan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        // Upload bukti
        if ($request->hasFile('bukti_dp')) {
            $file = $request->file('bukti_dp');
            $filename = time() . '_dp_' . $file->getClientOriginalName();
            $file->move(public_path('storage/bukti'), $filename);
            $transaksi->bukti_dp = 'bukti/' . $filename;
        }
        if ($request->hasFile('bukti_termin2')) {
            $file = $request->file('bukti_termin2');
            $filename = time() . '_termin2_' . $file->getClientOriginalName();
            $file->move(public_path('storage/bukti'), $filename);
            $transaksi->bukti_termin2 = 'bukti/' . $filename;
        }
        if ($request->hasFile('bukti_pelunasan')) {
            $file = $request->file('bukti_pelunasan');
            $filename = time() . '_pelunasan_' . $file->getClientOriginalName();
            $file->move(public_path('storage/bukti'), $filename);
            $transaksi->bukti_pelunasan = 'bukti/' . $filename;
        }
        
        // Hitung jumlah dibayar berdasarkan termin (pakai round)
        if ($request->termin == 'dp') {
            $jumlahDibayar = round($totalHarga * 30 / 100);
            $sisaTagihan = $totalHarga - $jumlahDibayar;
            $persentase = 30;
            $status = 'pending';
        } elseif ($request->termin == 'termin2') {
            $jumlahDibayar = round($totalHarga * 60 / 100);
            $sisaTagihan = $totalHarga - $jumlahDibayar;
            $persentase = 60;
            $status = 'pending';
        } else {
            $jumlahDibayar = $totalHarga;
            $sisaTagihan = 0;
            $persentase = 100;
            $status = 'sukses';
        }
        
        // Update transaksi
        $transaksi->termin = $request->termin;
        $transaksi->jumlah_dibayar = $jumlahDibayar;
        $transaksi->sisa_tagihan = $sisaTagihan;
        $transaksi->persentase = $persentase;
        $transaksi->status = $status;
        $transaksi->tanggal_pembayaran = now();
        $transaksi->save();
        
        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Pembayaran ' . strtoupper($request->termin) . ' berhasil dicatat!');
    }
}