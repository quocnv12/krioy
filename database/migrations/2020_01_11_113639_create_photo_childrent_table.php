<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoChildrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_childrent', function (Blueprint $table) {
            $table->bigInteger('id_photo');
            $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade');
            $table->bigInteger('id_children');
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_childrent');
    }
}
