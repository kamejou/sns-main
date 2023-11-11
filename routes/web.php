<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
use App\Http\Middleware\AuthCheck;

//ログアウト中のページ
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


Route::middleware([AuthCheck::class])->group(function () {
  //ログイン中のページ
  Route::get('/top','PostsController@index');
  Route::get('/profile','UsersController@profile');
  Route::get('/search','UsersController@search');
  Route::get('/index', 'UsersController@index');
  Route::get('/follow-list','FollowsController@followList');
  Route::get('/follower-list','FollowsController@followerList');
  Route::post('/update/top','UsersController@update');

  //投稿を押した時
  Route::post('/posts/create','PostsController@create');
  Route::post('/post','PostController@store')->name('post.store');
  //削除delete
  Route::get('/post/{id}/delete', 'PostsController@delete');
  Route::post('/post/{id}/delete', 'PostsController@delete');
  //更新update
  Route::get('post/{id}/update-form', 'PostsController@updateForm');
});
