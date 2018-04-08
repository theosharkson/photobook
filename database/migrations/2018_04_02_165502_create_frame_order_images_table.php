<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameOrderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_order_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('frame_order_id')->nullable()->unsigned();
            $table->foreign('frame_order_id')->references('id')->on('frame_orders');
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
        Schema::dropIfExists('frame_order_images');
    }
}
