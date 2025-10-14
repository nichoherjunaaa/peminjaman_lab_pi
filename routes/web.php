<?php

use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\Peminjaman;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Authentikasi
Route::get('/', function () {
    return view('pages.login');
});
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/home', function () {
    return view('pages.home');
});


// Laboratorium
Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium.index');
Route::get('/laboratorium/{id}', [LaboratoriumController::class, 'show'])->name('detail-laboratorium');
Route::get('/laboratorium/{id}/booking', [LaboratoriumController::class, 'show_booking'])->name('booking-laboratorium');
Route::delete('/delete-laboratorium/{id}', [LaboratoriumController::class, 'destroy'])->name('delete.laboratorium');
Route::get('/laboratorium/1/edit', function () {
    return view('pages.edit_laboratorium');
})->name('edit.laboratorium');

// Peminjaman
Route::get('/booking/1', function () {
    return view('pages.detail_pengajuan');
})->name('detail-peminjaman');
Route::get('/booking', [PeminjamanController::class, 'index'])->name('booking.index');
Route::get('/create', [PeminjamanController::class, 'create'])->name('booking.form');
Route::get('/riwayat', function () {
    return view('pages.riwayat');
});
Route::post('/create/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');



Route::get('/privacy', function () {
    return view('pages.kebijakan_privasi');
});

Route::get('/profil', function () {
    return view('pages.profil');
});

Route::get('/pengaturan', function () {
    return view('pages.pengaturan');
});

// Fallback route - harus di paling bawah
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});