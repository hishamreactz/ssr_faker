<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
           protected $fillable = [
        'screen_size'
    ];

        public function products()
    {
        return $this->hasMany('App\Product');
    }
}
