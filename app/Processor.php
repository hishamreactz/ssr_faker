<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
       protected $fillable = [
        'name','gen','make'
    ];

        public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
