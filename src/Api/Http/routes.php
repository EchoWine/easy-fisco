<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::get('/api', ['as' => 'api.index','uses' => 'WelcomeController@index']);
