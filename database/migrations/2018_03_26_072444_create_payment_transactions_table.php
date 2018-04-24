<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_code')->unique();
            $table->double('amount');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->string('remarks')->nullable();
            $table->string('uuid')->nullable();
            $table->string('trnx_code')->nullable();
            $table->string('provider_txid')->nullable();
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
        Schema::dropIfExists('payment_transactions');
    }
}
