<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/loginberhasil', [AuthController::class, 'loginberhasil'])->name('loginberhasil');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/regis', [AuthController::class, 'regis'])->name('regis');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/',
 [HomeController::class, 'home'])->name('home');
Route::post('/RandomUser',
 [HomeController::class, 'RandomUser'])->name('RandomUser');
Route::post('/RandomUserBanyak',
 [HomeController::class, 'RandomUserBanyak'])->name('RandomUserBanyak');
Route::get('/barang',
 [HomeController::class, 'barang'])->name('barang');
Route::post('/tambahbarang',
 [HomeController::class, 'tambahbarang'])->name('tambahbarang');
