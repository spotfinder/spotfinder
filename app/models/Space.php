<?php


class Space extends Eloquent {


    // Relationship to lots

    public function lot() {
    	return $this->belongsTo('Lot');
    } 

    public function reservation() {
    	return $this->hasMany('Reservations');
    } 
    
    public static function totalCount(){
        return $spaces = DB::table('spaces')->count();
    }
}