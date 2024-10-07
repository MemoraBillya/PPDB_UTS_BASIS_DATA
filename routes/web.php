<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AdminZonaController;
use App\Http\Controllers\ZonasiController;


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::get('/admin/pendaftaran/{id}', [AdminPendaftaranController::class, 'show'])->name('admin.pendaftaran.show');
    Route::put('/admin/pendaftaran/{id}', [AdminPendaftaranController::class, 'update'])->name('admin.pendaftaran.update');
    Route::get('/admin/zonasi', [AdminZonaController::class, 'index'])->name('admin.zonasi.index');
    Route::get('/admin/zonasi/{id_sekolah}', [AdminZonaController::class, 'show'])->name('admin.zonasi.show');
    Route::get('/admin/pengumuman', [ZonasiController::class, 'index'])->name('admin.pengumuman.index');
    Route::post('/admin/zonasi/process', [ZonasiController::class, 'processZonasi'])->name('admin.zonasi.process');
});

Route::middleware(['auth', CheckRole::class . ':user'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahan Rute untuk Prosedur, Jadwal, Pendaftaran, Pengumuman
    Route::get('/prosedur', [ProcessController::class, 'prosedur'])->name('prosedur');
    Route::get('/jadwal', [ProcessController::class, 'jadwal'])->name('jadwal');
    Route::get('/penerimaan', [ProcessController::class, 'penerimaan'])->name('penerimaan');
    Route::middleware(['auth'])->group(function () {
     Route::match(['get', 'post'], '/pendaftaran', [ProcessController::class, 'pendaftaran'])->name('pendaftaran');});
    Route::get('/index', function () {return view('index'); // Menampilkan halaman index
    });
});




require __DIR__.'/auth.php';
