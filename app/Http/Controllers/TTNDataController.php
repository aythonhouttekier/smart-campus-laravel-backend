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
       //$temperature = ['value' => $request->input('temperature') ,'sensor_id' => 1];
      // $humidity = ['value' => $request->input('humidity') ,'sensor_id' => 1];
     //  $movement = ['value' => $request->input('movement') ,'sensor_id' => 1];

   //  $sensor_types = ['temperature', 'humidity', 'movement'];

   //  $dev_eui = $request->input('dev-eui');
  //   $device = Device::where('dev-eui' == $dev_eui)->firstOrFail();      // try catch(ModelNotFoundException)
     
   //  foreach($sensor_type as $sensor_types){
     //    $value = $request->input($sensor_type);
     //    if($value){
       //      $measurement = Measurement::create(['value' => $value]);
       //      $device->measurement()->associate($measurement);
      //   }
   //  }

      $measurement = new measurements;

       $measurement->value         = $request->input('temperature');
       $measurement->sensor_id        = 1;

       $measurement1 = new measurements;

       $measurement1->value         = $request->input('humidity');
       $measurement1->sensor_id        = 1;

       $measurement2 = new measurements;

       $measurement2->value         = $request->input('movement');
       $measurement2->sensor_id        = 1;

       $measurement->save();
       $measurement1->save();
       $measurement2->save();

       // return measurements::create($temperature) + measurements::create($humidity) + measurements::create($movement);



       //$data = ['value' => $request->input('value'), 'sensor_id' => 1];
      // return measurements::create($data);
    }
}
