<?php

class RegisterController extends BaseController {
	
	/**
	 * User Setup
	 */

	public function __construct(){
		// // Include parent constructor
		// parent::__construct();

		// Run an auth filter before all methods except index and show
		$this->beforeFilter('auth', ['except' => ['index', 'show', 'create', 'store']]);
		$this->beforeFilter('role', ['only' => ['edit', 'destroy']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			return View::make('register.register')->with(array('user'=> Auth::user()));
		}
		return View::make('register.register');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;
		return View::make('register.register')->with(['user' => $user]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// create the validator
    	$validator = Validator::make(Input::all(), User::$signup_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not register a new user - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {
        	// validation succeeded, create and save the post

    		$user = new User();
    		$user->customer_number = str_random(6);
    		$user->role_id = User::ROLE_STAND;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->street_address = Input::get('street_address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->zip = Input::get('zip');
			$user->phone_number = Input::get('phone_number');
			$user->email = Input::get('email');
			$user->password = Input::get('password');


			// example
			$user->save();
			Session::flash('successMessage', 'User created successfully');

			// Send a Welcome email to the new user
			Mail::send('welcome', array('first_name'=>Input::get('first_name')), function($message){
            $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Welcome to SpotSpy. We are dedicated to make your life much easier!');
            });

			return Redirect::action('HomeController@showLogin');
			
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return View::make('register.register')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return View::make('register.register')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
	
		// create the validator
    	$validator = Validator::make(Input::all(), User::$signup_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not update user - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {
        	// validation succeeded, create and save the post

    		
    		$user->role_id = User::ROLE_STAND;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->street_address = Input::get('street_address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->zip = Input::get('zip');
			$user->email = Input::get('email');
			$user->password = Input::get('password');

			// example
			$user->save();
			Session::flash('successMessage', 'User updated successfully');
			return Redirect::action('HomeController@showLogin');
			// change the redirect action to your desired page
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return Redirect::action('RegisterController@index');
	}

}