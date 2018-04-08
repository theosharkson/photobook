<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotobookOrderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photobook_order_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('photobook_id')->nullable()->unsigned();
            $table->foreign('photobook_id')->references('id')->on('photobooks');
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
        Schema::dropIfExists('photobook_order_images');
    }
}
