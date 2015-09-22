<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomepageController@index');
Route::post('/', 'HomepageController@emailCheck');

Route::get('/login', function() {
  if(Auth::check()) {
    return redirect('/');
  }
  return view('login');
});

Route::get('/register', function() {
  if(Auth::check()) {
    return redirect('/');
  }
  return view('register');
});

Route::get('/post/new','NewPostController@noCommunity');
Route::get('/post/{id}', 'PostController@index');
Route::post('/post/new', 'NewPostController@validatePostNoCommunity');

Route::get('/community/{id}', 'CommunityController@index');
Route::get('/community/{id}/new', 'NewPostController@index');
Route::post('/community/{id}/new', 'NewPostController@validatePost');

Route::get('/user/{id}', 'UserController@index');
Route::get('/user/{id}/posts', 'UserController@userPosts');

Route::get('/inbox', 'MessagesController@index');
Route::get('/inbox/new', 'MessagesController@newMessage');
Route::post('inbox/new', 'MessagesController@validateMessage');
Route::get('/inbox/{id}', 'MessagesController@viewMessage');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
