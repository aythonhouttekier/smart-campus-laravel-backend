<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurements extends Model
{
    protected $fillable = ['value', 'sensor_id'];
    
    public function sensors() {
        return $this->hasOne('sensors');
    }
}
