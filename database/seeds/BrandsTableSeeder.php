<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BrandsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('brands')->insert([

       			 'name'        =>  'DELL',
             'created_at'  => Carbon::now()

       ]);
    }
}
