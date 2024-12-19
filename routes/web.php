<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PerlombaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/sign-in', [LoginController::class, 'index'])->name('signin');
Route::post('/sign-in', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sign-up', [RegistrationController::class, 'index'])->name('signup');
Route::post('/sign-up', [RegistrationController::class, 'register'])->name('register');

Route::get('/Perlombaan', [PerlombaanController::class, 'index'])->name('perlombaan');
