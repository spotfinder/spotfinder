<?php



class Reservation extends Eloquent { 
    
    public function user() {
        return $this->belongsTo('User');
    }

    public function spaces() {
        return $this->belongsTo('Space');
    }


}