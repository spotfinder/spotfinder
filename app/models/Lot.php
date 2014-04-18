<?php

class Lot extends Eloquent {

    protected $table = 'lots';

    // Relationship to the user (author) 
    
    public function spaces(){
    	return $this->hasMany('Space');
    }

    public static function totalCount(){
    	return $lots = DB::table('lots')->count();
    }
    
    public static $lot_rules = array(
    	'lot_id'         => 'required|unique:lots',
    	'lot_name'       => 'required|max: 50',
    	'area_id'        => 'required|min: 1',
    	'area_name'      => 'required|max: 50',
    	'street_address' => 'required|max: 100',
    	'phone_number'   => 'required|min: 10|max: 10', 
    	'capacity'       => 'required|min:value',
    	'open_time'      => 'required',
    	'close_time'     => 'required',
    	'cost_per_hour'  => array('match:/^[0-9]{1,3}(,[0-9]{3})*\.[0-9]+$/')

    );
}