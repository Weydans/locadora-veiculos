<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [ LoginController::class, 'index' ])->name('login');
Route::post('/login', [ LoginController::class, 'login' ])->name('signin');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [ LoginController::class, 'logout' ])->name('logout');

    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/cars', CarController::class)->except('show');
});
