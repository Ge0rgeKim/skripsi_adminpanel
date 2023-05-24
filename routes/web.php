<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGuruAPIController;
use App\Http\Controllers\UserMuridAPIController;
use App\Http\Controllers\MataPelajaranAPIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopUpAPIController;
use App\Http\Controllers\DokumentasiAPIController;
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
Route::get('home/logout',[HomeController::class,'logout']);

Route::get('/', function () {
    return view('auth/login');
});
Route::middleware(['auth'])->group(function(){
    //user guru
    Route::get('/user_guru',[UserGuruAPIController::class,'index'])->name('user_guru.index');
    Route::get('/user_guru/{id}/edit',[UserGuruAPIController::class,'edit']);
    Route::put('/user_guru/{id}',[UserGuruAPIController::class,'update']);

    Route::get('/mata_pelajaran',[MataPelajaranAPIController::class,'index'])->name('mata_pelajaran.index');
    Route::get('/mata_pelajaran/create',[MataPelajaranAPIController::class,'create']);
    Route::post('/mata_pelajaran',[MataPelajaranAPIController::class,'store']);
    Route::get('/mata_pelajaran/{id}/edit',[MataPelajaranAPIController::class,'edit']);
    Route::put('/mata_pelajaran/{id}',[MataPelajaranAPIController::class,'update']);
    Route::delete('/mata_pelajaran/{id}',[MataPelajaranAPIController::class,'destroy']);

    //user murid
    Route::get('/user_murid',[UserMuridAPIController::class,'index'])->name('user_murid.index');

    //top up
    Route::get('/transaksi_saldo',[TopUpAPIController::class,'index'])->name('transaksi_saldo.index');
    Route::get('/transaksi_saldo/{id}/edit',[TopUpAPIController::class,'edit']);
    Route::put('/transaksi_saldo/{id}',[TopUpAPIController::class,'update']);
    
    //dokumentasi
    Route::get('/dokumentasi',[DokumentasiAPIController::class,'index'])->name('dokumentasi.index');
    Route::get('/dokumentasi/{id}/edit',[DokumentasiAPIController::class,'edit']);
    Route::put('/dokumentasi/{id}',[DokumentasiAPIController::class,'update']);
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();


