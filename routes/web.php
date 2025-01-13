<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CashDrawerController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}); 

// tampilan awal sebelum login
Route::get('/', [HomeController::class, 'guest'])->name('guest.home');
// index,create,store,show,edit,update,destroy
Route::get('/home', [HomeController::class, 'user'])->name('user.home');

//CRUD supplier
Route::resource('suppliers', SupplierController::class);

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

// CRUD cashdrawer
Route::resource('cashdrawers', CashdrawerController::class);

// CRUD opname
Route::resource('opnames',OpnameController::class);

// LOGIN
Route::get('guest/login/daftar', [LoginController::class, 'Daftar'])->name('guest.daftar');
Route::get('guest/login/masuk', [LoginController::class, 'Masuk'])->name('guest.masuk');
Route::post('guest/login/daftar', [LoginController::class, 'submitDaftar'])->name('guest.daftar.submit');
Route::post('guest/login/masuk', [LoginController::class, 'submitMasuk'])->name('guest.masuk.submit');
