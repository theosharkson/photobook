<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canvas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('orientation')->unsigned();
            $table->foreign('orientation')->references('id')->on('orientations');
            $table->integer('size')->unsigned();
            $table->foreign('size')->references('id')->on('canvas_sizes');
            $table->string('image');
            $table->double('price');
            $table->string('description');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('canvas');
    }
}
