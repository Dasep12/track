<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\MusnahController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/inputservice', [InputController::class, 'index']);
Route::post('/inputservice', [InputController::class, 'store']);
Route::get('/barang', [BarangController::class, 'barang']);
Route::get('/updateStatusbarang', [BarangController::class, 'updateBarang'])->name('updateBarang');
Route::get('/loadModalBarang', [BarangController::class, 'detailModal'])->name('loadModal');
Route::post('/hapusServiceBarang', [BarangController::class, 'hapusBarang'])->name('hapusBarang');
Route::get('/musnah', [MusnahController::class, 'index'])->name('barangMusnah');
Route::post('/musnahBarang', [MusnahController::class, 'musnah'])->name('pemusnahan');
Route::get('/loadFormMusnah', [BarangController::class, 'modalformMusnah'])->name('formMusnah');
