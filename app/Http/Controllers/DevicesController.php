<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function index()
    {
        return devices::all();
    }
 
    public function show($id)
    {
        return devices::find($id);
    }

    public function store(Request $request)
    {
        if ($request->has(['device_name'])) {
            return devices::create($request->all());
        } else {
            echo "Wrong format to store";
        }
        
    }
}
