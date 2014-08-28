<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));
Route::get('download/resume', function() {
	return Response::download(public_path() . '/Resume.pdf');
});

Route::group(array('before' => 'auth'), function() {

	Route::resource('projects', 'ProjectsController', array('only' => array('show')));//
	Route::get('users/create', 'UsersController@create');
	Route::post('users', 'UsersController@store');
	Route::get('users/logout', 'UsersController@logout');

});

// Confide routes
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
