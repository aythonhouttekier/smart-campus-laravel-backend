<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensors extends Model
{
    protected $fillable = array('sensor_name', 'measurement_unit');
    
    public function measurements() {
        return $this->hasMany('measurements');
    }

    public function devices() {
        return $this->hasOne('devices');
    }
}
