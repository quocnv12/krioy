<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_parent', function (Blueprint $table) {
            $table->bigInteger('id_parent')->unsigned();
            $table->foreign('id_parent')->references('id')->on('parent_profiles')->onDelete('cascade');
            $table->bigInteger('id_children')->unsigned();
            $table->foreign('id_children')->references('id')->on('children_profiles')->onDelete('cascade');
            $table->string('relationship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children_parent');
    }
}
