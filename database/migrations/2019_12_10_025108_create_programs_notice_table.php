<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_notice', function (Blueprint $table) {
            $table->bigInteger('id_programs')->unsigned();
            $table->foreign('id_programs')->references('id')->on('programs')->onDelete('cascade');
            $table->bigInteger('id_notice')->unsigned();
            $table->foreign('id_notice')->references('id')->on('notice_board')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_notice');
    }
}
