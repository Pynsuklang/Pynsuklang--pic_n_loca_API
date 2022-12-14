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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user-login', [App\Http\Controllers\PicDBController::class, 'LoginAcc'])->name('user-login');
Route::post('/create-account', [App\Http\Controllers\PicDBController::class, 'createAcc'])->name('create-account');
Route::post('/store-data', [App\Http\Controllers\PicDBController::class, 'store'])->name('store-data');
Route::post('/forgot-pwd', [App\Http\Controllers\PicDBController::class, 'ForgotPwd'])->name('forgot-pwd');
//Route::post('user', 'UserController@store')->name('user');
