<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelamarController;

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

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/', 'index');
    Route::get('/detail-satu', 'detailSatu');
    Route::get('/{id}', 'getDetail');
    Route::post('/', 'create');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(PelamarController::class)->prefix('pelamar')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'detail');
    Route::post('/', 'add');
    Route::put('/{id}', 'edit');
    Route::delete('/{id}', 'delete');
});
