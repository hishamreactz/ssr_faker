<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProcessorsTableSeeder extends Seeder
{   
    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
       DB::table('processors')->insert([
       
                'name'           => 'A9-9420',
                'gen'            => '7th',
                'make'           => 'AMD',
                'created_at'     => Carbon::now()

         ]);          
    }
}
