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


Route::get('/', ['as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index']);
Route::get('/dichiarazione-redditi', ['as' => 'declarations', 'uses' => 'Data\DeclarationsController@index']);

