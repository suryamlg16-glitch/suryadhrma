<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\LaporanController; // ✅ TAMBAHKAN USE STATEMENT
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\KatalogController;
use App\Http\Controllers\Frontend\ProdukController as FrontendProdukController;
use App\Http\Controllers\Frontend\PemesananController;
use App\Http\Controllers\Frontend\TrackingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== ROUTE FRONTEND ====================
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/kategori/{slug}', [KatalogController::class, 'kategori'])->name('katalog.kategori');
Route::get('/produk/{slug}', [FrontendProdukController::class, 'show'])->name('produk.detail');

// Route Profil & Kontak
Route::get('/profil-perusahaan', function () {
    return view('user.profil-perusahaan');
})->name('profil');

Route::get('/hubungi-kami', function () {
    return view('user.hubungi-kami');
})->name('kontak');

// Route Pemesanan (Hanya Alamat -> Langsung Selesai)
Route::get('/pesan/produk/{slug}', [PemesananController::class, 'index'])->name('pesan.index');
Route::post('/pesan/store-alamat', [PemesananController::class, 'storeAlamat'])->name('pesan.store.alamat');

// Route pesanan sukses
Route::get('/pesanan/sukses', [PemesananController::class, 'sukses'])->name('pesanan.sukses');

// ==================== ROUTE ADMIN ====================
// Login Admin (tanpa middleware)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Panel (dengan middleware auth & admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Produk (Admin)
    Route::resource('produk', ProdukController::class);
    
    // Route Pesanan (Admin)
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');
    Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan.status');
    Route::put('/pesanan/{id}/harga-final', [PesananController::class, 'updateHargaFinal'])->name('pesanan.harga-final');

    // Route Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.status');
    
    // ✅ Route Laporan (TAMBAHKAN INI)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

// ==================== ROUTE DASHBOARD & AUTH ====================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';