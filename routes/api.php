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

// Route::get('/deck/posts', function () {
//     $post = ApideckPost::create([
//         'title' => 'My First Post',
//         'slug' => 'my-first-post'
//     ]);
//     return $post;
// });

// Route::prefix('deck')->group(function () {
//     Route::post('login', 'ApideckUsersController@login');
//     Route::get('user', 'ApideckUsersController@getLoggedIn');
//     Route::apiResource('users', 'ApideckUsersController');
//     Route::apiResource('posts', 'ApideckPostsController');
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });