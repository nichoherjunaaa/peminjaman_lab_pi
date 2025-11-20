<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\QuickBookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// GUEST
Route::get('/', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.post');


// Proteksi Route
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/borrowing/{id}', [PeminjamanController::class, 'show'])->name('borrowing-details');
    Route::get('/borrowing', [PeminjamanController::class, 'index'])->name('borrowing.index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('booking.form');
    Route::put('/borrowing/{id}', [PeminjamanController::class, 'update'])->name('borrowing.update');

    Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium.index');
    Route::get('/laboratorium-add', function () {
        return view('pages.laboratorium-add');
    })->name('laboratorium.create');
    Route::post('/laboratorium/create', [LaboratoriumController::class, 'store'])->name('laboratorium.store');
    Route::get('/laboratorium/{id}', [LaboratoriumController::class, 'show'])->name('detail-laboratorium');
    Route::get('/laboratorium/{id}/booking', [LaboratoriumController::class, 'show_booking'])->name('booking-laboratorium');
    Route::delete('/laboratorium/{id}', [LaboratoriumController::class, 'destroy'])->name('laboratorium.destroy');
    Route::get('/laboratorium/{id}/edit', [LaboratoriumController::class, 'edit'])->name('edit.laboratorium');
    Route::put('/laboratorium/{id}', [LaboratoriumController::class, 'update'])->name('laboratorium.update');

    Route::get('/borrowing/{id}', [PeminjamanController::class, 'show'])->name('borrowing-details');
    Route::get('/borrowing', [PeminjamanController::class, 'index'])->name('borrowing.index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('booking.form');
    Route::put('/borrowing/{id}', [PeminjamanController::class, 'update'])->name('borrowing.update');
    Route::post('/create/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    // Report
    Route::get('/report', [PeminjamanController::class, 'report'])->name('report');
    Route::get('/quickbook', [QuickBookController::class, 'index'])->name('quickbook.index');
    Route::post('/quickbook/search', [QuickBookController::class, 'search'])->name('quickbook.search');
    Route::get('/privacy', function () {
        return view('pages.privacy');
    });

    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/export-excel', [ReportController::class, 'exportExcel'])->name('report.export.excel');
});

// Fallback
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
