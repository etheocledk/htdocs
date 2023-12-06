<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* $router->get('/', function () use ($router) {
    return $router->app->version();
}); */


//route
$router->post('/posts/store',"BlogController@store");
$router->get('/posts','BlogController@liste');
$router->post('/post/comment',"BlogController@saveComment");
$router->get('/comments/blog/{id}','BlogController@getCommentByBlog');
$router->get('/all/blog','BlogController@getBlogs');

$router->delete('/blog/deleteBlog/{id}','BlogController@deleteBlog');
