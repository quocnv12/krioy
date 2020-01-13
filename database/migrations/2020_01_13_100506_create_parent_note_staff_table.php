<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentNoteStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_note_staff', function (Blueprint $table) {
            $table->bigInteger('id_staff')->unsigned();
            $table->foreign('id_staff')->references('id')->on('staff_profiles')->onDelete('cascade');
            $table->bigInteger('id_parent_note')->unsigned();
            $table->foreign('id_parent_note')->references('id')->on('parent_note')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_note_staff');
    }
}
