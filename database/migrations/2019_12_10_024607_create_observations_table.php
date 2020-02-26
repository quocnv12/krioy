<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_children')->unsigned();
            $table->string('detailObservation')->nullable();
            $table->string('observer')->nullable();
            $table->text('clip_board')->nullable();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
            $table->string('id_observations');
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
        Schema::dropIfExists('observations');
    }
}
