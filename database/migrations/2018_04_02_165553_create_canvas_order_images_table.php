<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvasOrderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canvas_order_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('canvas_order_id')->nullable()->unsigned();
            $table->foreign('canvas_order_id')->references('id')->on('canvas_orders');
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
        Schema::dropIfExists('canvas_order_images');
    }
}
