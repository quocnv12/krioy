<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('working_day')->Nullable();
            $table->string('timings')->Nullable();
            $table->string('programs')->Nullable();
            $table->string('trust_name')->Nullable()    ;
            $table->string('twitter')->Nullable();
            $table->string('facebook')->Nullable();
            $table->string('website')->Nullable();
            $table->string('youtube')->Nullable();
            $table->string('instagram')->Nullable();
            $table->string('logo');
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
        Schema::dropIfExists('school');
    }
}
