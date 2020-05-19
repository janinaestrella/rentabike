<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use SoftDeletes;
    
    protected $fillable =['model_code', 'image', 'description', 'category_id', 'bikestatus_id'];

    public function category(){
    	return $this->belongsTo('App\Category', 'category_id')
        ->withTrashed(); //withTrashed para kahit softdeleted na ung category, lalabas pa rin ung category name sa product
    }
    
    public function bikeStatus(){
    	return $this->belongsTo('App\BikeStatus', 'bikestatus_id'); 
    }

    public function rentalTransactions()
    {
    	return $this->hasMany('App\RentalTransaction');
    }
    
    public function bikeImage(){
        $imagePath = 'https://rentabucket.s3.amazonaws.com/' .$this->image;    
        return $imagePath;
    }
}
