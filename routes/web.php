<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
});
*/

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;

Route::get('/', [BarangController::class, 'index']);
Route::get('/barang/{id}', [BarangController::class, 'show']);

Route::get('/penjualan', [PenjualanController::class, 'create']);
Route::post('/penjualan', [PenjualanController::class, 'store']);