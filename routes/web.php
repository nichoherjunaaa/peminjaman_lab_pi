<?php

use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\Peminjaman;
use App\Http\Controllers\PeminjamanController;
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

Route::get('/laboratorium/{id}', [LaboratoriumController::class, 'show'])->name('detail-laboratorium');


Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium.index');
Route::delete('/delete-laboratorium/{id}', [LaboratoriumController::class, 'destroy'])->name('delete.laboratorium');

Route::get('/booking/1', function(){
    return view('pages.detail_pengajuan');
}) ->name('detail-peminjaman');

Route::get('/laboratorium/1/edit', function () {
    return view('pages.edit_laboratorium');
})->name('edit.laboratorium');

Route::get('/privacy', function () {
    return view('pages.kebijakan_privasi');
});

Route::get('/booking', function () {
    return view('pages.peminjaman');

})->name('booking.index');

Route::get('/create', [PeminjamanController::class, 'create'])->name('booking.form');

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