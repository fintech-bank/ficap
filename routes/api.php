<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('request-code', [\App\Http\Controllers\Api\ApiController::class, 'request_code']);
Route::post('verify-code', [\App\Http\Controllers\Api\ApiController::class, 'verify_code']);
