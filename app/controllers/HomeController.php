<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin()
    {
    	return View::make('login');
    }

    public function doLogin()
    {

    	$eMail = Input::get('email');
    	$password = Input::get('password');

    	if (Auth::attempt(array('email' => $eMail, 'password' => $password)))
		{
		    return Redirect::intended('hello');
			Session::flash('LoginMsg', 'Login sucessfully.');
		}
		else
		{
		    return Redirect::back()->withInput();
		    Session::flash('loginError', 'Login failed! Try again');
		}

		
	}

	public function logout()
    {
    	Auth::logout();
    	return Redirect::action("hello");	
    }

}