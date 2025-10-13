<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes utama
Route::get('/', function () {
    return view('pages.login');
});

Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/booking', function () {
    return view('pages.peminjaman');
});
Route::get('/create', function () {
    return view('pages.ajuan');
});

Route::get('/laboratorium', function () {
    return view('pages.laboratorium');
});

Route::get('/riwayat', function () {
    return view('pages.riwayat');
});

Route::get('/profil', function () {
    return view('pages.profil');
});

Route::get('/pengaturan', function () {
    return view('pages.pengaturan');
});

// Route untuk test 404 (hapus di production)
Route::get('/test-404', function () {
    abort(404);
});

// Fallback route - harus di paling bawah
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});