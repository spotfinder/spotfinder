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
		    $table->string('customer_number', 25);
		    $table->string('first_name', 50);
		    $table->string('last_name', 50);
		    $table->string('street_address', 100);
		    $table->string('city', 100);
		    $table->string('state', 100);
		    $table->string('zip', 25);
		    $table->string('phone_number', 35);
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
