<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bear;

class Picnic extends Model
{
    protected $fillable = array('name', 'taste_level');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // define a many to many relationship
    // also call the linking table
    public function bears()
     	{
      	  return $this->belongsToMany('App\Bear', 'bears_picnics', 'picnic_id', 'bear_id');
    	}
}
