<?php

use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\Ms_cara_bookingController;
use App\Http\Controllers\admin\Ms_galeriController;
use App\Http\Controllers\admin\Ms_KavlingController;
use App\Http\Controllers\admin\Ms_Tata_tertibController;
use App\Http\Controllers\admin\Pesanan_userController;
use App\Http\Controllers\admin\Syarat_ketentuanController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\front\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\BookingController;
use App\Http\Controllers\user\PesananController;
use Illuminate\Support\Facades\DB;
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
    return view('frontpage.home');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('beranda', [BerandaController::class, 'index'])->name('beranda');



Route::get('/dashboard', function () {
    $syarat  =  DB::table('ms_syarat_ketentuan')->get();
    $tata_tertib  =  DB::table('ms_tata_tertib')->get();
    $cara_booking  =  DB::table('ms_cara_booking')->get();
    return view('dashboard', [
        'syarat' => $syarat,
        'tata_tertib' => $tata_tertib,
        'cara_booking' => $cara_booking
    ]);
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
    Route::post('get_user', [UserController::class, 'get_user'])->name('get_user');
    Route::post('destroy',   [UserController::class, 'destroy'])->name('destroy');
    Route::post('aktif_akun',   [UserController::class, 'aktif_akun'])->name('aktif_akun');
    Route::post('nonaktif_akun',   [UserController::class, 'nonaktif_akun'])->name('nonaktif_akun');

    // LIST KAVLING
    Route::get('/kavling', [Ms_KavlingController::class, 'index'])->name('kavling');
    Route::post('/tambah-kavling', [Ms_KavlingController::class, 'add_kavling'])->name('tambah-kavling');
    Route::post('/hapus-kavling', [Ms_KavlingController::class, 'hapus_kavling'])->name('hapus-kavling');
    Route::post('/detail-kavling', [Ms_KavlingController::class, 'detail_kavling'])->name('detail-kavling');
    Route::post('/edit-kavling', [Ms_KavlingController::class, 'edit_kavling'])->name('edit-kavling');

    // LIST SYARAT DAN KETENTUAN
    Route::get('/syarat-ketentuan', [Syarat_ketentuanController::class, 'index'])->name('syarat-ketentuan');
    Route::post('/tambah-syarat', [Syarat_ketentuanController::class, 'add_syarat'])->name('tambah-syarat');
    Route::post('/hapus-syarat', [Syarat_ketentuanController::class, 'hapus_syarat'])->name('hapus-syarat');
    Route::post('/detail-syarat', [Syarat_ketentuanController::class, 'detail_syarat'])->name('detail-syarat');
    Route::post('/edit-syarat', [Syarat_ketentuanController::class, 'edit_syarat'])->name('edit-syarat');

    // LIST TATA TERTIB
    Route::get('/tata_tertib', [Ms_Tata_tertibController::class, 'index'])->name('tata_tertib');
    Route::post('/tambah-tertib', [Ms_Tata_tertibController::class, 'add_tertib'])->name('tambah-tertib');
    Route::post('/hapus-tertib', [Ms_Tata_tertibController::class, 'hapus_tertib'])->name('hapus-tertib');
    Route::post('/detail-tertib', [Ms_Tata_tertibController::class, 'detail_tertib'])->name('detail-tertib');
    Route::post('/edit-tertib', [Ms_Tata_tertibController::class, 'edit_tertib'])->name('edit-tertib');
    // LIST CARA BOOKING
    Route::get('/cara-booking', [Ms_cara_bookingController::class, 'index'])->name('cara-booking');
    Route::post('/tambah-cara', [Ms_cara_bookingController::class, 'add_cara'])->name('tambah-cara');
    Route::post('/hapus-cara', [Ms_cara_bookingController::class, 'hapus_cara'])->name('hapus-cara');
    Route::post('/detail-cara', [Ms_cara_bookingController::class, 'detail_cara'])->name('detail-cara');
    Route::post('/edit-cara', [Ms_cara_bookingController::class, 'edit_cara'])->name('edit-cara');




    Route::get('list-pesanan-user', [Pesanan_userController::class, 'index'])->name('list-pesanan-user');
    Route::get('list-pesanan-diproses', [Pesanan_userController::class, 'list_diproses'])->name('list-pesanan-diproses');
    Route::get('list-pesanan-diterima', [Pesanan_userController::class, 'list_diterima'])->name('list-pesanan-diterima');
    Route::get('list-pesanan-dibatalkan', [Pesanan_userController::class, 'list_dibatalkan'])->name('list-pesanan-dibatalkan');

    Route::post('batalkan-pesanan', [Pesanan_userController::class, 'batalkan_pesanan'])->name('batalkan-pesanan');
    Route::post('proses_pembayaran', [Pesanan_userController::class, 'proses_pembayaran'])->name('proses_pembayaran');

    Route::get('/tampil-laporan', [LaporanController::class, 'index'])->name('tampil-laporan');
    Route::post('cetak_laporan', [LaporanController::class, 'cetak_laporan'])->name('cetak_laporan');
    Route::get('print_laporan/{bulantahun}', [LaporanController::class, 'print_laporan'])->name('print_laporan');
});

Route::group(['middleware' => ['role:user']], function () {
    // BOOKING USER
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('get_booking', [BookingController::class, 'get_booking'])->name('get_booking');
    Route::post('booking_kavling', [BookingController::class, 'booking_kavling'])->name('booking_kavling');
    Route::get('draft_booking', [BookingController::class, 'draft_booking'])->name('draft_booking');
    Route::post('destroy_booking', [BookingController::class, 'destroy_booking'])->name('destroy_booking');
    Route::post('proses_booking', [BookingController::class, 'proses_booking'])->name('proses_booking');

    Route::post('tambah_anggota', [BookingController::class, 'tambah_anggota'])->name('tambah_anggota');
    Route::post('get_anggota', [BookingController::class, 'get_anggota'])->name('get_anggota');
    Route::post('destroy_anggota', [BookingController::class, 'destroy_anggota'])->name('destroy_anggota');


    Route::get('user-pesanan', [PesananController::class, 'index'])->name('user-pesanan');
    Route::post('/upload_pembayaran', [PesananController::class, 'upload_pembayaran'])->name('upload_pembayaran');
});

Route::post('get_detail_pesanan', [PesananController::class, 'get_detail_pesanan'])->name('get_detail_pesanan');
Route::post('list_booking', [PesananController::class, 'list_booking'])->name('list_booking');


Route::get('cetak_invoice/{id}', [Pesanan_userController::class, 'cetak_invoice'])->name('cetak_invoice');
Route::get('print_invoice/{id}', [Pesanan_userController::class, 'print_invoice'])->name('print_invoice');

Route::post('get_all_anggota', [PesananController::class, 'get_all_anggota'])->name('get_all_anggota');

// LIST GALLERY
Route::get('/galeri', [Ms_galeriController::class, 'index'])->name('galeri');
Route::post('/tambah-galeri', [Ms_galeriController::class, 'add_galeri'])->name('tambah-galeri');
Route::post('/hapus-galeri', [Ms_galeriController::class, 'hapus_galeri'])->name('hapus-galeri');



require __DIR__ . '/auth.php';
