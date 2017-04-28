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
	        for($j = 0; $j<5; ++$j)
    		{
    			DB::table('vehicles')->insert([
	    			'user_id' => rand(1,5),
            		'type_id' => rand(1,15),
            		'year' => rand(1,10),
           			'color' => str_random(10),
            		'mileage' => rand(1,10),
	        	]);
    		}
	    }
    }
}
