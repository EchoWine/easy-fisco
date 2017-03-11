<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::get('/nut', ['as' => 'nut.index','uses' => 'WelcomeController@index']);
