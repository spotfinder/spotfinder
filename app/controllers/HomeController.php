<?php

class HomeController extends BaseController {

	public function __construct(){

		// Run an auth filter before all methods except 
		$this->beforeFilter('auth', ['except' => ['showLogin', 'doLogin', 'showWelcome', 'showHome']]);

		$this->beforeFilter('admin', ['except' => ['showLogin', 'doLogin', 'logout', 'showWelcome', 'showHome', 'showReservation', 'showConfirmation', 'results', 'sendConfirmation']]);

	}

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
	public function showWelcome(){
		return View::make('hello');
	}

	public function showHome(){
		return View::make('index');
	}

	public function showLogin() {
		return View::make('login');
	}

	public function doLogin() {
		// create the validator
    	$validator = Validator::make(Input::all(), User::$signin_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect with validation errors
        	$messages = $validator->messages();
        	foreach ($messages->all() as $message){
    			Session::flash('errorMessage', $message);	
        	}
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {

			// Perform Authentication
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {

				if (Auth::user()->isAdmin()){

				   	return Redirect::intended('/admin');

				}else{
	    		
	    		return Redirect::to('/reserve');
	    	    
	    	    }
                
			} else {
				Session::flash('errorMessage', 'User email or password not recognized.  Please try again.');
				return Redirect::back()->withInput()->withErrors($validator);
			}
    		
    	}

	}

	public function logout() {
		Auth::logout();
		return Redirect::action('HomeController@showHome');
	}

	public function showReservation() {
		return View::make('reservation');
	}
    
    public function results() {
		return View::make('search');
	}

	public function showAdmin() {
		return View::make('admin');
	}
    
    public function showConfirmation() {
		return View::make('confirmation');
	}
    
    public function sendConfirmation() {
    	Twilio::message('2102372042', 'Pink Elephants and Happy Rainbows');
    	return View::make('confirmation');
    }
}