<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = ['user_detail_id', 'type_id', 'year', 'color' , 'mileage'];

    public function user_detail()
    {
        return $this->belongsTo('App\UserDetail');
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
