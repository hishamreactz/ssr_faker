<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'image', 'price', 'brand_id', 'processor_type', 'screen_size', 'touch_screen', 'availability'
    ];

    public function brand(){

       return $this->belongsTo('App\Brand','brand_id');
       
    }

        public function screen_size(){

       return $this->belongsTo('App\Measurement','screen_size');
       
    }


        public function processor(){

       return $this->belongsTo('App\Processor','processor_type');
       
    }
}
