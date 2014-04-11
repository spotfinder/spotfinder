<?php

class ReservationController extends BaseController {
	
	/**
	 * User Setup
	 */

	public function __construct(){
		// Run an auth filter before all methods except as stated
		$this->beforeFilter('auth', ['except' => ['index', 'show', 'create', 'store']]);
		$this->beforeFilter('role', ['only' => ['edit', 'destroy']]);
	}

	// Query for open spaces from the Spaces Table --------------
	// Gets all "open" spaces in "requestedArea" from the Table "Spaces"
    public function searchOpenSpaces($requestedArea){
    	$openSpaces = Space::where('area_id', $requestedArea)
    					->where('status', 0)
    					->take(5)
    					->get();
    // count the number of results; if count is > 0, then those are the quick picks since status is zero.  DB plan is to have a status defined as zero 0 available and one 1 as booked.  If it is booked (i.e. 1) then the spot also resides in the reservation table.  This initial query serves as a quick look of what is not in the reservation table.
    	return $openSpaces; 
    }
    // If count from the openSpaces query is zero, then a query of the reservation table is required.
    public function searchReservations($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime){
    	$reservedSpaces = Reservation::where('area_id', $requestedArea)
    					->where('departureDateTime','<', $requestedArrivalDateTime)
    					->where('arrivalDateTime', '>', $requestedDepartureDateTime)
    					->take(5)
    					->order_by('cost', 'asc')
    					->get();

    // count the number of results

    	return $reservedSpaces; 	
    }

    // If count from reservations query is zero, then there are no spaces that meet the user's criteria
    // We will then need to provide them a message of something to the fact of "sorry no match" and possibly a redirect to try their request again with different dates and or time.
    // 
    // If count from reservation query is greater than zero, return the results view and allow a user to select a space.

    // Now figure out the whole solution
    public function solution(){
    	// Take in requested area, dates/times


    	// call function searchOpenSpaces


    	// get results of open spaces and count returned spaces

    	// if returned spaces equals zero call the function searchReservations


    	// get results of reservations query and count them.  If query result is zero, send the user a message - sorry, there are no space that meet your criteria.  Please return to the reservation make to change your search criteria.


    	// If reservation query is > zero, list results in a table for the user to review.  Pick only 5 and allow the user to pick only one choice to make a reservation.


    	// upon click - route the user to a pay view.

    	// upon confirmation call the ReservationController@store method to save the reservation to the database.



    	// if the user wants to edit their reservation, get the reservation by id, have the user make changes, run another reservation table query based on the new data.  The results and methods are the same as the creation of a new reservation except call the ReservationController@update methoc.

    	return View::make('search');
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
			return View::make('reservation')->with(array('user'=> Auth::user()));
		}
		return View::make('reservation');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		$reservation = new Reservation;
		return View::make('reservation')->with(['user' => $user]);
		/// PLACEHOLDER -- MIGHT NEED TO ADD/PASS OTHER TABLE INFO !!!!!!!!!!!!!!!!!!!!!!!!
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// create the validator
    	$validator = Validator::make(Input::all(), Reservation::$rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not create a reservation request - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {
        	// validation succeeded, create and save the post

    		$reservation = new Reservation();
    		
			$reservation->arrival_date = Input::get('arrival_date');
			$reservation->arrival_time = Input::get('arrival_time');
			$reservation->departure_date = Input::get('departure_date');
			$reservation->departure_time = Input::get('departure_time');
			
			// example
			$reservation->save();
			Session::flash('successMessage', 'Reservation created successfully');
			return Redirect::action('HomeController@showConfirmation');
			
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
		$reservation = Reservation::findOrFail($id);
		return View::make('reservation')->with('user', $user);
		///////////////////////////////////////////////////////////////// NOT PERFECT YET NEED OTHER TABLE DATA
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reservation = Reservation::findOrFail($id);
		return View::make('reservation')->with('user', $user);
		///////////////////////////////////////////////////////////////// NOT PERFECT YET NEED OTHER TABLE DATA
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reservation = Reservation::findOrFail($id);
	
		// create the validator
    	$validator = Validator::make(Input::all(), Reservation::$rules);

    	// attempt validation
    	if ($validator->fails()){
        	// validation failed, redirect to the post create page with validation errors and old inputs
    		Session::flash('errorMessage', 'Could not update reservation - see form errors');
    		return Redirect::back()->withInput()->withErrors($validator);
    	} else {

        	// validation succeeded, create and save the post
    		$reservation->arrival_date = Input::get('arrival_date');
			$reservation->arrival_time = Input::get('arrival_time');
			$reservation->departure_date = Input::get('departure_date');
			$reservation->departure_time = Input::get('departure_time');
			
			// example
			$reservation->save();
			Session::flash('successMessage', 'Reservation updated successfully');
			return Redirect::action('HomeController@showConfirmation');
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
		$reservation = Reservation::findOrFail($id);
		$reservation->delete();

		return Redirect::action('RegisterController@index');
	}

}