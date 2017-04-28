<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function Manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }
}
