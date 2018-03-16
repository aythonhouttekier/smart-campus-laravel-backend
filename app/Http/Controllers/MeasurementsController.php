<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\measurement as MeasurementsResource;
use App\measurements;

class MeasurementsController extends Controller
{
    public function index()
    {
        return measurements::all();
    }
 
    public function show($id)
    {
        return measurements::find($id);
    }

    public function store(Request $request)
    {
        return measurements::create($request->all());
    }
}
