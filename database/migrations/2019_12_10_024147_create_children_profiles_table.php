<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('blood_group');
            $table->string('gender');
            $table->date('date_of_joining');
            $table->string('unique_id');
            $table->text('address');
            $table->text('allergies');
            $table->text('additional_note');
            $table->integer('status');
            $table->integer('exits');
            $table->bigInteger('id_programs')->unsigned();
            $table->foreign('id_programs')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::dropIfExists('children_profiles');
    }
}
