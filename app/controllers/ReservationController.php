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

	// Query for open spaces from the Spaces Table for the requested area
    public function searchOpenSpaces($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime){

    	$resultsOfOpenSpaces = DB::table('spaces')
    						->join('lots', 'spaces.area_id', '=', 'lots.area_id')
    						->select('lots.area_name', 'spaces.area_id', 'lots.lot_name', 'spaces.space_number', 'lots.cost_per_hour')
    						->where('status','=', 0)
    						->take(5)
    						->get();
    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;

    	foreach ($resultsOfOpenSpaces as &$value){
    			$value->total_cost = ($duration * $value->cost_per_hour);
    			$value->duration = $duration;
    			$value->arrival = $requestedArrivalDateTime;
    			$value->departure = $requestedDepartureDateTime;
    	}					

    	return $resultsOfOpenSpaces; 			
    }

    // If count from the openSpaces query is zero, then a query of the reservation table will be required.
    public function searchReservations($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime){
    	// locate all potential spaces by determining that the user will arrive after the space should be empty
    	$resultsOfReservationQuery = DB::table('reservations')
    				->join('lots', 'reservations.area_id', '=', 'lots.area_id')
    				->select('lots.area_name', 'reservations.lot_name', 'reservations.space_number', 'lots.id', 'lots.street_address', 'lots.cost_per_hour')
					->where('reservations.area_id', '=', $requestedArea)
					->where('arrival_date_time', '>', $requestedDepartureDateTime) //
					->where('departure_date_time', '<', $requestedArrivalDateTime) //
    				->whereNotBetween('arrival_date_time', array($requestedArrivalDateTime, $requestedDepartureDateTime))
    				->whereNotBetween('departure_date_time', array($requestedArrivalDateTime, $requestedDepartureDateTime))
    				->get();

    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;

    	foreach ($resultsOfReservationQuery as &$value){
    			$value->total_cost = ($duration * $value->cost);
    			$value->duration = $duration;
    			$value->arrival = $requestedArrivalDateTime;
    			$value->departure = $requestedDepartureDateTime;
    	}
    				
    	return $resultsOfReservationQuery; 	
    }				

    // Now figure out the whole solution ----------------------------------------
    public function solution() {
    	
    	// Take in requested area, dates/times
    	$requestedArea = Input::get('area');
    	$requestedArrivalDateTime = Input::get('arrival_date_time');
    	$requestedDepartureDateTime = Input::get('departure_date_time');

    	if (strtotime($requestedArrivalDateTime) > strtotime($requestedDepartureDateTime)){
    		Session::flash('errorMessage', "Arrival date and time must be before the selected departure time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}

    	// condition the date and time so as not to change the variable assignment
    	// NOTE THAT THE DEFAULT UTC IS SET TO - date_default_timezone_set('America/Chicago');
    	$currentDateTime = strtotime(date('m/d/Y h:i:s a', time()));
    	$arrivalTime = strtotime($requestedArrivalDateTime);

    	if ($arrivalTime <= $currentDateTime){
    		Session::flash('errorMessage', "Arrival date and time must be after the current date and time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}

    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;
    	// call function searchOpenSpaces to find spaces with a status of 0 ('open')
    	$resultsOfOpenSpaces = $this->searchOpenSpaces($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime);

		// if open spaces are found
		if (sizeof($resultsOfOpenSpaces) > 0){

			Session::flash('successMessage', 'We found some options for you.');
			// the results of the reservation search ($reservedSpaces) should be passed to the results (aka search) view
			$results = $resultsOfOpenSpaces;

			Session::put('results', $results);
			return View::make('search')->with('results', $results);

		} else if (sizeof($resultsOfOpenSpaces) == 0) {

			$checkIfAnyReservationsExists = DB::table('reservations')
    				->join('lots', 'reservations.area_id', '=', 'lots.area_id')
    				->select('lots.area_name', 'reservations.lot_name', 'reservations.space_number', 'lots.id', 'lots.street_address', 'lots.cost_per_hour')
					->where('reservations.area_id', '=', $requestedArea)
					->where('departure_date_time', '>', $currentDateTime)
            		->get();

            if (empty($checkIfAnyReservationsExists)){
            	Session::flash('successMessage', 'Here are your options.');	

				$results = DB::table('lots')
    				->join('spaces', 'lots.id', '=', 'spaces.lot_id')
    				->select('lots.area_name', 'lots.lot_name', 'spaces.space_number', 'lots.lot_id', 'lots.street_address', 'lots.cost_per_hour')
					->where('lots.area_id', '=', $requestedArea)
					->get();

				foreach ($results as &$result){
    				$result->total_cost = ($duration * $result->cost_per_hour);
    				$result->duration = $duration;
    				$result->arrival = $requestedArrivalDateTime;
    				$result->departure = $requestedDepartureDateTime;  				
				}

				Session::put('results', $results);
				return View::make('search')->with('results', $results);
            }

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
				$results = $resultsOfReservationQuery;
				Session::put('results', $results);
				return View::make('search')->with('results', $results);
		}

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
		return View::make('reservation');
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
    		
			$reservation->arrival_date_time = Input::get('arrival_date_time');
			$reservation->departure_date_time = Input::get('departure_date_time');
			

			DB::table('spaces')
            	->where('lot_id', XXXXXX)
            	->where('space_number', XXXX)
            	->update(array('status' => 1));
			
			$reservation->save();
			Session::flash('successMessage', 'Reservation created successfully');
			return View::make('HomeController@showConfirmation');
			
		}	
	}
	/**
	 * Collect Payment.
	 */
	public function makePayment(){


		return View::make('thankyou');
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
		return View::make('reservation');
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
		return View::make('reservation');
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
    		$reservation->arrival_date_time = Input::get('arrival_date_time');
			
			$reservation->departure_date_time = Input::get('departure_date_time');
			
			
			// example
			$reservation->save();
			Session::flash('successMessage', 'Reservation updated successfully');
			return View::make('HomeController@showConfirmation');
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