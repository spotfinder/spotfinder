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
       if (Auth::check())
	   {
			$users = User::all();
			return View::make('admin')->with(array('users'=> $users));
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
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::findOrFail($id);
		$user->delete();
		return Redirect::action('AdminController@index');
	}
    
    public function addLot(){

    	$lot = new Lot();

    		$lot->lot_id = Input::get('lot_id');
			$lot->lot_name = Input::get('lot_name');
			$lot->area_id = Input::get('area_id');
			$lot->area_name = Input::get('area_name');
			$lot->street_address = Input::get('street_address');
			$lot->city = Input::get('city');
			$lot->zip = Input::get('zip');
			$lot->phone_number = Input::get('phone_number');
			$lot->capacity = Input::get('capacity');
			$lot->open_time = Input::get('open_time');
			$lot->close_time = Input::get('close_time');
			$lot->latitude = Input::get('latitude');
			$lot->longitude = Input::get('longitude');
			$lot->cost_per_hour = Input::get('cost_per_hour');
			$lot->save();

			Session::flash('successMessage', 'Lot added successfully');
			return Redirect::action('AdminController@index');
    }

}
