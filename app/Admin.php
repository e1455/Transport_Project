<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	protected $table = 'users';

    protected $fillable = [
        'name',
        'family',
        'email',
        'role_id',
        'national_code',
        'password'
    ];



}
