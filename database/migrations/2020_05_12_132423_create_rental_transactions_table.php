<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('pickup_date');
            $table->date('return_date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rentstatus_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rentstatus_id')->references('id')->on('rental_statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_transactions');
    }
}
