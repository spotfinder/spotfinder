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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    	// locate all potential spaces by determining that the user will
    	// arrive after the space should be empty
    	$spacesAvailAtArrivalTime = Reservation::where('area_id', '=', $requestedArea)
    					->where('departureDateTime','<=', $requestedArrivalDateTime)
    					->lists('space_number');
var_dump($spacesAvailAtArrivalTime);
    	if (sizeof($spacesAvailAtArrivalTime) > 1){

    		$spacesAvailBeforeTakenAgain = Reservation::where('area_id', '=', $requestedArea)
    					->where('arrivalDateTime','>=', $requestedDepartureDateTime)
    					->lists('space_number', 'lot_name');

    		// $spacesAvailCost = Reservation::where('area_id', '=', $requestedArea)
    		// 			->where('arrivalDateTime','>=', $requestedDepartureDateTime)
    		// 			->lists('cost', 'cost');

print_r($spacesAvailBeforeTakenAgain);
var_dump($spacesAvailBeforeTakenAgain);


    		foreach ($spacesAvailBeforeTakenAgain as $key => $value) {
    			$results = array();

	    		if (in_array( $value, $spacesAvailAtArrivalTime)){

	    			$foundSlot = $spacesAvailBeforeTakenAgain[$key];

	    			array_push($results, $foundSlot);
var_dump($results);
	    		}
    		}
    	}				
    	return $results; 	

$array1 = array("make","model","color","year");
$array2 = array("Jeep","Liberty","Black","2005");
$newArray = array_combine($array1, $array2);

array($requestedArea, $lot_name, $foundSlot); 
    	


    }

    // Now figure out the whole solution ----------------------------------------
    public function solution() {
    	
    	// Take in requested area, dates/times
    	$requestedArea = Input::get('area');
    	$requestedArrivalDateTime = Input::get('arrival_date_time');
    	$requestedDepartureDateTime = Input::get('departure_date_time');
    	// calculate the total parking duration (divide by 3600 to get hours format)

    	if ($requestedArrivalDateTime > $requestedDepartureDateTime){
    		Session::flash('errorMessage', "Arrival date and time must be before the selected departure time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}
    	// condition the date and time so as not to change the variable assignment
    	date_default_timezone_set('America/Chicago');
    	$currentDateTime = strtotime(date('m/d/Y h:i:s a', time()));
    	$arrivalTime = strtotime($requestedArrivalDateTime);

    	if ($arrivalTime < $currentDateTime){
    		Session::flash('errorMessage', "Arrival date and time must be after the current date and time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}

    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;
    	// call function searchOpenSpaces to find spaces with a status of 0 ('open')
    	$resultsOfOpenSpaces = $this->searchOpenSpaces($requestedArea);

		// if open spaces are found
		if (sizeof($resultsOfOpenSpaces) > 0){
			Session::flash('successMessage', 'We found some options for you.');
			// the results of the reservation search ($reservedSpaces) should be passed to the results (aka search) view
			return Redirect::action('HomeController@results');

		} else if (sizeof($resultsOfOpenSpaces) == 0) {
			// query reservation table for parking spaces in the desired area where requested arrival time is after any already booked departure space times and where the desired departure time is before any already booked arrival times. 
			$reservedSpaces = $this->searchReservations($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime);

    		// get results of reservations query and count them.  If query result is zero, send the user a message - sorry, there are no space that meet your criteria.  Please return to the reservation make to change your search criteria.
    		if (sizeof($reservedSpaces) == 0){
    			Session::flash('errorMessage', 'No available parking spaces matched your search criteria.  Please amend your search and try again.');
				return Redirect::action('HomeController@showReservation')->withInput();
			}
    	} else {

    		// If reservation query is > zero, list results in a table for the user to review.  Pick only 5 and allow the user to pick only one choice to make a reservation.
			Session::flash('successMessage', 'We found some options for you.');
				// the results of the reservation search ($reservedSpaces) should be passed to the results (aka search) view
				return Redirect::action('HomeController@results');

		}

// DEVELOPMENT TEAM NOTES
    	// upon click / SELECTION FROM THE 'SEARCH' VIEW - route the user to a pay view.

    	// upon confirmation AND PAYMENT call the ReservationController@store method to save the reservation to the database.

    	// if the user wants to edit their reservation, get the reservation by id, have the user make changes, run another reservation table query based on the new data.  The results and methods are the same as the creation of a new reservation except call the ReservationController@update methoc.

    	return View::make('search');
    } //THIS IS THE END OF THE PUBLIC SOLUTION FUNCTION

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