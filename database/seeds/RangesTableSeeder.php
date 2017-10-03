<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class RangesTableSeeder extends Seeder
{   
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('ranges')->insert([

                'from'          =>  00.00,
                'to'            =>  500.00,
                'created_at'    => Carbon::now()

             ]); 

    }
}
