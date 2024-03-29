<?php

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

Route::prefix('auth')->group(function () {
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

    Route::get('caution', [\App\Http\Controllers\CautionController::class, 'index'])->name('caution');
    Route::get('credit', [\App\Http\Controllers\CautionController::class, 'credit'])->name('credit');

    Route::prefix('account')->group(function () {
        Route::get('/', [\App\Http\Controllers\Account\AccountController::class, 'index'])->name('account');
        Route::put('password', [\App\Http\Controllers\Account\AccountController::class, 'password'])->name('account.password');
    });
});
