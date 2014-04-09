<?php

class Lot extends Eloquent {

    protected $table = 'lots';

    // Relationship to the user (author) 
    
    public function spaces(){
    	return $this->hasMany('Space');
    }

}