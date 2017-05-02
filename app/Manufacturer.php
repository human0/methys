<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
	protected $fillable = ['name'];
    public function types()
    {
        return $this->hasMany('App\Type');
    }
}
