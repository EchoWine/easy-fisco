<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
*/

Route::get('/api/v1', ['as' => 'api.index','uses' => 'WelcomeController@index']);
