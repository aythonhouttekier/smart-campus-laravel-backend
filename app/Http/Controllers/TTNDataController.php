<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\measurements;
use App\sensors;
use App\locations;
use App\devices;

class TTNDataController extends Controller
{
  public function store(Request $request)
  {
  $sensor_types = ['temperature', 'humidity', 'movement'];
  $dev_eui = $request->input('dev-eui');
  $device = devices::where('dev-eui', $dev_eui)->firstOrFail(); // try catch(ModelNotFoundException)   
     
    foreach($sensor_types as $sensor_type){
      $value = $request->input($sensor_type);
    if($value){
      $sensor = sensors::where('name' , $sensor_type)->firstOrFail();
      $measurement = new measurements;
      $measurement->value        = $value;
      $measurement->sensor_id    = $sensor->id;
      $measurement->save();
      }
    }
  }
}
