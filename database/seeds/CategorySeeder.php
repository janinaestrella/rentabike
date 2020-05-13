<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Triathlon'
        ]);

        DB::table('categories')->insert([
        	'name' => 'Electric'
        ]);

        DB::table('categories')->insert([
        	'name' => 'Tandem'
        ]);

        DB::table('categories')->insert([
        	'name' => 'Mountain'
        ]);
    }
}
