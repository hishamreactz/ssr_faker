<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class MeasurementsTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	*
	* @return void
	 */
	public function run()
	{  

	     DB::table('measurements')->insert([

	                'screen_size'  => '15.6',
	                'created_at'   => Carbon::now()

	         ]);  

	}
}
