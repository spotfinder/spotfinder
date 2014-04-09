<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('first_name', 50);
		    $table->string('last_name', 50);
		    $table->string('email', 200)->unique();
		    $table->string('password', 100);
		    $table->integer('role_id')->unsigned();
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
		Schema::drop('users');
	}

}
