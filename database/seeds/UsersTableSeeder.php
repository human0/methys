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
        DB::table('user_details')->insert([
            'firstname' => 'Emmanuel',
            'lastname' => 'Balogun',
            'number' => '+27616172532',
        ]);     

        DB::table('users')->insert([
            'user_detail_id' => DB::connection() -> getPdo() -> lastInsertId(),
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
        ]);  
    }
}
