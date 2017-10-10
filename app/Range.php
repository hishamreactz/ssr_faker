<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{

    protected $fillable = [
        'from', 'to'
    ];
    
    // public function products(){

    //     return $this->hasMany('App\Product');

    // }
}
