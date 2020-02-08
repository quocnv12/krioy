<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_children')->unsigned();
            $table->bigInteger('id_program')->unsigned();
            $table->string('in')->nullable();
            $table->string('out')->nullable();
            $table->string('absent')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::dropIfExists('children_status');
    }
}
