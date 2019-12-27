<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_board', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('important')->nullable();
            $table->integer('archive')->nullable()->default(0);
            $table->text('content');
            $table->string('writer')->nullable();
            $table->text('clip_board')->nullable();
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
        Schema::dropIfExists('notice_board');
    }
}
