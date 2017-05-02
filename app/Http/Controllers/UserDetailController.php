<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use Illuminate\Support\Facades\Input;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserDetail::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'number' => 'required|integer|min:8|unique:user_details,number',
        ]);

        UserDetail::create($request->except('_token'));

        return redirect('vehicle/create');
    }
}
