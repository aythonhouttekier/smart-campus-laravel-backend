<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $fillable = array('name', 'description', 'roomnumber');
    
    public function devices() {
        return $this->hasMany('devices');
    }

}
