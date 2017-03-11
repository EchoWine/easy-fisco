<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::post('/register', ['uses' => 'Auth\RegistrationController@index']);


Route::group(['middleware' => 'auth:api'], function () {
	Route::get('/user/profile', ['uses' => 'User\ProfileController@index']);
});
