<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/disabled-users', [App\Http\Controllers\ManageUserController::class, 'DisabledUserData'])->name('disabled-users');
Route::get('/enabled-users', [App\Http\Controllers\ManageUserController::class, 'EnabledUserData'])->name('enabled-users');
Route::post('/user-permission', [App\Http\Controllers\UserPermissionController::class, 'UserPermissions'])->name('user-permission');
Route::post('/user-login', [App\Http\Controllers\PicDBController::class, 'LoginAcc'])->name('user-login');
Route::post('/create-account', [App\Http\Controllers\PicDBController::class, 'createAcc'])->name('create-account');
Route::post('/forgot-pwd', [App\Http\Controllers\PicDBController::class, 'ForgotPwd'])->name('forgot-pwd');
