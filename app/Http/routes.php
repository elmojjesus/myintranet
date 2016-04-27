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
    return view('dashboard/index');
}]);

Route::group(['middleware' => 'auth'], function() {

	//Dashboard routes
	Route::get('dashboard', 'DashboardController@index');

	//Routes deficiencies
	Route::get('deficiency', 'DeficiencyController@index');
	Route::get('deficiency/create', 'DeficiencyController@create');
	Route::post('deficiency/store', 'DeficiencyController@store');
	Route::get('deficiency/edit/{id}', 'DeficiencyController@edit');
	Route::post('deficiency/update/{id}', 'DeficiencyController@update');
	Route::get('deficiency/delete/{id}', 'DeficiencyController@delete');
	Route::post('deficiency/destroy/{id}', 'DeficiencyController@destroy');

	//Routes Professions
	Route::get('profession', 'ProfessionController@index');
	Route::get('profession/create', 'ProfessionController@create');
	Route::post('profession/store', 'ProfessionController@store');
	Route::get('profession/edit/{id}', 'ProfessionController@edit');
	Route::post('profession/update/{id}', 'ProfessionController@update');
	Route::get('profession/delete/{id}', 'ProfessionController@delete');
	Route::post('profession/destroy/{id}', 'ProfessionController@destroy');

	//Routes Educations
	Route::get('education', 'EducationController@index');
	Route::get('education/create', 'EducationController@create');
	Route::post('education/store', 'EducationController@store');
	Route::get('education/edit/{id}', 'EducationController@edit');
	Route::post('education/update/{id}', 'EducationController@update');
	Route::get('education/delete/{id}', 'EducationController@delete');
	Route::post('education/destroy/{id}', 'EducationController@destroy');

	//Routes Users
	Route::get('user', 'UserController@index');
	Route::get('user/create', 'UserController@create');
	Route::post('user/store', 'UserController@store');
	Route::get('user/edit/{id}', 'UserController@edit');
	Route::post('user/update/{id}', 'UserController@update');
	Route::get('user/delete/{id}', 'UserController@delete');
	Route::post('user/destroy/{id}', 'UserController@destroy');
	Route::get('user/show/{id}', 'UserController@show');


	//Sports routes
	Route::get('sport', 'SportController@index');
	Route::post('sport/index', 'SportController@store');
	Route::get('sport/edit/{id}', 'SportController@edit');
	Route::post('sport/update/{id}', 'SportController@update');


	//Athlete's routes
	Route::get('athlete', 'AthleteController@index');
	#Route::post('athlete', 'AthleteController@index');
	Route::get('athlete/create', 'AthleteController@create');
	Route::post('athlete/create', 'AthleteController@create');
	Route::get('athlete/create/modal/{id}', 'AthleteController@createModal');
	Route::post('athlete/store/{id}', 'AthleteController@store');
	Route::get('athlete/show', 'AthleteController@show');


	//Route Documents
	Route::get('document/create/{id}', 'DocumentController@create');
	Route::post('document/store', 'DocumentController@store');


	//Route Departaments
	Route::get('departament', 'DepartamentController@index');
	Route::get('departament/create', 'DepartamentController@create');
	Route::post('departament/store', 'DepartamentController@store');
	Route::get('departament/edit/{id}', 'DepartamentController@edit');
	Route::post('departament/update/{id}', 'DepartamentController@update');
	Route::get('departament/delete/{id}', 'DepartamentController@delete');
	Route::post('departament/destroy/{id}', 'DepartamentController@destroy');

	//Employee's routes
	Route::get('employee', 'EmployeeController@index');
	Route::get('employee/create', 'EmployeeController@create');
	Route::post('employee/create', 'EmployeeController@create');
	Route::post('employee/store/{id}', 'EmployeeController@store');
	Route::get('employee/edit/{id}', 'EmployeeController@edit');
	Route::post('employee/update/{id}', 'EmployeeController@update');
	Route::get('employee/delete/{id}', 'EmployeeController@delete');
	Route::post('employee/destroy/{id}', 'EmployeeController@destroy');
	Route::get('employee/create/modal/{id}', 'EmployeeController@createModal');

	//Route Therapies
	Route::get('therapy', 'TherapyController@index');
	Route::get('therapy/create', 'TherapyController@create');
	Route::post('therapy/store', 'TherapyController@store');
	Route::get('therapy/edit/{id}', 'TherapyController@edit');
	Route::post('therapy/update/{id}', 'TherapyController@update');
	Route::get('therapy/delete/{id}', 'TherapyController@delete');
	Route::post('therapy/destroy/{id}', 'TherapyController@destroy');

	//Route Therapies
	Route::get('pacient', 'PacientController@index');
	Route::get('pacient/create', 'PacientController@create');
	Route::post('pacient/store', 'PacientController@store');
	Route::get('pacient/edit/{id}', 'PacientController@edit');
	Route::post('pacient/update/{id}', 'PacientController@update');
	Route::get('pacient/delete/{id}', 'PacientController@delete');
	Route::post('pacient/destroy/{id}', 'PacientController@destroy');

	//Image Upload
	Route::get('user/image/upload/{id}', 'ImageController@userUpload');
	Route::post('user/image/store', 'ImageController@userStore');


	Route::get('reports', 'ReportsController@index');
	Route::get('reports/user', 'ReportsController@user');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
