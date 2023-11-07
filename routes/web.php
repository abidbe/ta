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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/dataalat', [DataAlatController::class, 'index'])->middleware(['auth', 'verified'])->name('dataalat');
Route::get('/datatruk', [DataTrukController::class, 'index'])->middleware(['auth', 'verified'])->name('datatruk');
Route::get('/alat', [AlatController::class, 'index'])->middleware(['auth', 'verified'])->name('alat');
Route::get('/truk', [TrukController::class, 'index'])->middleware(['auth', 'verified'])->name('truk');
Route::get('/laporan', [LaporanController::class, 'index'])->middleware(['auth', 'verified'])->name('laporan');

require __DIR__ . '/auth.php';
