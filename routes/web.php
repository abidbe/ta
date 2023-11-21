<?php

use App\Http\Controllers\BatubaraController;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\DataTrukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MinyakController;
use App\Http\Controllers\ProfileController;
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
    
    
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/batubara/{awal}/{akhir}', [LaporanController::class, 'cetakLaporanBatubara'])->name('laporan.cetak.batubara');
    Route::get('/laporan/minyak/{awal}/{akhir}', [LaporanController::class, 'cetakLaporanMinyak'])->name('laporan.cetak.minyak');
});
Route::middleware('admin')->group(function(){
    Route::resource('/dataalat', DataAlatController::class);
    Route::resource('/datatruk', DataTrukController::class);
    Route::resource('/minyak', MinyakController::class);
    Route::resource('/batubara', BatubaraController::class);
});
require __DIR__ . '/auth.php';



