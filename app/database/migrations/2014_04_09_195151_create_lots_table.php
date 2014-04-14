<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('lots', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('lot_id', 25);
		    $table->integer('area_id')->unsigned();
		    $table->string('area_name', 50);
		    $table->string('lot_name', 50);
		    $table->string('street_address', 100);
		    $table->string('city', 100);
		    $table->string('state', 100);
		    $table->string('zip', 25);
		    $table->string('phone_number', 35);
		    $table->integer('capacity');
		    $table->time('open_time');
		    $table->time('close_time');
		    $table->DECIMAL('latitude', 10, 8);
		    $table->DECIMAL('longitude', 10, 8);
		    $table->DECIMAL('cost_per_hour', 4, 2);
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('lots');
	}

}
