<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalStatus extends Model
{
    public function rentalTransaction(){
    	return $this->hasOne('App\RentalTransaction');
    }
}
