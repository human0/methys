<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\manufacturer');
    }

    public function type()
    {
        return $this->belongsTo('App\type');
    }
}
