<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spaces', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('area_id')->unsigned();
			$table->integer('lot_id')->unsigned();
			$table->integer('space_number')->unsigned();
			$table->tinyInteger('status')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('spaces');
	}

}
