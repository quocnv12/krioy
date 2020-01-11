<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_image', function (Blueprint $table) {
            $table->bigInteger('id_photo');
            $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade');
            $table->bigInteger('id_image');
            $table->foreign('id_image')->references('id')->on('photo_image_item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_image');
    }
}
