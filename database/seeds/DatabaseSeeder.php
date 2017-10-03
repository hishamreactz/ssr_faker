<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandsTableSeeder::class);
        $this->call(MeasurementsTableSeeder::class);
     	$this->call(ProcessorsTableSeeder::class);
     	$this->call(ProductsTableSeeder::class);
     	$this->call(RangesTableSeeder::class);
     	$this->call(EmployeesTableSeeder::class);
           
    }
}
