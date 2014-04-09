<?php


class Space extends Eloquent {


    // Relationship to lots

    public function lot() {
    	return $this->belongsTo('Lot');
    } 

    public function reservation() {
    	return $this->hasMany('Reservations');
    } 
    

}