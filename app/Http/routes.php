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

Route::get('/', 'WelcomeController@index');

//modules
Route::get('/modules/create', 'ModuleController@create');
Route::get('/modules/view', 'ModuleController@show');

Route::get('/modules/edit/{id}', 'ModuleController@edit');
Route::get('/modules/update/{id}', 'ModuleController@update');

Route::get('/modules/delete/{id}', 'ModuleController@destroy');

Route::get('/modules/deletefield/{id}', 'ml_fieldController@destroy');

Route::post('/modules/create', 'ModuleController@store');


//lists
Route::get('/lists/create', 'listController@create');
Route::get('/lists/view', 'listController@show');

Route::post('/lists/create', 'listController@store');


Route::get('/lists/edit/{id}', 'listController@edit');
Route::get('/lists/update/{id}', 'listController@update');
Route::get('/lists/updateheader/{id}', 'headerController@update');

Route::get('/lists/delete/{id}', 'listController@destroy');
Route::get('/lists/deleterow/{id}', 'rowController@destroy');
Route::get('/lists/deletecell/{id}', 'cellController@destroy');
Route::get('/lists/deleteheader/{id}', 'headerController@destroy');
Route::get('/lists/addcell/{id}', 'cellController@store');
Route::get('/lists/updatecell/{id}', 'cellController@update');

/*Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/