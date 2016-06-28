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
		Schema::create('role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
		});
		Schema::create('vehicle', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();;
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id',false,true);
			$table->string('name',100);
			$table->string('family',100);
			$table->string('national_code',15)->unique();
			$table->string('email',100)->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();

			$table->foreign('role_id')
				->references('id')->on('role')
				->onDelete('cascade');
		});

		Schema::create('employee', function(Blueprint $table)
		{
			$table->integer('user_id',false,true);
			$table->integer('vehicle_id',false,true);
			$table->string('plate_number');
			$table->time('start_service');
			$table->time('end_service');
			$table->decimal('wage_over_distance',8,2);


			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');

			$table->foreign('vehicle_id')
				->references('id')->on('vehicle')
				->onDelete('cascade');
		});





	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role');
		Schema::drop('vehicle');
		Schema::drop('users');
		Schema::drop('employee');
	}

}
