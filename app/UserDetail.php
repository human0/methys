<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $fillable = ['firstname', 'lastname', 'number'];

    public function user()
    {
    	return $this->hasOne('App\User', 'user_detail_id');
    }
    
    public function Vehicles()
    {
        return $this->hasMany('App\Vehicle', 'user_detail_id');
    }
}
