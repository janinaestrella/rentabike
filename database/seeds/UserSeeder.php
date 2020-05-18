<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@email.com',
        	'password' => Hash::make('adminadmin'),
        	'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => Hash::make('test1234'),
            'role_id' => 2,
        ]);
    }
}
