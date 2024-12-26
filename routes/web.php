<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\RingkasanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerlombaanController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\RegistrasiMandiriController;
use App\Http\Controllers\RegistrasiKategoriController;
use App\Http\Controllers\RegistrasiKelompokController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/sign-in', [LoginController::class, 'index'])->name('signin');
Route::post('/sign-in', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sign-up', [RegistrationController::class, 'index'])->name('signup');
Route::post('/sign-up', [RegistrationController::class, 'register'])->name('register');

Route::get('/auth/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/Perlombaan', [PerlombaanController::class, 'index'])->name('perlombaan');
Route::get('/Perlombaan/{slug}', [PerlombaanController::class, 'detail'])->name('detail.lomba');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/registrasi-kategori/{slug}', [RegistrasiKategoriController::class, 'index'])->name('registrasi.kategori');
    Route::get('/registrasi-kategori/mandiri/{slug}', [RegistrasiKategoriController::class, 'mandiri'])->name('mandiri');
    Route::post('/registrasi-kategori/getKabupaten', [RegistrasiKategoriController::class, 'getKabupaten'])->name('getKabupaten');
    Route::post('/registrasi-kategori/getKecamatan', [RegistrasiKategoriController::class, 'getKecamatan'])->name('getKecamatan');
    // Route::post('/registrasi-kategori/getCategory', [RegistrasiKategoriController::class, 'getCategories'])->name('getCategory');

    Route::get('/registrasi-kategori/kelompok/{slug}', [RegistrasiKategoriController::class, 'kelompok'])->name('kelompok');
    Route::get('/registrasi-kategori/edit-peserta/{id}/{slug}', [RegistrasiKategoriController::class, 'editKelompok'])->name('editKelompok');
    Route::post('/registrasi-kategori/kelomok/post/{slug}', [RegistrasiKelompokController::class, 'post'])->name('kelompok.post');
    Route::post('/registrasi-kategori/edit-peserta/post/{id}/{slug}', [RegistrasiKelompokController::class, 'editPesertaPost'])->name('editPeserta.post');
    Route::get('/registrasi-kategori/kelompok/pilih-kelas/{slug}', [RegistrasiKelompokController::class, 'pilihKelas'])->name('kelompok.pilihKelas');
    Route::get('/registrasi-kategori/kelompok/add-kelas/{slug}', [RegistrasiKelompokController::class, 'newKelas'])->name('kelompok.newKelas');
    Route::post('/registrasi-kategori/kelompok/pilih-kelas/post/{slug}', [RegistrasiKelompokController::class, 'postKelas'])->name('kelompok.postKelas');
    Route::post('/registrasi-kategori/kelompok/add-kelas/post/{slug}', [RegistrasiKelompokController::class, 'postnewKelas'])->name('kelompok.postKelasnew');
    Route::get('/registrasi-kategori/kelompok/detail/{slug}', [RegistrasiKelompokController::class, 'regisDetail'])->name('kelompok.detail');
    Route::get('/registrasi-kategori/kelompok/list-detail/{slug}', [RegistrasiKelompokController::class, 'listDetail'])->name('kelompok.listdetail');
    Route::get('/registrasi-kategori/kelompok/remove/{id}/{slug}', [RegistrasiKelompokController::class, 'remove'])->name('kelompok.remove');
    Route::get('/registrasi-kategori/kelompok/checkout-proccess/{slug}', [RegistrasiKelompokController::class, 'checkoutProccess'])->name('kelompok.checkoutProccess');

    Route::post('/registrasi-kategori/mandiri/post/{slug}', [RegistrasiMandiriController::class, 'post'])->name('mandiri.post');
    Route::get('/registrasi-kategori/mandiri/file/{slug}', [RegistrasiMandiriController::class, 'file'])->name('mandiri.file');
    Route::post('/registrasi-kategori/mandiri/file/post/{slug}', [RegistrasiMandiriController::class, 'uploadFile'])->name('mandiri.postFile');
    Route::get('/registrasi-kategori/mandiri/pilih-kelas/{slug}', [RegistrasiMandiriController::class, 'pilihKelas'])->name('mandiri.pilihKelas');
    Route::post('/registrasi-kategori/mandiri/pilih-kelas/post/{slug}', [RegistrasiMandiriController::class, 'postKelasMandiri'])->name('mandiri.postKelas');

    Route::get('/registrasi-kategori/mandiri/ringkasan/{slug}', [RingkasanController::class, 'RingkasanMandiri'])->name('mandiri.Ringkasan');
    Route::get('/registrasi-kategori/mandiri/ringkasan-pembayaran/{slug}', [RegistrasiMandiriController::class, 'RingkasanPembayaranMandiri'])->name('mandiri.RingkasanPembayaran');
    Route::get('/registrasi-kategori/mandiri/checkout-process/{slug}', [RingkasanController::class, 'checkoutProcess'])->name('checkoutProcess');

    Route::get('/registrasi-kategori/mandiri/checkout/{slug}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/registrasi-kategori/kelompok/transaction-succes/{id}/{slug}', [CheckoutController::class, 'successTransaction'])->name('success-transaction');
    Route::get('/registrasi-kategori/mandiri/transaction-succes/{id}/{slug}', [CheckoutController::class, 'successTransactionMandiri'])->name('success-transaction-mandiri');

    Route::get('/profile/{id}', [ProfilController::class, 'index'])->name('profile');
    Route::post('/profile/reset-password/{id}', [ProfilController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/profile/update/{id}', [ProfilController::class, 'updateProfil'])->name('updateProfil');
});

Route::get('/highlight', [HighlightController::class, 'index'])->name('highlight');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/tentang', function () {
    return view('resources.tentang.tentang');
});

Route::get('/profil/pertandingan', [ProfilController::class, 'pertandingan'])->name('pertandingan');
Route::get('/profi;/keamanan', [ProfilController::class, 'keamanan'])->name('keamanan');
