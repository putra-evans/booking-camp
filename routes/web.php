<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/edit_profil', [ProfilController::class, 'form_add'])->name('edit_profil');
    Route::post('/store_foto', [ProfilController::class, 'store_foto'])->name('store_foto');
    Route::post('/store_edit', [ProfilController::class, 'store_edit'])->name('store_edit');
    Route::post('/store_ktp', [ProfilController::class, 'store_ktp'])->name('store_ktp');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['role:admin']], function () {

    // LIST DATA USER
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('halaman-user', [UserController::class, 'index'])->name('halaman-user');
    Route::post('update-user', [UserController::class, 'update'])->name('update-user');
    Route::post('hapus-user',   [UserController::class, 'destroy'])->name('hapus-user');


    // // KATEGORI ROUTE
    // Route::get('halaman-kategori', [KategoriController::class, 'index'])->name('halaman-kategori');
    // Route::post('save-kategori',   [KategoriController::class, 'store'])->name('simpan-kategori');
    // Route::post('hapus-kategori',   [KategoriController::class, 'destroy'])->name('hapus-kategori');
    // Route::post('update-kategori',   [KategoriController::class, 'update'])->name('update-kategori');

    // // PRODUK ROUTE
    // Route::get('halaman-produk', [ProdukController::class, 'index'])->name('halaman-produk');
    // Route::post('save-produk',   [ProdukController::class, 'store'])->name('simpan-produk');
    // Route::post('hapus-produk',   [ProdukController::class, 'destroy'])->name('hapus-produk');
    // Route::post('update-produk',   [ProdukController::class, 'update'])->name('update-produk');
    // Route::get('get-jenis-beras',   [ProdukController::class, 'get_kategori'])->name('get-jenis-beras');
    // // PRODUK PMESANAN
    // Route::get('halaman-pemesanan', [PemesananController::class, 'index'])->name('halaman-pemesanan');
    // Route::get('detail-pemesanan', [PemesananController::class, 'get_detail'])->name('detail-pemesanan');
    // Route::get('get-file', [PemesananController::class, 'get_file'])->name('get-file');
    // Route::post('update-status', [PemesananController::class, 'update_status'])->name('update-status');

    // Route::get('get-laporan', [LaporanController::class, 'index'])->name('get-laporan');

    // Route::get('lap-penjualan', [LaporanController::class, 'laporan_penjualan'])->name('lap-penjualan');
    // Route::get('lap-persediaan', [LaporanController::class, 'laporan_persediaan'])->name('lap-persediaan');
});

Route::group(['middleware' => ['role:user']], function () {

    // Route::get('/beranda', [FrontController::class, 'index'])->name('beranda');
    // Route::post('add-cart', [FrontController::class, 'store'])->name('add-cart');
    // Route::post('view-cart', [FrontController::class, 'view_cart'])->name('view-cart');
    // Route::post('count-cart', [FrontController::class, 'count_cart'])->name('count-cart');
    // Route::get('view-checkout', [FrontController::class, 'view_checkout'])->name('view-checkout');
    // Route::get('get-cities', [FrontController::class, 'getCities'])->name('get-cities');
    // Route::post('get-ongkir', [FrontController::class, 'check_ongkir'])->name('get-ongkir');
    // Route::post('save-pemesanan',   [FrontController::class, 'store_pemesanan'])->name('save-pemesanan');
    // Route::get('my-order', [FrontController::class, 'view_order'])->name('my-order');
    // Route::post('view-myorder', [FrontController::class, 'list_myorder'])->name('view-myorder');

    // Route::get('view-detail', [FrontController::class, 'get_detail'])->name('view-detail');
    // Route::post('upload-bayar', [FrontController::class, 'upload_pembayaran'])->name('upload-bayar');


    // Route::get('tambah-produk', [FrontController::class, 'tambah_produk'])->name('tambah-produk');
    // Route::get('kurang-produk', [FrontController::class, 'kurang_produk'])->name('kurang-produk');

    // Route::get('delete-keranjang', [FrontController::class, 'delete_keranjang'])->name('delete-keranjang');

    // Route::post('konfirmasi-pesanan', [FrontController::class, 'konfirmasi_pesanan'])->name('konfirmasi-pesanan');
});


require __DIR__ . '/auth.php';
