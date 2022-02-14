<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('dashboard')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'processLogin']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/{user}/update', [UserController::class, 'update'])->name('user.update');

        Route::get('/event', [EventController::class, 'index'])->name('event.index');
        Route::get('event/buwuhan/{eventId}', [GuestController::class, 'index'])->name('guest.index');

    });
});
