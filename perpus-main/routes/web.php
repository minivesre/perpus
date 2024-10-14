<?php

use App\Http\Controllers\PerpusCon;
use Illuminate\Support\Facades\Route;

// Rute untuk Barang
Route::get('perpus', [PerpusCon::class, 'index'])->name('perpus.index');
Route::get('perpus/create', [PerpusCon::class, 'create'])->name('perpus.create');
Route::post('perpus/store', [PerpusCon::class, 'store'])->name('perpus.store');
Route::get('perpus/{id}/edit', [PerpusCon::class, 'edit'])->name('perpus.edit');
Route::put('perpus/{id}', [PerpusCon::class, 'update'])->name('perpus.update');
Route::delete('perpus/{id}', [PerpusCon::class, 'destroy'])->name('perpus.destroy');

// Rute untuk Registrasi
Route::get('register', [PerpusCon::class, 'showRegistrationForm'])->name('register');
Route::post('register', [PerpusCon::class, 'register'])->name('register.submit');

// Rute untuk Login
Route::get('login', [PerpusCon::class, 'showLoginForm'])->name('login');
Route::post('login', [PerpusCon::class, 'login'])->name('login.submit');

// Rute untuk Logout
Route::post('logout', [PerpusCon::class, 'logout'])->name('logout');
