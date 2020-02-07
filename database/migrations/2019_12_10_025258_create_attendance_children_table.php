<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_children')->unsigned();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
            $table->integer('total_come');
            $table->integer('total_absent');
            $table->tinyInteger('month')->nullable();
            $table->year('year')->nullable();
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
        Schema::dropIfExists('attendance_children');
    }
}
