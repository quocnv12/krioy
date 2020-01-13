<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentNoteParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_note_parent', function (Blueprint $table) {
            $table->bigInteger('id_parent')->unsigned();
            $table->foreign('id_parent')->references('id')->on('parent_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('parent_note_parent');
    }
}
