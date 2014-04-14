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
// Route::get('/', 'HomeController@showWelcome'); 

Route::get('/', 'HomeController@showHome');

// Route::get('/admin', 'HomeController@showAdmin');

Route::get('/login', 'HomeController@showLogin');

Route::get('/admin', 'HomeController@showAdmin');

Route::any('/search', 'ReservationController@solution');

Route::any('/results', 'HomeController@results');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::resource('register', 'RegisterController'); 

Route::get('/reserve', 'HomeController@showReservation');

Route::controller('password', 'RemindersController');

Route::get('/confirmation', 'HomeController@showConfirmation');

Route::post('/confirmation', 'HomeController@sendConfirmation');
