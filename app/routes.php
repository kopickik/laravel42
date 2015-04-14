<?php



// DEFAULT ROUTE
Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
	]);
// CREATE A USER ACCOUNT
Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
	]);
Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
	]);
// ACCESS LOGIN ROUTE
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
    ]);
