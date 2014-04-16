<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToSpacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('spaces', function(Blueprint $table)
		{
			//
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
		Schema::table('spaces', function(Blueprint $table)
		{
			//
			$table->dropColumn('updated_at');
			$table->dropColumn('created_at');
		});
	}

}
