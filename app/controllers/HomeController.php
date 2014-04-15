<?php

class HomeController extends BaseController {

	public function __construct(){

		// Run an auth filter before all methods except 
		$this->beforeFilter('auth', ['except' => ['showLogin', 'doLogin', 'showWelcome', 'showHome']]);

		$this->beforeFilter('admin', ['only' => ['showAdmin']]);

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
		$users = User::all();
		return View::make('admin')->with(array('users'=> $users));
	}
    
    public function showConfirmation() {
		return View::make('confirmation');
	}
    
    public function sendConfirmation() {
    	Twilio::message('2102372042', 'Pink Elephants and Happy Rainbows');
    	return View::make('confirmation');
    }

    public function doPay()
	{
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here https://manage.stripe.com/account
		Stripe::setApiKey(Config::get('stripe.stripe.secret'));
		Input::all();
		// Get the credit card details submitted by the form
		$token = Input::get('stripeToken');
		$amount = Input::get('amount');

		// Create the charge on Stripe's servers - this will charge the user's card
		try {

		$customer = Stripe_Customer::create(array(
		'email' => 'customer@example.com',
		'card'  => $token
		));

		$charge = Stripe_Charge::create(array(
		"amount" => $amount, // amount in cents, again
		"customer" => $customer->id,
		"currency" => "usd",
		"description" => "payinguser@example.com")
		);

		} catch(Stripe_CardError $e) {
		// The card has been declined
		dd($e);
		}

		dd($charge);
	}
}