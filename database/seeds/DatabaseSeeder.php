<?php

use App\Role;
use App\Service;
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

//		Role::create(['name' => 'Manager']);
//		Role::create(['name' => 'Employee']);
//		Role::create(['name' => 'Customer']);
//
//
//		Vehicle::create(['name' => 'Truck']);
//		Vehicle::create(['name' => 'Motorcycle']);
//		Vehicle::create(['name' => 'Pickup']);
//		Vehicle::create(['name' => 'Car']);


		Service::create([
			'user_id'=>5,
			'customer_info'=>'ali rostami',
			'date_service'=>'2016-06-19',
			'start_service'=>'10:10:00',
			'end_service'=>'11:30:00',
			'score'=>'60',
			'distance'=>'3'
		]);

		Service::create([
			'user_id'=>5,
			'customer_info'=>'ahmad hosseni',
			'date_service'=>'2016-06-19',
			'start_service'=>'13:37:00',
			'end_service'=>'15:21:00',
			'score'=>'73',
			'distance'=>'10.5'
		]);

		Service::create([
			'user_id'=>5,
			'customer_info'=>'mohsen hatami',
			'date_service'=>'2016-06-19',
			'start_service'=>'17:05:00',
			'end_service'=>'19:18:00',
			'score'=>'93',
			'distance'=>'5.21'
		]);


////////////////////////
		Service::create([
			'user_id'=>5,
			'customer_info'=>'mohmad rashti',
			'date_service'=>'2016-05-23',
			'start_service'=>'11:52:00',
			'end_service'=>'14:13:00',
			'score'=>'62',
			'distance'=>'8'
		]);

		Service::create([
			'user_id'=>5,
			'customer_info'=>'hashem lotfi',
			'date_service'=>'2016-05-23',
			'start_service'=>'15:26:00',
			'end_service'=>'18:42:00',
			'score'=>'81',
			'distance'=>'10.5'
		]);


////////////////////////
		Service::create([
			'user_id'=>5,
			'customer_info'=>'kamran maleki',
			'date_service'=>'2016-03-09',
			'start_service'=>'09:38:00',
			'end_service'=>'10:42:00',
			'score'=>'74',
			'distance'=>'3'
		]);


		Service::create([
			'user_id'=>5,
			'customer_info'=>'ghasem torkashvand',
			'date_service'=>'2016-03-09',
			'start_service'=>'11:31:00',
			'end_service'=>'13:16:00',
			'score'=>'31',
			'distance'=>'6'
		]);

		Service::create([
			'user_id'=>5,
			'customer_info'=>'parvin shayeshteh',
			'date_service'=>'2016-03-09',
			'start_service'=>'14:54:00',
			'end_service'=>'16:24:00',
			'score'=>'67',
			'distance'=>'4.6'
		]);
		//////////////////////////
		Service::create([
			'user_id'=>5,
			'customer_info'=>'mahdi varesteh',
			'date_service'=>'2016-03-17',
			'start_service'=>'10:54:00',
			'end_service'=>'14:24:00',
			'score'=>'87',
			'distance'=>'9'
		]);

		Service::create([
			'user_id'=>5,
			'customer_info'=>'milad oskomi',
			'date_service'=>'2016-03-17',
			'start_service'=>'13:34:00',
			'end_service'=>'17:30:00',
			'score'=>'67',
			'distance'=>'4.6'
		]);
	//////////////////////////
		// $this->call('UserTableSeeder');
	}

}
