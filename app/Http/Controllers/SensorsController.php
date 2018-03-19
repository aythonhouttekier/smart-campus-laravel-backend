<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index()
    {
        return sensors::all();
    }
 
    public function show($id)
    {
        return sensors::find($id);
    }

    public function store(Request $request)
    {
        if ($request->has(['sensor_name', 'measurement_unit'])) {
            $data = ['sensor_name' => $request->input('sensor_name'),
             'measurement_unit' => $request->input('measurement_unit'),'device_id' => 1];
            return devices::create($data);
        } else {
            echo "Wrong format to store";
        }
        
    }
}
