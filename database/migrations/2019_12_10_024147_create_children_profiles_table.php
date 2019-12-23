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
            $table->tinyInteger('gender');
            $table->date('date_of_joining');
            $table->string('unique_id');
            $table->text('address');
            $table->text('allergies');
            $table->text('additional_note');
            $table->text('image');
            $table->integer('status');
            $table->integer('exist');
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
