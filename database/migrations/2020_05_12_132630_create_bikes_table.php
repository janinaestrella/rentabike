<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('model_code');
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('bikestatus_id')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('bikestatus_id')->references('id')->on('bike_statuses');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}
