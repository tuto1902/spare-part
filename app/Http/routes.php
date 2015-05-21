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

Route::get('home', 'HomeController@index');

// Model routes for categories
Route::post('categories/delete/{category}', 'CategoryController@postDelete');
Route::get('categories/edit/{category}', 'CategoryController@getEdit');
Route::post('categories/edit/{category}', 'CategoryController@postEdit');

// Model routes for spares
Route::post('spares/delete/{spare}', 'SpareController@postDelete');
Route::get('spares/edit/{spare}', 'SpareController@getEdit');
Route::post('spares/edit/{spare}', 'SpareController@postEdit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'categories' => 'CategoryController',
    'spares' => 'SpareController'
]);
