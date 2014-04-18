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
    public function searchOpenSpaces($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime, $licensePlate){

    	$resultsOfOpenSpaces = DB::table('spaces')
    						->join('lots', 'spaces.lot_id', '=', 'lots.lot_id')
    						->select('lots.area_name', 'spaces.area_id', 'lots.lot_name', 'spaces.space_number', 'lots.street_address', 'lots.cost_per_hour', 'spaces.lot_id')
    						->where('spaces.area_id', $requestedArea)
    						->where('spaces.status','=', 0)
    						->take(5)
    						->get();
    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;

    	foreach ($resultsOfOpenSpaces as &$value){
    			$value->cost = $value->cost_per_hour;
    			$value->total_cost = ($duration * $value->cost_per_hour);
    			$value->duration = $duration;
    			$value->arrival = $requestedArrivalDateTime;
    			$value->departure = $requestedDepartureDateTime;
    			$value->area_id = $requestedArea;
    			$value->license_plate_number = $licensePlate;
    	}					

    	return $resultsOfOpenSpaces; 			
    }

    // If count from the openSpaces query is zero, then a query of the reservation table will be required.
    public function searchReservations($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime, $licensePlate){
    	// locate all potential spaces by determining that the user will arrive after the space should be empty
    	$resultsOfReservationQuery = DB::table('reservations')
    				->join('lots', 'reservations.area_id', '=', 'lots.area_id')
    				->select('lots.area_name', 'reservations.lot_name', 'reservations.space_number', 'lots.lot_id', 'lots.street_address', 'lots.cost_per_hour')
					->where('reservations.area_id', '=', $requestedArea)
					->where('arrival_date_time', '>', $requestedDepartureDateTime) //
					->where('departure_date_time', '<', $requestedArrivalDateTime) //
    				->whereNotBetween('arrival_date_time', array($requestedArrivalDateTime, $requestedDepartureDateTime))
    				->whereNotBetween('departure_date_time', array($requestedArrivalDateTime, $requestedDepartureDateTime))
    				->get();

    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;

    	foreach ($resultsOfReservationQuery as &$value){
    			$value->cost = $value->cost_per_hour;
    			$value->total_cost = ($duration * $value->cost);
    			$value->duration = $duration;
    			$value->arrival = $requestedArrivalDateTime;
    			$value->departure = $requestedDepartureDateTime;
    			$value->area_id = $requestedArea;
    			$value->license_plate_number = $licensePlate;
    	}
    				
    	return $resultsOfReservationQuery; 	
    }				

    // Now figure out the whole solution ----------------------------------------
    public function solution() {
    	
    	// Take in requested area, dates/times
    	$requestedArea = intval(Input::get('area'));
    	$requestedArrivalDateTime = Input::get('arrival_date_time');
    	$requestedDepartureDateTime = Input::get('departure_date_time');
    	$licensePlate = Input::get('license_plate_number');


    	if (strtotime($requestedArrivalDateTime) > strtotime($requestedDepartureDateTime)){
    		Session::flash('errorMessage', "Arrival date and time must be before the selected departure time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}

    	// Condition the date and time so as not to change the variable assignment
    	// NOTE THAT THE DEFAULT UTC IS SET TO - date_default_timezone_set('America/Chicago'); FOR THE DEMO VERSION
    	$currentDateTime = strtotime(date('m/d/Y h:i:s a', time()));
    	$arrivalTime = strtotime($requestedArrivalDateTime);

    	if ($arrivalTime <= $currentDateTime){
    		Session::flash('errorMessage', "Arrival date and time must be after the current date and time.  Please try again.");
			return Redirect::action('HomeController@showReservation')->withInput();
    	}

    	// calculate the total parking duration (divide by 3600 to get hours format)
    	$duration = (strtotime($requestedDepartureDateTime) - strtotime($requestedArrivalDateTime))/3600;
    	
    	// call function searchOpenSpaces to find spaces with a status of 0 ('open')
    	$resultsOfOpenSpaces = $this->searchOpenSpaces($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime, $licensePlate);

		// if open spaces are found
		if (sizeof($resultsOfOpenSpaces) > 0){

			Session::flash('successMessage', 'We found some options for you.');
			// The results of the reservation search ($reservedSpaces) should be passed to the results (aka search) view
			$results = $resultsOfOpenSpaces;

			Session::put('results', $results);
			return View::make('search')->with('results', $results);

		} else if (sizeof($resultsOfOpenSpaces) == 0) {

			$checkIfAnyReservationsExists = DB::table('reservations')
    				->join('lots', 'reservations.area_id', '=', 'lots.area_id')
    				->select('lots.area_name', 'reservations.lot_name', 'reservations.space_number', 'lots.lot_id', 'lots.street_address', 'lots.cost_per_hour')
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
					$result->cost = $result->cost_per_hour;
    				$result->total_cost = ($duration * $result->cost_per_hour);
    				$result->duration = $duration;
    				$result->arrival = $requestedArrivalDateTime;
    				$result->departure = $requestedDepartureDateTime;
    				$result->area_id = $requestedArea; 
    				$result->license_plate_number = $licensePlate; 				
				}

				Session::put('results', $results);
				return View::make('search')->with('results', $results);
            }

			// Query the reservation table for parking spaces in the desired area where requested arrival time is after any already 
			// booked departure space times and where the desired departure time is before any already booked arrival times. 
			$reservedSpaces = $this->searchReservations($requestedArea, $requestedArrivalDateTime, $requestedDepartureDateTime);

    		// Get the results of reservations query and count them.  If query result is zero, send the user a message 
    		// sorry, there are no space that meet your criteria.  Please return to the reservation make to change your search criteria.
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
    } //THIS IS THE END OF THE PUBLIC SOLUTION FUNCTION ////////////////////////////////////////////////////////////////

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
		/// FOR FUTURE USE - Create a reservation but do not take payment right away. 
		/// Possible attach with chron to expire in 24 hours
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		///// FOR FUTURE USE - DEMO VERSTION TAKES USER STRAIGHT TO PAYMENT IN TEST MODE
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
	public function makePayment($index){
		$index = intval($index);

		$order = Session::get('results');
		$selection = $order[$index];

		$reservation = new Reservation();
		$reservation->customer_number = Auth::user()->id;
		// $reservation->reservation_number = $selection->XXXXXXXXXX; ///// ADD RANDOM GENERATION TO BEGINNING
    	$reservation->license_plate_number = $selection->license_plate_number;
    	/////////////////////////////////////////////////////////////////////////////////////
    	
    	$reservation->area_id = $selection->area_id;
    	$reservation->lot_name = $selection->lot_name;
    	$reservation->space_number = $selection->space_number;
    	$reservation->street_address = $selection->street_address;
    	// $reservation->city = ;
    	// $reservation->state = ;
    	// $reservation->zip = ; 
    	
    	$reservation->arrival_date_time = $selection->arrival;
    	$reservation->departure_date_time = $selection->departure;
    	$reservation->duration_time = (strtotime($selection->departure) - strtotime($selection->arrival))/3600; 	// THIS LINE CREATES AN ERROR IF UNCOMMENTED


    	$reservation->cost = $selection->cost_per_hour;

    	$reservation->total_cost = $selection->total_cost;
    	// Check if space still exists prior to saving 
    	//////////// CAN ONLY TEST ON SERVER /////////////////////////////////////
    	$checkIfReservationExists = DB::table('reservations')
    				->join('lots', 'reservations.area_id', '=', 'lots.area_id')
    				->select('lots.area_name', 'reservations.lot_name', 'reservations.space_number', 'lots.lot_id', 'lots.street_address', 'lots.cost_per_hour')
					->where('reservations.area_id', '=', $reservation->area_id)
					->where('reservations.arrival_date_time', $reservation->arrival_date_time)
					->where('reservations.departure_date_time', $reservation->departure_date_time)
					->where('reservations.space_number', $reservation->space_number)
					->where('lots.lot_name', $reservation->lot_name)
            		->get();

        
        if (!empty($checkIfReservationExists)){
            	Session::flash('errorMessage', 'This spot has already been reserved during this process.  Please try again.');	
            	return Redirect::action('HomeController@showReservation')->withInput();
        }
        ////////////////////////////////////////////////////////////////////// END OF CHECK

		$reservation->save();

		// Turned space status to NOT AVAILABLE
		DB::table('spaces')
            	->where('lot_id', $selection->lot_id)
            	->where('space_number', $reservation->space_number)
            	->update(array('status' => 1));

        
		// Session::flush();
        Session::flash('successMessage', 'Reservation created sucessfully.');
		return View::make('thankyou');
	}

	/**
	 * Display the specified resource.
	 *
	 */
	// public function pending()  ////////////////////////// code to add a pending status
	// search view will direct here and this will then direct to HomeController@showConfirmation
	// NEED TO ADD METHOD TO TURN STATUS BACK TO ANOTHER STATUS IF NOT RESERVED
	// {	
	// 	$index = intval(Input::get('pick_me'));
	// 	$order = Session::get('results');
		
	// 	$selection = $order[$index];

	// 	DB::table('spaces')
 //            	->where('lot_id', $selection->lot_id)
 //            	->where('space_number', $selection->space_number)
 //            	->update(array('status' => 3));

	// 	return Redirect::action('HomeController@showConfirmation');
	// 	////////// FOR FUTURE USE
	// }
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
		////////// NOT PERFECT YET NEED OTHER TABLE DATA
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
		//////////// FOR FUTURE USE
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
			
			$reservation->save();
			Session::flash('successMessage', 'Reservation updated successfully');
			return View::make('HomeController@showConfirmation');
			
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