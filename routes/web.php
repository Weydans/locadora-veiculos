<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReserveController;
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

    Route::get('/', [ ReserveController::class, 'index' ])->name('reserves.index');
    Route::get('/cars/{car}/reserves', [ ReserveController::class, 'create' ])->name('reserves.create');
    Route::post('/cars/{car}/reserves', [ ReserveController::class, 'store' ])->name('reserves.store');
    Route::get('/reserves/{reserve}/edit', [ ReserveController::class, 'edit' ])->name('reserves.edit');
    Route::put('/reserves/{reserve}', [ ReserveController::class, 'update' ])->name('reserves.update');
    Route::delete('/reserves/{reserve}', [ ReserveController::class, 'destroy' ])->name('reserves.destroy');

    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/cars', CarController::class)->except('show');
});
