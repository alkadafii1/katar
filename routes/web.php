<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StaffController;

use Illuminate\Support\Facades\Route;

// Route utama untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman home, yang akan mengarah ke HomeController@index
Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk profile yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
});

// Menyertakan routes untuk autentikasi
require __DIR__.'/auth.php';
