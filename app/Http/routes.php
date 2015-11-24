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

Route::get('/', [
    'as' => 'welcome', 'uses' => 'HomeController@welcome'
]);

Route::get('/login', [
	'as' => 'login', 'uses' => 'HomeController@login'
]);


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::post('auth/login', 'Auth\AuthController@authenticate');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

	Route::get('/', [
		'as' => 'dashboard', 'uses' => 'Admin\AdminController@dashboard'
	]);

	Route::resource('category', 'Admin\CategoryController', ['except' => ['show']]);

});