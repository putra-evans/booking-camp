<?php

use App\Http\Controllers\admin\Pesanan_userController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\BookingController;
use App\Http\Controllers\user\PesananController;
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
    Route::post('get_user', [UserController::class, 'get_user'])->name('get_user');
    Route::post('destroy',   [UserController::class, 'destroy'])->name('destroy');
    Route::post('aktif_akun',   [UserController::class, 'aktif_akun'])->name('aktif_akun');
    Route::post('nonaktif_akun',   [UserController::class, 'nonaktif_akun'])->name('nonaktif_akun');

    Route::get('list-pesanan-user', [Pesanan_userController::class, 'index'])->name('list-pesanan-user');
    Route::get('list-pesanan-diproses', [Pesanan_userController::class, 'list_diproses'])->name('list-pesanan-diproses');
    Route::get('list-pesanan-diterima', [Pesanan_userController::class, 'list_diterima'])->name('list-pesanan-diterima');
    Route::get('list-pesanan-dibatalkan', [Pesanan_userController::class, 'list_dibatalkan'])->name('list-pesanan-dibatalkan');

    Route::post('batalkan-pesanan', [Pesanan_userController::class, 'batalkan_pesanan'])->name('batalkan-pesanan');
    Route::post('proses_pembayaran', [Pesanan_userController::class, 'proses_pembayaran'])->name('proses_pembayaran');
});

Route::group(['middleware' => ['role:user']], function () {
    // BOOKING USER
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('get_booking', [BookingController::class, 'get_booking'])->name('get_booking');
    Route::post('booking_kavling', [BookingController::class, 'booking_kavling'])->name('booking_kavling');
    Route::get('draft_booking', [BookingController::class, 'draft_booking'])->name('draft_booking');
    Route::post('destroy_booking', [BookingController::class, 'destroy_booking'])->name('destroy_booking');
    Route::post('proses_booking', [BookingController::class, 'proses_booking'])->name('proses_booking');

    Route::get('user-pesanan', [PesananController::class, 'index'])->name('user-pesanan');

    Route::post('/upload_pembayaran', [PesananController::class, 'upload_pembayaran'])->name('upload_pembayaran');
});

Route::post('get_detail_pesanan', [PesananController::class, 'get_detail_pesanan'])->name('get_detail_pesanan');
Route::post('list_booking', [PesananController::class, 'list_booking'])->name('list_booking');

Route::get('cetak_invoice/{id}', [Pesanan_userController::class, 'cetak_invoice'])->name('cetak_invoice');


require __DIR__ . '/auth.php';
