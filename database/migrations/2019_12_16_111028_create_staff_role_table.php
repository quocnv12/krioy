<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_role', function (Blueprint $table) {
            $table->bigInteger('id_staff')->unsigned();
            $table->foreign('id_staff')->references('id')->on('staff_profiles')->onDelete('cascade');
            $table->bigInteger('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_role');
    }
}
