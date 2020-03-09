<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentNoteChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_note_children', function (Blueprint $table) {
            $table->bigInteger('id_children')->unsigned();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
            $table->bigInteger('id_parentnote')->unsigned();
            $table->foreign('id_parentnote')->references('id')->on('parent_note')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_note_children');
    }
}
