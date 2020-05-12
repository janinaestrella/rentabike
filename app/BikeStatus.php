<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeStatus extends Model
{
    public function bike(){
    	return $this->hasOne('App\Bike');
    }
}
