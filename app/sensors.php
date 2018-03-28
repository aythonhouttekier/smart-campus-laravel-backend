<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensors extends Model
{
    protected $fillable = array('name', 'measurement_unit', 'device_id');
    
    public function measurements() {
        return $this->hasMany('measurements');
    }

    public function devices() {
        return $this->hasOne('devices');
    }
}
