<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\pelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// barang

Route::resource('barangs', BarangController::class);

// kategori
Route::resource('kategoris', KategoriController::class);

// merk
Route::resource('merks', MerkController::class);

// pelanggan
Route::get('pelanggan/create', [pelangganController::class, 'create'])->name('pelanggan.create');
Route::post('pelanggan', [pelangganController::class, 'store'])->name('pelanggan.store');
Route::resource('/pelanggan', pelangganController::class);


