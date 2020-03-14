<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentNoteContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_note_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->bigInteger('id_parent_note')->unsigned();
            $table->foreign('id_parent_note')->references('id')->on('parent_note')->onDelete('cascade');
            $table->bigInteger('id_staff')->unsigned()->nullable();
            // $table->foreign('id_staff')->references('id')->on('staff_profiles')->onDelete('cascade');
            $table->bigInteger('id_parent')->unsigned()->nullable();
            // $table->foreign('id_staff')->references('id')->on('staff_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('parent_note_content');
    }
}
