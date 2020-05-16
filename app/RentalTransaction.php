<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalTransaction extends Model
{
    protected $fillable =['code', 'pickup_date', 'return_date', 'user_id', 'rentstatus_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rentalStatus()
    {
    	return $this->belongsTo('App\RentalStatus', 'rentstatus_id');
    }

    public function bikes()
    {	
    	// ('model', 'pivot table')->withPivot('additional columns sa table')
    	return $this->belongsToMany('App\Bike', 'bike_rental_transactions')->withTimestamps();
    }
}

