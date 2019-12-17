<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('password')->default(bcrypt('123456789'));
            $table->string('last_name');
            $table->string('phone');
            $table->string('image');
            $table->tinyInteger('gender');
            $table->string('email');
            $table->text('address');
            $table->date('birthday');
            $table->string('blood_group');
            $table->date('date_of_joining');
            $table->string('exist');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('staff_profiles');
    }
}
