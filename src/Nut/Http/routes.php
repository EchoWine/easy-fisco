<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::get('/login', ['as' => 'nut.index','uses' => 'Auth\LoginController@index']);
