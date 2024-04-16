<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PesertaController;

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

Route::controller(PelamarController::class)->prefix('pelamar')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'store');
    Route::delete('/{id}', 'hapus');
});

Route::controller(PesertaController::class)->prefix('peserta')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'store');
    Route::delete('/{id}', 'hapus');
});

Route::controller(JadwalController::class)->prefix('jadwal')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'store');
    Route::delete('/{id}', 'hapus');
});