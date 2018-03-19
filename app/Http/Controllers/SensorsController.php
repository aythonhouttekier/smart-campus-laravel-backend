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
            return sensors::create($request->all());
        } else {
            echo "Wrong format to store";
        }
        
    }
}
