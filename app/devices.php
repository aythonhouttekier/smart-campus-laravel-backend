<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devices extends Model
{
    protected $fillable = array('device_name');
    
    public function sensors() {
        return $this->hasMany('sensors');
    }

    public function locations() {
        return $this->hasOne('locations');
    }
    
}
