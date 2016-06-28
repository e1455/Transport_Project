<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

	protected $table = 'vehicle';


    protected $fillable = ['name'];

    public $timestamps = false;

}
