<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'lastname' => "admin",
            'number' => "+27616172532"
        ]);

        for ($i = 0 ; $i<5; ++$i)
        {
        	DB::table('users')->insert([
            'name' => str_random(10),
            'lastname' => str_random(10),
            'number' => '+27'.str_random(8),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        	]);
        }
    }
}
