<?php

class SpaceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('spaces')->delete();

        $space = new space();
        $space->area_id = 1;
        $space->lot_id = 'Park4U #2';
        $space->space_number = '42';
        $space->status = 1;
        $space->save();

    }
 
}

?>