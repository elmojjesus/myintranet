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
Route::get('/', ['middleware' => 'auth', function () {
    
}]);

Route::group(['middleware' => 'auth'], function() {
	Route::get('deficiency', 'DeficiencyController@index');
	Route::get('deficiency/create', 'DeficiencyController@create');
	Route::post('deficiency/store', 'DeficiencyController@store');
	Route::get('deficiency/edit/{id}', 'DeficiencyController@edit');
	Route::post('deficiency/update/{id}', 'DeficiencyController@update');
	Route::get('deficiency/delete/{id}', 'DeficiencyController@delete');
	Route::post('deficiency/destroy/{id}', 'DeficiencyController@destroy');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
