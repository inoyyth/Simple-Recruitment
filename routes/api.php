<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PicJadwalController;
use App\Http\Controllers\AuthController;

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

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'getDetail');
    Route::post('/', 'create');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(RoleController::class)->middleware(['auth'])->prefix('role')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'create');
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

Route::controller(PicJadwalController::class)->prefix('pic-jadwal')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'store');
    Route::put('/{id}', 'store');
    Route::delete('/{id}', 'hapus');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'validation']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
