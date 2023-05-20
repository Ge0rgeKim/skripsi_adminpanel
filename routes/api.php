<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API_MataPelajaranController;
use App\Http\Controllers\API_UserMuridController;
use App\Http\Controllers\API_UserGuruController;
use App\Http\Controllers\API_SesiGuruController;
use App\Http\Controllers\API_DetailSesiController;
use App\Http\Controllers\API_DokumentasiGuruController;
use App\Http\Controllers\API_ReportMuridController;
use App\Http\Controllers\API_ReviewMuridController;
use App\Http\Controllers\API_SaldoUserController;
use App\Http\Controllers\API_TransaksiSaldoController;
use App\Http\Controllers\API_TransaksiSesiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//transaksi sesi
Route::get('/transaksi_sesi',[API_TransaksiSesiController::class,'index']);
Route::post('/transaksi_sesi/{id}',[API_TransaksiSesiController::class,'store']);
Route::get('/transaksi_sesi/{id}',[API_TransaksiSesiController::class,'show']);
Route::get('/transaksi_sesi/murid/{id}',[API_TransaksiSesiController::class,'historymurid']);
Route::put('/transaksi_sesi/{id}',[API_TransaksiSesiController::class,'update']);
Route::delete('/transaksi_sesi/{id}',[API_TransaksiSesiController::class,'destroy']);

//transaksi saldo
Route::get('/transaksi_saldo',[API_TransaksiSaldoController::class,'index']);
Route::post('/transaksi_saldo/{id}',[API_TransaksiSaldoController::class,'store']);
Route::get('/transaksi_saldo/{id}',[API_TransaksiSaldoController::class,'show']);
Route::put('/transaksi_saldo/{id}',[API_TransaksiSaldoController::class,'update']);
Route::delete('/transaksi_saldo/{id}',[API_TransaksiSaldoController::class,'destroy']);

//saldo
Route::get('/saldo',[API_SaldoUserController::class,'index']);
Route::post('/saldo',[API_SaldoUserController::class,'store']);
Route::get('/saldo/{id}',[API_SaldoUserController::class,'show']);
Route::put('/saldo/{id}',[API_SaldoUserController::class,'update']);
Route::delete('/saldo/{id}',[API_SaldoUserController::class,'destroy']);

//review
Route::get('/review',[API_ReviewMuridController::class,'index']);
Route::post('/review',[API_ReviewMuridController::class,'store']);
Route::get('/review/{id}',[API_ReviewMuridController::class,'show']);
Route::put('/review/{id}',[API_ReviewMuridController::class,'update']);
Route::delete('/review/{id}',[API_ReviewMuridController::class,'destroy']);

//report
Route::get('/report',[API_ReportMuridController::class,'index']);
Route::post('/report',[API_ReportMuridController::class,'store']);
Route::get('/report/{id}',[API_ReportMuridController::class,'show']);
Route::put('/report/{id}',[API_ReportMuridController::class,'update']);
Route::delete('/report/{id}',[API_ReportMuridController::class,'destroy']);

//dokumentasi
Route::get('/dokumentasi',[API_DokumentasiGuruController::class,'index']);
Route::post('/dokumentasi',[API_DokumentasiGuruController::class,'store']);
Route::get('/dokumentasi/{id}',[API_DokumentasiGuruController::class,'show']);
Route::put('/dokumentasi/{id}',[API_DokumentasiGuruController::class,'update']);
Route::delete('/dokumentasi/{id}',[API_DokumentasiGuruController::class,'destroy']);

//sesi
Route::get('/sesi',[API_SesiGuruController::class,'index']);
Route::post('/sesi',[API_SesiGuruController::class,'store']);
Route::get('/sesi/{id}',[API_SesiGuruController::class,'show']);
Route::put('/sesi/{id}',[API_SesiGuruController::class,'update']);
Route::delete('/sesi/{id}',[API_SesiGuruController::class,'destroy']);

//user_guru
Route::get('/user_guru',[API_UserGuruController::class,'index']);
Route::post('/user_guru',[API_UserGuruController::class,'store']);
Route::get('/user_guru/{id}',[API_UserGuruController::class,'show']);
Route::put('/user_guru/{id}',[API_UserGuruController::class,'update']);
Route::delete('/user_guru/{id}',[API_UserGuruController::class,'destroy']);

//mata pelajaran
Route::get('/mata_pelajaran',[API_MataPelajaranController::class,'index']);
Route::post('/mata_pelajaran',[API_MataPelajaranController::class,'store']);
Route::get('/mata_pelajaran/{id}',[API_MataPelajaranController::class,'show']);
Route::put('/mata_pelajaran/{id}',[API_MataPelajaranController::class,'update']);
Route::delete('/mata_pelajaran/{id}',[API_MataPelajaranController::class,'destroy']);

//user murid
Route::get('/user_murid',[API_UserMuridController::class,'index']);
Route::post('/user_murid',[API_UserMuridController::class,'store']);
Route::get('/user_murid/{id}',[API_UserMuridController::class,'show']);
Route::put('/user_murid/{id}',[API_UserMuridController::class,'update']);
Route::delete('/user_murid/{id}',[API_UserMuridController::class,'destroy']);
