<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_food_items', function (Blueprint $table) {
            $table->bigInteger('id_food_items')->unsigned();
            $table->foreign('id_food_items')->references('id')->on('food_items')->onDelete('cascade');
            $table->bigInteger('id_food')->unsigned();
            $table->foreign('id_food')->references('id')->on('food')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_food_items');
    }
}
