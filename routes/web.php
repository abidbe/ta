<?php

use App\Http\Controllers\BatubaraController;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\DataTrukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MinyakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/laporan', [LaporanController::class, 'form'])->name('laporan.form');
    Route::post('/laporan/viewdata', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/export/batubara', [LaporanController::class, 'exportBatubara'])->name('export.batubara');
    Route::get('/export/minyak', [LaporanController::class, 'exportMinyak'])->name('export.minyak');
});
Route::middleware('admin')->group(function () {
    Route::resource('/dataalat', DataAlatController::class);
    Route::resource('/datatruk', DataTrukController::class);
    Route::resource('/minyak', MinyakController::class);
    Route::resource('/batubara', BatubaraController::class);

    //user
    Route::resource('/user', UserController::class);
    Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
    Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
});
require __DIR__ . '/auth.php';
