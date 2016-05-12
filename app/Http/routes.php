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

// unauthorised views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/help', function() {
    return view('help');
});

// allow for authorisation
Route::auth();

// dashboard
Route::get('/home', 'HomeController@index');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// admin (add a course)
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
  Route::get('/', 'AdminController@show');
  Route::post('add', 'AdminController@add');
});

// user route
Route::get('/user', 'UserController@show');
Route::post('/user', 'UserController@update');
