<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class ProductsTableSeeder extends Seeder
{   
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     DB::table('products')->insert([

        'name'           => 'Inspiron 3520',
        'image'          => 'inspiron3520.jpg',
        'price'          =>  192.50,
        'brand_id'          =>  1,
        'processor_type' =>  1,
        'screen_size'    =>  1,
        'touch_screen'   =>  0,
        'availability'   =>  1,
        'created_at'     => Carbon::now()

        ]); 

    }
}
