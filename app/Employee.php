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
        'score'
    ];


    protected $primaryKey = 'user_id';

    public $timestamps = false;



    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

}
