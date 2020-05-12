<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalTransaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rentalStatus()
    {
    	return $this->belongsTo('App\RentalStatus');
    }

    public function bikes()
    {	
    	// ('model', 'pivot table')->withPivot('additional columns sa table')
    	return $this->belongsToMany('App\Bike', 'bike_rental_transactions')
    		->withPivot('rent_qty')->withTimestamps();
    }
}

