<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = ['name', 'manufacturer_id'];
    public function Manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }
}
