<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BikeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bike_statuses')->insert([
        	'name' => 'Available'
        ]);

        DB::table('bike_statuses')->insert([
        	'name' => 'Not Available'
        ]);

        DB::table('bike_statuses')->insert([
        	'name' => 'Under Maintenance'
        ]);
    }
}
