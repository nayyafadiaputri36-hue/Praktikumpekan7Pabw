<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Halaman utama
Route::get('/', [LaporBanjirController::class, 'home'])
    ->name('home');

// Form laporan warga
Route::get('/lapor', [LaporBanjirController::class, 'create'])
    ->name('lapor');

Route::post('/lapor', [LaporBanjirController::class, 'store'])
    ->name('lapor.store');

// Konfirmasi laporan
Route::get('/konfirmasi', [LaporBanjirController::class, 'konfirmasi'])
    ->name('konfirmasi');

// Login
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// Register
Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');

// Halaman khusus petugas
Route::middleware(['petugas'])->group(function () {

    // Daftar laporan
    Route::get('/laporan', [LaporBanjirController::class, 'index'])
        ->name('laporan.index');

    // Detail laporan
    Route::get('/laporan/{id}', [LaporBanjirController::class, 'show'])
        ->name('laporan.show');

    // Edit laporan
    Route::get('/laporan/{id}/edit', [LaporBanjirController::class, 'edit'])
        ->name('laporan.edit');

    // Update laporan
    Route::put('/laporan/{id}', [LaporBanjirController::class, 'update'])
        ->name('laporan.update');

    // Hapus laporan
    Route::delete('/laporan/{id}', [LaporBanjirController::class, 'destroy'])
        ->name('laporan.destroy');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // Profil petugas
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
});