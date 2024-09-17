<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
//url customer
Route::get('/', [HomeController::class, 'tampilBarang']);

Route::get('/produk', [HomeController::class, 'tampilProduk']);
Route::get('/barang/tambah', [HomeController::class, 'tambahBarang']);
Route::post('/barang/tambah/process', [HomeController::class, 'prosesTambahBarang']);
Route::get('barang/edit/{id_barang}', [HomeController::class, 'editBarang']);
Route::post('barang/edit/process', [HomeController::class, 'prosesEditBarang']);
Route::delete('/barang/delete',[HomeController::class, 'hapusBarang']);

Route::post('cart/process', [HomeController::class, 'addToCart']);
Route::get('cart', [HomeController::class, 'Cart']);
Route::post('cart/update', [HomeController::class, 'updateCart']);

Route::get('/login_admin', [AuthController::class, 'index_admin']);
Route::post('login/process', [AuthController::class, 'login_admin']);
Route::get('/register_admin', [AuthController::class, 'register_admin']);
Route::post('register_admin/process', [AuthController::class, 'regmin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/login_customer', [AuthController::class, 'index_customer']);
Route::post('login/proses', [AuthController::class, 'login_customer']);
Route::get('/register_customer', [AuthController::class, 'register_customer']);
Route::post('register_customer/proses', [AuthController::class, 'regmer']);
Route::get('/logout_customer', [AuthController::class, 'logout_customer']);