<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;


Route::get('/', function () {
    return view('welcome');
});

// get, post, put, delete
// untuk mencari url nya dengan http://localhost:8000/belajar jadi belajar itu sebagai alamat nya
Route::get('belajar', [BelajarController::class, 'index']);

Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');

Route::get('pengurangan', [BelajarController::class, 'kurang'])->name('pengurangan');
Route::post('actionKurang', [BelajarController::class, 'actionKurang'])->name('actionKurang');

Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [BelajarController::class, 'actionBagi'])->name('actionBagi');

Route::get('perkalian', [BelajarController::class, 'kali'])->name('perkalian');
Route::post('actionKali', [BelajarController::class, 'actionKali'])->name('actionKali');

// prefix
Route::prefix('admin')->name('admin.')->group(function () {
    // mau melihat tampilan login
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/actionLogin', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class);
});
