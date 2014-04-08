<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLAZLotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('LAZ_lot', function($table)
		{
		    $table->increments('spot_number')->unsigned()->unique();
			$table->boolean('status');
			$table->integer('lot_id')->unsigned();
			$table->integer('reservation_id')->unsigned();
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
		Schema::drop('LAZ_lot');
	}

}
