<?php

use App\Http\Controllers\HomeController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Laboratorium
Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium.index');
Route::get('/laboratorium/{id}', [LaboratoriumController::class, 'show'])->name('detail-laboratorium');
Route::get('/laboratorium/{id}/booking', [LaboratoriumController::class, 'show_booking'])->name('booking-laboratorium');
Route::delete('/delete-laboratorium/{id}', [LaboratoriumController::class, 'destroy'])->name('delete.laboratorium');
Route::get('/laboratorium/1/edit', function () {
    return view('pages.laboratorium-edit');
})->name('edit.laboratorium');

// Peminjaman
Route::get('/borrowing/{id}', [PeminjamanController::class, 'show'])->name('borrowing-details');
Route::get('/borrowing', [PeminjamanController::class, 'index'])->name('borrowing.index');
Route::get('/create', [PeminjamanController::class, 'create'])->name('booking.form');
Route::put('/borrowing/{id}', [PeminjamanController::class, 'update'])->name('borrowing.update');

Route::post('/create/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// Report
Route::get('/report', function () {
    return view('pages.report');
});

Route::get('/privacy', function () {
    return view('pages.privacy');
});

// Fallback route - harus di paling bawah
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});