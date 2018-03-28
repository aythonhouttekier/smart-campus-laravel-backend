<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\devices;

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
            $devices = new devices;

             $devices->device_name         = $request->input('device_name');
              $devices->location_id        = 1;

              $devices->save();
            //$data = ['device_name' => $request->input('device_name'), 'location_id' => 1];
            //return devices::create($data);
        } else {
            echo "Wrong format to store";
        }    
    }
}
