<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Type;

class ManufacturerController extends Controller
{
 
    public function index()
    {
        return Manufacturer::all()->pluck('id','name');
    }

    public function show(manufacturer $manufacturer)
    {
        return $manufacturer->types->pluck('id','name');
    }
}
