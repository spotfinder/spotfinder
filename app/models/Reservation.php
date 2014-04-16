<?php

class Reservation extends Eloquent { 
    
    public function user() {
        return $this->belongsTo('User');
    }

    public function spaces() {
        return $this->belongsTo('Space');
    }

// Validation rules
    public static $rules = array(
    	'arrival_date_time' => 'required',
    	'departure_date_time' => 'required'
    			
	);

    public static function totalCount(){
        return $reservations = DB::table('reservations')->count();
    }

}