<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes; //will not be deleted from DB.. sa user interface lang

    protected $fillable = ['name'];  //for mass assignment 

    public function bikes(){
    	return $this->hasMany('App\Bike'); //one to many relationship Category has many Products
    }
}
