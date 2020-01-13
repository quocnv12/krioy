<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('leave')->nullable();
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
        Schema::dropIfExists('children_status');
    }
}
