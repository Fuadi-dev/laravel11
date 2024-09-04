<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/barang', [HomeController::class, 'tampilBarang']);
Route::get('/barang/tambah', [HomeController::class, 'tambahBarang']);
Route::post('/barang/tambah/process', [HomeController::class, 'prosesTambahBarang']);
Route::get('barang/edit/{id_barang}', [HomeController::class, 'editBarang']);
Route::post('barang/edit/process', [HomeController::class, 'prosesEditBarang']);
Route::delete('/barang/delete/',[HomeController::class, 'hapusBarang']);

Route::get('/login_admin', [AuthController::class, 'index']);
Route::post('login/process', [AuthController::class, 'login_admin']);
Route::get('/register_admin', [AuthController::class, 'register_admin']);
Route::post('register_admin/process', [AuthController::class, 'regmin']);
Route::get('/logout', [AuthController::class, 'logout']);