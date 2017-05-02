<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Type;

class TypeController extends Controller
{
 
    public function index()
    {
        return Type::all()->pluck('id','name');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer_name' => 'required|string|max:255',
            'type_name' => 'required|string|max:255|unique:types,name',
        ]);
        
        $name = $request['manufacturer_name'];
        $manufacturer = Manufacturer::firstOrCreate(['name' => $name]);
        $type = Type::create(['name' => $request['type_name'], 'manufacturer_id'=>$manufacturer->id]);

        return redirect('vehicle/create');
    }
}
