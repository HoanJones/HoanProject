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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'processLogin'])->name('process-login');
    Route::get('recoverpw', [AuthController::class, 'recoverpw'])->name('recoverpw');
});

//Route vào trang chủ của hệ thống
Route::middleware('auth')->group(function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::get('home/user_edit', [UserController::class, 'edit'])->name('home.user_edit');
    Route::put('home/update', [UserController::class, 'update'])->name('home.update');
    //Route::get('home/admin_edit', [ExecutiveBoardController::class, 'edit'])->name('home.admin_edit');
    //Route::get('home/update', [ExecutiveBoardController::class, 'update'])->name('home.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

/*
    Route::get('/admin', function () {
        return view('admin');
    })->middleware('auth', 'role:admin');

    Route::get('/member', function () {
        return view('member');
    })->middleware('auth', 'role:member');

    Route::get('/former-member', function () {
        return view('former_member');
    })->middleware('auth', 'role:former_member');
*/




