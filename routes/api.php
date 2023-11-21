<?php

use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\Ordercontroller;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\Shopcartitemcontroller;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\WorkingtimeController;
use App\Http\Controllers\api\ZiekmeldingController;
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
Route::post('/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::controller(WorkingtimeController::class)->group(function () {
        Route::get('/wokingtime', 'index');
    });

    Route::post('ziekmelding', [ZiekmeldingController::class, 'store']);

    Route::get('/shopcart', [Shopcartitemcontroller::class, 'index']);
    Route::post('/shopcart', [Shopcartitemcontroller::class, 'store']);
    Route::delete('/shopcart/{shopcartitem}', [Shopcartitemcontroller::class, 'destroy']);
    // Route::patch('/shopcart/{shopcartitem}', [Shopcartitemcontroller::class, 'update']);

    Route::post('/Neworder', [Ordercontroller::class, 'store']);
    Route::patch('/userdataupdate', [UserController::class, 'update']);

    /* Endpoints for user data(e.g adres) */
    Route::get('/userdata', [UserController::class, 'index']);

    Route::post('/logout', [AuthenticationController::class, 'logout']);

    Route::controller(ProductController::class)->group(function () {
        Route::get('/Product/{barcode}', 'index');

    });
});
