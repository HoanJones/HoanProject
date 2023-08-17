<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExecutiveBoardController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\UserController;
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
    Route::resource('profile', UserController::class)->except([
        'show',
        'create',
        'store',
        'destroy',
    ]);
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::resource('event', EventController::class);
    //admin quan ly
    Route::resource('role', RoleController::class);
    Route::resource('usermanagement', UserManagementController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});





