<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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


/*  Route::get('/', "App\Http\Controllers\BlogController@index")->name("index"); */
/* Route::controller(BlogController::class)->group(function(){
    
}); */

Route::get('/', [BlogController::class, "index"])->name('index')->middleware('auth');
Route::get('/all', [BlogController::class, "all"])->name('all')->middleware('auth');
Route::get('/blog/{id?}', [BlogController::class, "show"])->name('indexWidthId')->middleware('auth');
Route::post('/create-blog/store', [BlogController::class, "store"])->name('blogstore')->middleware('auth');
Route::get('/updateView/{id?}', [BlogController::class, "updateView"])->name('updateView')->middleware('auth');
Route::get('print/blog', [BlogController::class, "printBlog"])->name('printBlog')->middleware('auth');





Route::controller(UserController::class)->prefix("user")->group(function(){
    Route::get('/login', "login")->name('login');
    Route::get('/logout', "logout")->name('logout');
    Route::post('/authentification', "authentification")->name('authentification');
    Route::get('/register', "register")->name('register'); 
    Route::post('/store/register', "store")->name('storeUser'); 
    Route::post('/store/Password', "storePassword")->name('storePassword'); 
    Route::get('/verify_email/{email}', 'verify')->name('verifyEmail');
    Route::get('/forget', "forget")->name('forget');
    Route::get('/verify_pwd', 'verifyPwd')->name('verifyPwd');
    Route::post('/updatePwd/{id}', "updatePwd")->name('updatePwd');

});
//{{$blog_list->links()}}
//

 Route::get('create-blog', function(){
    return view ('create-blog');
})->name('createblog'); 

/* Route::get('/login',[UserController::class, "login"])->name('login');
    Route::get('/register', [UserController::class,"register"])->name('register'); 
    Route::post('/store/register',[UserController::class, "store"])->name('storeUser');  */

/* Route::controller(BlogController::class)->middleware("auth")->group(function(){
    Route::get('/',"index")->name('index');
 Route::get('/blog/{id?}',"show")->name('indexWidthId'); 
Route::post('/create-blog/store', "store")->name('blogstore');
}); */