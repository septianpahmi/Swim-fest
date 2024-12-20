<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PerlombaanController;
use App\Http\Controllers\RegistrasiKategoriController;
use App\Http\Controllers\RegistrasiMandiriController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/registrasi-kategori/kelompok', [RegistrasiKategoriController::class, 'kelompok'])->name('kelompok');

    Route::post('/registrasi-kategori/mandiri/post/{slug}', [RegistrasiMandiriController::class, 'post'])->name('mandiri.post');
    Route::get('/registrasi-kategori/mandiri/file/{slug}', [RegistrasiMandiriController::class, 'file'])->name('mandiri.file');
    Route::post('/registrasi-kategori/mandiri/file/post/{slug}', [RegistrasiMandiriController::class, 'uploadFile'])->name('mandiri.postFile');
    Route::get('/registrasi-kategori/mandiri/pilih-kelas/{slug}', [RegistrasiMandiriController::class, 'pilihKelas'])->name('mandiri.pilihKelas');
});
