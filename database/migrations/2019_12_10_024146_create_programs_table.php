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
            $table->tinyInteger('from_month');
            $table->tinyInteger('to_month');
            $table->year('from_year');
            $table->year('to_year');
            $table->time('start_time')->nullable();
            $table->time('finish_time')->nullable();
            $table->string('schedule')->nullable();
            $table->string('program_fee')->nullable();
            $table->string('period_fee')->nullable();
            $table->integer('status')->nullable();
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
