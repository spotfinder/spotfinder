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
Route::get('/', 'HomeController@showWelcome'); 

Route::get('/index', 'HomeController@showHome');

Route::get('/admin', 'HomeController@showAdmin');

Route::get('/search', 'HomeController@search');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::resource('register', 'RegisterController'); 

Route::get('/reserve', 'HomeController@showReservation');


