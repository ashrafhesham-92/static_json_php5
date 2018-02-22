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
Route::get('/modules/create/{id}', 'ModuleController@create');
Route::get('/modules/view/{id}', 'ModuleController@show');

Route::get('/modules/edit/{id}', 'ModuleController@edit');
Route::get('/modules/update/{id}', 'ModuleController@update');

Route::get('/modules/delete/{id}', 'ModuleController@destroy');

Route::get('/modules/deletefield/{id}', 'ml_fieldController@destroy');

Route::post('/modules/addvalidation/{id}', 'ml_fieldController@add_validation');

  Route::get('/modules/rmvval/{field_id}/{validation_id}', 'ml_fieldController@remove_validation');




Route::post('/modules/create/{id}', 'ModuleController@store');


//lists
Route::get('/lists/create/{id}', 'listController@create');
// Route::get('/lists/view', 'listController@show');

Route::get('/lists/view/{id}', 'listController@show');

Route::get('/lists/getjson/{id}', 'listController@generate_json');


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
Route::get('/lists/updaterow/{id}', 'rowController@update');


Route::get('/lists/actions/', 'actionController@show');
Route::get('/lists/deleteaction/{id}', 'actionController@destroy');
Route::get('/lists/createaction/', 'actionController@create');
Route::post('/lists/createaction', 'actionController@store');


Route::get('/modules/validations/', 'ml_validationController@show');
Route::get('/modules/deletevalidation/{id}', 'ml_validationController@destroy');
Route::get('/modules/createvalidation/', 'ml_validationController@create');
Route::post('/modules/createvalidation', 'ml_validationController@store');





Route::get('/apps/view', 'applicationController@show');
Route::get('/apps/create', 'applicationController@create');

Route::get('/apps/edit/{id}', 'applicationController@edit');
Route::get('/apps/update/{id}', 'applicationController@update');
Route::post('/apps/create', 'applicationController@store');
Route::get('/apps/delete/{id}', 'applicationController@destroy');



//testing request validation calss
Route::get('/test', 'testController@show');

Route::post('/test', 'testController@test');
/*Route::get('home', 'HomeController@index');

Route::controllers([
11	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/