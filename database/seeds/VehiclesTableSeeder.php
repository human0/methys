<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i<10; ++$i)
    	{
  			DB::table('vehicles')->insert([
	    			'user_detail_id' => 1,
            		'type_id' => rand(1,15),
            		'year' => rand(1970,2017),
           			'color' => '#'.rand(100, 999),
            		'mileage' => rand(1,10),
	        	]);
	    }
    }
}
