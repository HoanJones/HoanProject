<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExecutiveBoardController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'loggingIn'])->name('logging-in');
    Route::get('recoverpw', [AuthController::class, 'recoverpw'])->name('recoverpw');
});

//Route vào trang chủ của hệ thống
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class)->except([
        'show',
        'create',
        'store',
        'destroy',
    ]);
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});





