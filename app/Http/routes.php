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
Route::get('/home', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

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
Route::group(['prefix'=>'user'], function () {
  Route::get('/', 'UserController@show');
  Route::post('/', 'UserController@update');
  Route::post('/add', 'UserController@addCourse');
  Route::get('/delete/{id}', 'UserController@deleteCourse');
});

// courses
Route::get('/course/{id}', 'CourseController@single');
// admin (notifications)
Route::group(['prefix' => 'course/{id}', 'middleware' => ['auth','admin']], function () {
  Route::get('/n/{notification}', 'CourseController@showEditNotification');
  Route::get('/notify', 'CourseController@showAddNotification');
  Route::get('/edit', 'CourseController@showEditCourse');

  Route::get('/d/{notification}', 'CourseController@deleteNotification');

  Route::post('/n/{notification}', 'CourseController@executeEditNotification');
  Route::post('/notify', 'CourseController@executeAddNotification');
  Route::post('/edit', 'CourseController@executeEditCourse');
});
