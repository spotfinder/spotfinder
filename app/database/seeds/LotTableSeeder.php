<?php

class LotTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lots')->delete();

        $lot = new lot();
        $lot->lot_id = 'Park4U #2';
        $lot->area_id = 1;
        $lot->area_name = 'Downtown';
        $lot->lot_name = 'Park 4 U';
        $lot->street_address = '123 ABC';
        $lot->city = 'San Antonio';
        $lot->state = 'Texas';
        $lot->zip = '78236';
        $lot->phone_number = '(210) 123-4567';
        $lot->capacity = 50;
        $lot->cost_per_hour = 2;
        $lot->save();

    }

}

?>