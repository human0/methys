<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function types()
    {
        return $this->hasMany('App\Type');
    }
}
