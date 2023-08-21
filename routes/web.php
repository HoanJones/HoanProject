<?php

use App\Http\Controllers\Admin\InstrumentTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\User\FluteBorrowingController;
use App\Http\Controllers\User\SheetController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\VideoController;
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
    Route::resource('video', VideoController::class);
    Route::resource('sheet', SheetController::class);
    Route::group(['prefix' => 'flute-borrowing', 'as' => 'flute-borrowing.'], function (){
        Route::get('/', [FluteBorrowingController::class,'index'])->name('index');
        Route::get('borrow/{id}', [FluteBorrowingController::class,'borrow'])->name('borrow');
        Route::put('borrow/{id}', [FluteBorrowingController::class,'borrowing'])->name('borrowing');
    });
    //admin quan ly
    Route::resource('role', RoleController::class);
    Route::resource('usermanagement', UserManagementController::class);
    Route::resource('event', EventController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('instrument_type', InstrumentTypeController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});





