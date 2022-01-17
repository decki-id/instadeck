<?php

use Illuminate\Support\Facades\Route;
use App\Mail\InstadeckNewUserWelcomeMail;

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

//Laravel Welcome Page
Route::view('/welcome', 'welcome')->name('welcome');

// InstaDeck portfolio
// Auth::routes();
Route::get('/test-email', function () {
    Mail::to('herdiawand@yahoo.co.id')->send(new InstadeckNewUserWelcomeMail());
    return new InstadeckNewUserWelcomeMail();
});
Route::get('/instagram-api', 'InstadeckInstagramApiController@index')->name('instadeck.api');
Route::get('/instagram-api/callback', 'InstadeckInstagramApiController@callback')->name('instadeck.api.callback');
Route::get('/login-form', 'InstadeckLoginController@showLoginForm')->name('instadeck.login.form');
Route::post('/login', 'InstadeckLoginController@login')->name('instadeck.login');
Route::post('/logout', 'InstadeckLoginController@logout')->name('instadeck.logout');
Route::get('/register-form', 'InstadeckRegisterController@showRegistrationForm')->name('instadeck.register.form');
Route::post('/register', 'InstadeckRegisterController@register')->name('instadeck.register');
Route::get('/', 'InstadeckPostController@index')->name('instadeck.home');
Route::get('/post/create', 'InstadeckPostController@create')->name('instadeck.post.create');
Route::post('/post', 'InstadeckPostController@store')->name('instadeck.post.store');
Route::get('/post/{post}', 'InstadeckPostController@show')->name('instadeck.post.show');
Route::get('/profile/{username}', 'InstadeckProfileController@index')->name('instadeck.profile.show');
Route::get('/profile/{username}/edit', 'InstadeckProfileController@edit')->name('instadeck.profile.edit');
Route::patch('/profile/{username}', 'InstadeckProfileController@update')->name('instadeck.profile.update');
Route::post('/follow/{user}', 'InstadeckFollowController@store');
Route::get('/explore', 'InstadeckSearchController@index')->name('instadeck.explore');
Route::get('/search', 'InstadeckSearchController@search')->name('instadeck.search');