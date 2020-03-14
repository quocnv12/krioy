<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_note', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->datetime('date_from')->nullable();
            $table->datetime('date_to')->nullable();
            $table->bigInteger('id_program')->unsigned();
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade');
            $table->bigInteger('id_children')->unsigned();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('parent_note');
    }
}
