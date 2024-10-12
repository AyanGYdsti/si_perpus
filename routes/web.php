<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BukuController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AnggotaController;
use App\Http\Controllers\Backend\BukuBackendController;
use App\Http\Controllers\Backend\PeminjamanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[BerandaController::class,'index'] );
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/search', [Bukucontroller::class,'search']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/auth/login', [AuthController::class, 'authLogin']);
Route::get('/dashboard', [DashboardController::class, 'index']);
// Data Anggota
Route::get('/data-anggota', [AnggotaController::class, 'index']);
Route::post('/data-anggota/store', [AnggotaController::class, 'store']);
Route::get('/data-anggota/delete/{id}', [AnggotaController::class, 'delete']);
Route::put('/data-anggota/update/{id}', [AnggotaController::class, 'update']);
// Data Buku 
Route::get('/data-buku', [BukuBackendController::class, 'index']);
Route::post('/data-buku/store', [BukuBackendController::class, 'store']);
Route::get('/data-buku/delete/{id}', [BukuBackendController::class, 'delete']);
Route::put('/data-buku/update/{id}', [BukuBackendController::class, 'update']);
// Data Peminjaman
Route::get('/data-peminjaman', [PeminjamanController::class, 'index']);
Route::post('/data-peminjaman/store', [PeminjamanController::class, 'store']);
Route::get('/data-peminjaman/delete/{id}', [PeminjamanController::class, 'delete']);
Route::put('/data-peminjaman/update/{id}', [PeminjamanController::class, 'update']);