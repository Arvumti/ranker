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

Route::get('/', function()
{
	return Redirect::to('users/login');
});

Route::controller('users', 'UsersController');

// example page:
Route::get('example', 'ExampleController@getExample');
Route::post('example', 'ExampleController@postExample');


// contact page:
Route::get('contact', 'ContactController@getContact');
Route::post('contact', 'ContactController@postContact');
