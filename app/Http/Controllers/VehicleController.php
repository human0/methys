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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(8);
        return view('home', ['vehicles'=>$vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = UserDetail::all()->pluck('number','id');
        $manufacturers = Manufacturer::all();
        return view('create_vehicle',['owners'=>$owners, 'manufacturers'=>$manufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_detail_id' => 'required|integer|exists:user_details,id', 
            'type_id' => 'required|integer|exists:types,id', 
            'year' => 'required|integer|min:4',
            'color' => 'required|string|min:4|max:7',
            'mileage' => 'required|integer',
        ]);
    
        $vehicle = Vehicle::create($request->except('_token'));
        
        return redirect('vehicle/' . $vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        $owners = UserDetail::all()->pluck('number','id');
        $manufacturers = Manufacturer::all();
        return view('edit_vehicle',['owners'=>$owners, 'manufacturers'=>$manufacturers, 'vehicle'=>$vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
        //
    }
}
