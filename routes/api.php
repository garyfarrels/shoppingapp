<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\AuthuserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/users/signup', [AuthuserController::class, 'register']);
Route::post('/users/signin', [AuthuserController::class, 'login']);


Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/shopping', [ShoppingController::class,'index']);
    Route::post('/shopping', [ShoppingController::class,'create']);
    Route::put('/shopping/{shopping}', [ShoppingController::class,'update']);
    Route::get('/shopping/{id}', [ShoppingController::class,'show']);
    Route::delete('/shopping/{shopping}', [ShoppingController::class,'destroy']);
    Route::get('/users', [AuthuserController::class, 'index']);

    Route::post('/logout', [AuthuserController::class, 'logout']);
});