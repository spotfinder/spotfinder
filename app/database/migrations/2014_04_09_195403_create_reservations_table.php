<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('reservations', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('customer_number', 25);
		    $table->string('reservation_number', 25);
		    $table->string('license_plate_number', 25);
		    $table->integer('area_id')->unsigned();
		    $table->string('lot_name', 50);
		    $table->integer('space_number')->unsigned();
		    $table->string('street_address', 100);
		    $table->string('city', 100);
		    $table->string('state', 100);
		    $table->string('zip', 25);
		    $table->timestamp('arrival_date_time');
		    $table->timestamp('departure_date_time');
		   	$table->DOUBLE('duration_time');
		   	$table->DECIMAL('cost', 12, 2);
		   	$table->DECIMAL('total_cost', 12, 2);
		   	$table->timestamps();
		
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
		Schema::drop('reservations');
	}

}
