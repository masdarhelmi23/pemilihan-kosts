<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;
use App\Http\Controllers\PemesananController; // Pastikan ini sudah ada atau tambahkan jika belum
use App\Http\Controllers\ReviewController;

Route::post('/reviews/{kost}', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/', [KostController::class, 'index']);
//Route::get('/Kost/{id}', [KostController::class, 'show']); // Ini tetap dikomentari seperti aslinya
Route::get('/kosts/{kost}', [KostController::class, 'show'])->name('kosts.show');

// Rute yang diubah/ditambahkan
Route::get('/pemesanans/{kost}/create', [PemesananController::class, 'create'])->name('pemesanans.create');
Route::post('/pemesanans/{kost}', [PemesananController::class, 'store'])->name('pemesanans.store');

// Rute baru untuk menampilkan daftar pemesanan
Route::get('/pemesanans', [PemesananController::class, 'index'])->name('pemesanans.index');