<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;

Route::get('/', [KostController::class, 'index']);
Route::get('/Kost/{id}', [KostController::class, 'show']);
Route::get('/kosts/{id}', [KostController::class, 'show'])->name('kosts.show');
Route::get('/pemesanans/create', [PemesananController::class, 'create'])->name('pemesanans.create');


