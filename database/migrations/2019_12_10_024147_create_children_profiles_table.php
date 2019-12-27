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
            $table->string('blood_group')->nullable();
            $table->tinyInteger('gender');
            $table->date('date_of_joining')->nullable();
            $table->string('unique_id')->unique();
            $table->text('address')->nullable();
            $table->text('allergies')->nullable();
            $table->text('additional_note')->nullable();
            $table->text('image')->nullable();
            $table->integer('status')->nullable();
            $table->integer('exist')->nullable();
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
