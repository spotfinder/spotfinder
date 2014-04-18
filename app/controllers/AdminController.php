<?php

class AdminController extends BaseController {

    public function __construct(){
        
        $this->beforeFilter('auth', ['except' => ['showLogin', 'doLogin', 'showWelcome', 'showHome']]);
		$this->beforeFilter('admin', ['only' => ['index']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::check()){
			$users = User::all();
			$reservations = Reservation::all();
			return View::make('admin')->with(array('users'=> $users, 'reservations'=> $reservations));
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		$user = new User;
		return View::make('create-edit-user');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	    //create the validator
    	$validator = Validator::make(Input::all(), User::$admin_user_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not register a new user - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {
        	//validation succeeded, create and save the post
			$user = new User();
    		$user->customer_number = str_random(6);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->street_address = Input::get('street_address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->zip = Input::get('zip');
			$user->phone_number = Input::get('phone_number');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->role_id= Input::get('role_id');

			$user->save();
            Session::flash('successMessage', 'User created sucessfully.');
            return Redirect::action('AdminController@index');
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$user = User::findOrFail($id);
		return View::make('create-edit-user')->with(array('user'=> $user));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		// create the validator
    	$validator = Validator::make(Input::all(), User::$admin_user_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not register a new user - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {
        	// validation succeeded, create and save the post
			$user = User::findOrFail($id);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->street_address = Input::get('street_address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->zip = Input::get('zip');
			$user->phone_number = Input::get('phone_number');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->role_id= Input::get('role_id');

			$user->save();
	        Session::flash('successMessage', 'User updated sucessfully.');
	        return Redirect::action('AdminController@index');
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
		$type = Input::get('type');

		// type == 'user' OR 'reservation'
		if ($type == 'user'){
			$user = User::findOrFail($id);
			if (Auth::user()->id != $id) {
				$user->delete();
				return Redirect::action('AdminController@index');	
			} else {
				Session::flash('errorMessage', 'Error: You can\'t delete your account while you are logged in');
				return Redirect::back()->withInput();
			}
		} else{
		
			$reservation = Reservation::findOrFail($id);
			$reservation->delete();
			return Redirect::action('AdminController@index');

		}	
	}
    
    public function addLot()
    {

		//create the validator
    	$validator = Validator::make(Input::all(), Lot::$lot_rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not add a new lot - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);

    	} else {
        	//validation succeeded, create and save the post

    	$lot = new Lot();

    		$lot->lot_id = Input::get('lot_id');
			$lot->lot_name = Input::get('lot_name');
			$lot->area_id = Input::get('area_id');
			$lot->area_name = Input::get('area_name');
			$lot->street_address = Input::get('street_address');
			$lot->city = Input::get('city');
			$lot->state = Input::get('state');
			$lot->zip = Input::get('zip');
			$lot->phone_number = Input::get('phone_number');
			$lot->capacity = Input::get('capacity');
			$lot->open_time = Input::get('open_time');
			$lot->close_time = Input::get('close_time');
			$lot->latitude = Input::get('latitude');
			$lot->longitude = Input::get('longitude');
			$lot->cost_per_hour = Input::get('cost_per_hour');
			$lot->save();
        
            $capacity = Input::get('capacity');
            for($counter = 1; $counter <= $capacity; $counter++){
                 $space = new Space();
                 $space->area_id = $lot->area_id;
                 $space->lot_id = $lot->lot_id;
                 $space->space_number = $counter;
                 $space->status = 0;
                 $space->save();

            }

			Session::flash('successMessage', 'Lot added successfully');
			return Redirect::action('AdminController@index');
	     }
    }

}
