<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensors extends Model
{
    protected $fillable = array('name', 'measurement_unit', 'devices_id');
    
    public function measurements() {
        return $this->hasMany(measurements::class, 'sensor_id');
    }

    public function devices() {
        return $this->hasOne(sensors::class, 'devices_id');
    }
}
