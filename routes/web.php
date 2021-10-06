<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\InputController;
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

// Route::get('/', function () {
//     return view('daftarbarang');
// });


Route::get('/inputservice', [InputController::class, 'index']);
Route::post('/inputservice', [InputController::class, 'store']);
Route::get('/barang', [BarangController::class, 'barang']);
Route::post('/updateStatusbarang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');
Route::get('/loadModalBarang', [BarangController::class, 'detailModal'])->name('loadModal');
