<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearestRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nearest_restaurants', function (Blueprint $table) {
            $table->bigIncrements('restaurant_id');
            $table->integer('spot_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('restaurant_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nearest_restaurants');
    }
}
