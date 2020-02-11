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
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->string('password')->default(bcrypt('123456789'));
            $table->string('image')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('exist')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('code')->nullable();
            $table->string('time_code')->nullable();
            $table->tinyInteger('level')->default(1);
            $table->rememberToken();
            $table->text('api_token')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('code_active')->nullable();
            $table->string('time_active')->nullable();
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
