<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\DataTrukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/dataalat', DataAlatController::class);
    Route::resource('/datatruk', DataTrukController::class);
    Route::get('/alat', [AlatController::class, 'index'])->name('alat');
    Route::get('/truk', [TrukController::class, 'index'])->name('truk');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
});



require __DIR__ . '/auth.php';
