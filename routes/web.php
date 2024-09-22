<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YourController; // Pastikan untuk mengimpor controller yang sesuai
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahan Rute untuk Prosedur, Jadwal, Pendaftaran
    Route::get('/prosedur', [ProcessController::class, 'prosedur'])->name('prosedur');
    Route::get('/jadwal', [ProcessController::class, 'jadwal'])->name('jadwal');
    Route::get('/pendaftaran', [ProcessController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/index', function () {return view('index'); // Menampilkan halaman index
    });
});

require __DIR__.'/auth.php';
