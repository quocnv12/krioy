<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('meal_type')->unsigned();
            $table->foreign('meal_type')->references('id')->on('meal_type')->onDelete('cascade');
            $table->bigInteger('quantity')->unsigned();
            $table->foreign('quantity')->references('id')->on('quantity_food')->onDelete('cascade');
            // $table->bigInteger('id_children')->unsigned();
            // $table->foreign('id_children')->references('id')->on('programs')->onDelete('cascade');
            // $table->date('date_begin');
            // $table->date('date_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
