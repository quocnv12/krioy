<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_image', function (Blueprint $table) {
            $table->bigInteger('id_school')->unsigned();
            $table->foreign('id_school')->references('id')->on('school')->onDelete('cascade');
            $table->bigInteger('id_image')->unsigned();
            $table->foreign('id_image')->references('id')->on('school_image_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_image');
    }
}
