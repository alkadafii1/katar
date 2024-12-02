<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/card', function () {
    return view('view');
});

// index,create,store,show,edit,update,destroy
// CRUD barang
Route::resource('barangs', BarangController::class);

// CRUD kategori
Route::resource('kategoris', KategoriController::class);

// CRUD merk
Route::resource('merks', MerkController::class);

// CRUD pelanggan
Route::resource('pelanggans', PelangganController::class);

// CRUD staff
Route::resource('staffs', StaffController::class);

// CRUD shift
Route::resource('shifts', ShiftController::class);





