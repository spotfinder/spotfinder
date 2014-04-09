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
		    $table->string('lot_name', 50);
		    $table->string('street_address', 50);
		    $table->integer('capacity');
		    $table->float('lat');
		    $table->float('long');
		    $table->float('cost');
		    $table->integer('area_id')->unsigned();
		    $table->string('area_name', 50);
		
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
