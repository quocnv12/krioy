<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_children')->unsigned();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');

            $table->text('sick')->nullable();
            $table->float('growth_height')->nullable();
            $table->float('growth_weight')->nullable();
            $table->text('medicine')->nullable();
            $table->text('incident')->nullable();
            $table->string('blood_group');
            $table->string('image')->nullable();
            $table->string('file_pdf')->nullable();
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
        Schema::dropIfExists('health');
    }
}
