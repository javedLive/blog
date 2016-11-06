<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
     protected $fillable = array('type', 'age', 'bear_id');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function bear()
    	 {
       		 return $this->belongsTo('Bear');
   		 }
}
