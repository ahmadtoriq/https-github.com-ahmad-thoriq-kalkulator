<?php

use App\Http\Controllers\KalkulatorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[KalkulatorController::class, 'index'])->name('index');
Route::post('/jumlah',[KalkulatorController::class, 'penjumlahan'])->name('jumlah');
Route::post('/kurang',[KalkulatorController::class, 'pengurangan'])->name('kurang');
Route::post('/kali',[KalkulatorController::class, 'perkalian'])->name('kali');
Route::post('/bagi',[KalkulatorController::class, 'pembagian'])->name('bagi');
Route::post('/pangkat',[KalkulatorController::class, 'perpangkatan'])->name('pangkat');
Route::post('/modulo',[KalkulatorController::class, 'modulo'])->name('modulo');
Route::get('/get-riwayat',[KalkulatorController::class, 'getRiwayat'])->name('get-riwayat');
Route::post('/get-hasil', [KalkulatorController::class, 'getHasil'])->name('get-hasil');
