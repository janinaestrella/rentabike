<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rental_statuses')->insert([
        	'name' => 'Pending Approval'
        ]);

        DB::table('rental_statuses')->insert([
        	'name' => 'Approved'
        ]);

        DB::table('rental_statuses')->insert([
        	'name' => 'Rejected'
        ]);

        DB::table('rental_statuses')->insert([
        	'name' => 'On Loan'
        ]);

        DB::table('rental_statuses')->insert([
        	'name' => 'Returned'
        ]);

    }
}
