<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devices extends Model
{
    // dev-eui 16char string example: 00E4F052209EE8A5
    protected $fillable = array('name', 'dev-eui', 'location_id');
    
    public function sensors() {
        return $this->hasMany('sensors');
    }

    public function locations() {
        return $this->hasOne('locations');
    }
    
}
