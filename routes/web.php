<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::controller(LoginController::class)
->prefix('auth')
->name('auth.')
->group(function() {
    Route::post('/verified', 'verified')->name('verified');
    Route::get('/role', 'role')->name('role');
});



Route::get('/role', function () {
    return view('page.role');
});
