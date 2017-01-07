<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
   protected $fillable = array('weight', 'bear_id');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'fish';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function bear() 
    	{
       	 	return $this->belongsTo('Bear');
    	}
}
