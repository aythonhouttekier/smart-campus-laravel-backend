<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $fillable = array('classroom');
    
    public function devices() {
        return $this->hasMany('devices');
    }

}
