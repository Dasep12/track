<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MusnahController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [LoginController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/inputservice', [InputController::class, 'index']);
Route::post('/inputservice', [InputController::class, 'store']);
Route::get('/barang', [BarangController::class, 'barang']);
Route::get('/updateStatusbarang', [BarangController::class, 'updateBarang'])->name('updateBarang');
Route::get('/loadModalBarang', [BarangController::class, 'detailModal'])->name('loadModal');
Route::post('/hapusServiceBarang', [BarangController::class, 'hapusBarang'])->name('hapusBarang');
Route::get('/musnah', [MusnahController::class, 'index'])->name('barangMusnah');
Route::post('/musnahBarang', [MusnahController::class, 'musnah'])->name('pemusnahan');
Route::post('/accpemusnahan', [MusnahController::class, 'accMusnah'])->name('accMusnah');
Route::get('/loadFormMusnah', [BarangController::class, 'modalformMusnah'])->name('formMusnah');
Route::get('/addsarana', [AddController::class, 'index']);
Route::post('/addsarana', [AddController::class, 'store']);

Route::post('/upload', [AddController::class, 'fileImport']);
Route::get('/upload', [AddController::class, 'formUpload']);
Route::get('/master', [MasterController::class, 'index']);
Route::get('/addUser', [UserController::class, 'addUser']);
Route::post('/addUser', [UserController::class, 'storeUser'])->name('postuser');
Route::get('/user', [UserController::class, 'index']);


Route::post('/login', [LoginController::class, 'cekLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
