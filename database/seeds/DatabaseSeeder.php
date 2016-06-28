<?php

use App\Role;
use App\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		Role::create(['name' => 'Manager']);
		Role::create(['name' => 'Employee']);
		Role::create(['name' => 'Customer']);


		Vehicle::create(['name' => 'Truck']);
		Vehicle::create(['name' => 'Motorcycle']);
		Vehicle::create(['name' => 'Pickup']);
		Vehicle::create(['name' => 'Car']);

		// $this->call('UserTableSeeder');
	}

}
