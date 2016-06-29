<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'service';

    protected $fillable = [
        'user_id',
        'customer_info',
        'date_service',
        'start_service',
        'end_service',
        'score',
        'distance',
        'payed'
    ];

    public $timestamps = false;


    public function setDateServiceAttribute ($value)
    {
        $this->attributes['date_service'] = date('Y-m-d',strtotime($value));
    }

    public function getCustomerInfoAttribute ($value)
    {
        return ucwords($value);
    }

    public function employee ()
    {
        return $this->belongsTo('App\Employee','user_id','user_id');
    }
    public function user ()
    {
        return $this->belongsTo('App\User','user_id','id');
    }





}
