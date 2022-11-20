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

    Route::prefix('caution')->group(function () {
        Route::get('/', [\App\Http\Controllers\CautionController::class, 'index'])->name('caution');
        Route::get('{caution_id}', [\App\Http\Controllers\CautionController::class, 'show'])->name('caution.show');
    });
});
