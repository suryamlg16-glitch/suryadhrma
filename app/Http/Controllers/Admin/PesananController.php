<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pesanan::with('user');
        
        // Search by customer name
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_pelanggan', 'like', '%' . $request->search . '%');
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_pesanan', $request->status);
        } else {
            // DEFAULT: Sembunyikan pesanan yang sudah selesai
            $query->where('status_pesanan', '!=', 'selesai');
        }
        
        // Filter by date
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('tanggal_pesanan', $request->date);
        }
        
        $pesanan = $query->latest()->paginate(10);
        
        // Statistics
        $statistik = [
            'total' => Pesanan::count(),
            'pending' => Pesanan::where('status_pesanan', 'pending')->count(),
            'dikonfirmasi' => Pesanan::where('status_pesanan', 'dikonfirmasi')->count(),
            'diproses' => Pesanan::where('status_pesanan', 'diproses')->count(),
            'dikirim' => Pesanan::where('status_pesanan', 'dikirim')->count(),
            'selesai' => Pesanan::where('status_pesanan', 'selesai')->count(),
            'dibatalkan' => Pesanan::where('status_pesanan', 'dibatalkan')->count(),
        ];
        
        return view('admin.pesanan.index', compact('pesanan', 'statistik'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'details.produk', 'pembayaran'])->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Update the status of the specified resource.
     */
    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,dikonfirmasi,diproses,dikirim,selesai,dibatalkan'
        ]);
        
        $pesanan->status_pesanan = $request->status;
        
        // Set tanggal sesuai status
        if ($request->status == 'dikonfirmasi' && !$pesanan->tanggal_konfirmasi) {
            $pesanan->tanggal_konfirmasi = now();
        }
        if ($request->status == 'diproses' && !$pesanan->tanggal_diproses) {
            $pesanan->tanggal_diproses = now();
        }
        if ($request->status == 'dikirim' && !$pesanan->tanggal_dikirim) {
            $pesanan->tanggal_dikirim = now();
        }
        if ($request->status == 'selesai' && !$pesanan->tanggal_selesai) {
            $pesanan->tanggal_selesai = now();
        }
        
        $pesanan->save();
        
        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Status pesanan berhasil diupdate!');
    }

    /**
     * Update harga final pesanan (DP 30%)
     */
    public function updateHargaFinal(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $request->validate([
            'harga_final' => 'required|numeric|min:0',
            'status_deal' => 'required|in:menunggu,deal,batal'
        ]);
        
        DB::beginTransaction();
        
        try {
            $pesanan->harga_final = $request->harga_final;
            $pesanan->status_deal = $request->status_deal;
            
            if ($request->status_deal == 'deal') {
                $pesanan->total_harga = $request->harga_final;
                
                // ✅ Update transaksi dengan harga final (DP 30%)
                $transaksi = Pembayaran::where('id_pesanan', $pesanan->id_pesanan)->first();
                if ($transaksi) {
                    $dp = $request->harga_final * 0.3;
                    $transaksi->jumlah = $dp;
                    $transaksi->sisa_tagihan = $request->harga_final - $dp;
                    $transaksi->persentase = 30;
                    $transaksi->termin = 'dp';
                    $transaksi->save();
                    
                    Log::info('Transaksi DP diupdate untuk pesanan ID: ' . $id . ', DP: ' . $dp);
                }
            }
            
            $pesanan->save();
            
            DB::commit();
            
            Log::info('Harga final pesanan #' . $id . ' diupdate: ' . $request->harga_final . ', status: ' . $request->status_deal);
            
            return redirect()->route('admin.pesanan.show', $id)
                ->with('success', 'Harga final berhasil diupdate!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal update harga final: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate harga final: ' . $e->getMessage());
        }
    }
}