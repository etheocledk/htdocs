<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/links', [LinksController::class, 'store']);

Route::post('/storeRegistration', [UsersController::class, 'storeRegistration']);

/* Route::controller(UsersController::class)->group(function () {
    Route::post('/storeRegistration', "storeRegistration");
    Route::get('/verify_email/{email}', 'verify')->name('verifyEmail');
    Route::get('/passwordResetPage', "passwordResetPage")->name('passwordResetPage');
    Route::get('/passwordChangePage', "passwordChangePage")->name('passwordChangePage');
    Route::post('/authentification', "authentification")->name('authentification');
    Route::get('/logout', "logout")->name('logout');
    Route::post('/store/Password', "storePassword")->name('storePassword');
    Route::post('/updatePwd/{email}', "updatePwd")->name('updatePwd');
    Route::get('/verify_pwd', 'verifyPwd')->name('verifyPwd');
}); */