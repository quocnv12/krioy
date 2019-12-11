<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_name');
            $table->date('from_month');
            $table->date('to_month');
            $table->year('from_year');
            $table->year('to_year');
            $table->integer('period');
            $table->time('start_time');
            $table->time('finish_time');
            $table->string('schedule');  
            $table->string('program_fee');   
            $table->integer('status');   
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
        Schema::dropIfExists('programs');
    }
}
