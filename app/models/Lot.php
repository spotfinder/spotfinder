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
    	'area_id'        => 'required|max: 10',
    	'area_name'      => 'required|max: 50',
    	'street_address' => 'required|max: 100',
    	'phone_number'   => 'required', 
    	'capacity'       => 'required',
    	'cost_per_hour'  => 'required'

    );
}