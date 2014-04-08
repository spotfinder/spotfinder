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
		    $table->date('created_at');
		    $table->time('time');
		    $table->integer('spot_number')->unsigned();
		    $table->integer('user_id')->unsigned();
		
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
