<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	protected  $table = 'employee';
	protected  $fillable = [
        'user_id',
        'vehicle_id',
        'plate_number',
        'start_service',
        'end_service',
        'wage_over_distance',
    ];


    public $timestamps = false;




}
