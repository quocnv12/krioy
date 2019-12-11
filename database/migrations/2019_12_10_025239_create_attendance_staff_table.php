<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_staff')->unsigned();
            $table->foreign('id_staff')->references('id')->on('staff_profiles');
            $table->integer('total_come');
            $table->integer('total_absent');
            $table->tinyInteger('month');
            $table->year('year');
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
        Schema::dropIfExists('attendance_staff');
    }
}
