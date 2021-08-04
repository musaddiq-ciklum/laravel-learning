<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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



Route::apiResource('products', ProductController::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::apiResource('products', ProductController::class);

    Route::post('upload-file',[UserController::class,'uploadFile']);
});;

Route::post("login",[UserController::class,'login']);
