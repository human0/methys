<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ManufacturersTableSeeder extends Seeder
{ 
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            'Volkswagon' => ['Amarok','Caddy','California','Fox','Jetta','Lavida','Beetle','Passat','Polo','Routan','Santana','Touran'],
            'Toyota' => ['Aygo','Allion','Aurion','Auris','Avalon','Belta'],
        ];       
        foreach($manufacturers as $manufacturer => $types) 
        {
            DB::table('manufacturers')->insert([    
                'name' => $manufacturer
            ]);
            $manufacturer_id = DB::connection() -> getPdo() -> lastInsertId();
            foreach ($types as $type) 
            {
                DB::table('types')->insert([
                    'manufacturer_id' => $manufacturer_id,        
                    'name' => $type
                ]);
            }
        }   
    }
}
