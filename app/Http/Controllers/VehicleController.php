<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Manufacturer;
use App\Type;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(8);
        return view('home', ['vehicles'=>$vehicles]);
    }

    public function create()
    {
        $owners = UserDetail::all()->pluck('number','id');
        $manufacturers = Manufacturer::all();
        return view('create_vehicle',['owners'=>$owners, 'manufacturers'=>$manufacturers]);
    }

    public function store(Request $request, vehicle $vehicle = null)
    {
        $this->validate($request, [
            'user_detail_id' => 'required|integer|exists:user_details,id', 
            'type_id' => 'required|integer|exists:types,id', 
            'year' => 'required|integer|min:4',
            'color' => 'required|string|min:4|max:7',
            'mileage' => 'required|integer',
        ]);
        
        if (empty($vehicle)){ 
            $vehicle = Vehicle::create($request->except('_token'));
        }
        else {
            $vehicle->update($request->except('_token')) ;
        }

        return view('show_vehicle',['vehicle'=>$vehicle]);
    }

    public function show(vehicle $vehicle)
    {
        return view('show_vehicle', ['vehicle'=>$vehicle]);
    }

    public function edit(vehicle $vehicle)
    {
        $owners = UserDetail::all()->pluck('number','id');
        $manufacturers = Manufacturer::all();
        return view('edit_vehicle',['owners'=>$owners, 'manufacturers'=>$manufacturers, 'vehicle'=>$vehicle]);
    }

    public function update(Request $request, vehicle $vehicle)
    {
        return $this->store($request, $vehicle);
    }

    public function destroy(vehicle $vehicle)
    {
        if (!empty($vehicle)){
            $vehicle->delete();
        }
        return redirect('vehicle'); 
    }
}
