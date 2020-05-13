<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable =['name', 'image', 'stock', 'description', 'category_id', 'bikestatus_id'];

    public function rentalTransactions()
    {
    	return $this->hasMany('App\RentalTransaction');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
        // ->withTrashed(); //withTrashed para kahit softdeleted na ung category, lalabas pa rin ung category name sa product
    }

    public function bikeStatus(){
    	return $this->belongsTo('App\BikeStatus'); 
    }
}
