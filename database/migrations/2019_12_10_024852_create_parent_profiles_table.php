<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('password')->default(bcrypt('123456789'));
            $table->tinyInteger('gender')->nullable();
            $table->string('email')->nullable();
            $table->text('note')->nullable();
            $table->string('main_phone');
            $table->string('extra_phone')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('time_code')->nullable();
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
        Schema::dropIfExists('parent_profiles');
    }
}
