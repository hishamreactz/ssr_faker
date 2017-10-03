<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class EmployeesTableSeeder extends Seeder
{   
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

      DB::table('employees')->insert([
        
        		'name'        => 'Itmarkerz',
        		'email'       => 'Itmarkerz@gmail.com',
        		'password'    =>  bcrypt('secret'),
                'created_at'  => Carbon::now()

         ]);       
    }
}
