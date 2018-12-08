<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->unique();
            $table->double('total_price');
            $table->double('shipment_fee');
            $table->string('shipment_etd');
            $table->string('shipment_number')->default('-');
            $table->string('address');
            $table->string('prove_payment');
            $table->integer('id_user')->unsigned();
            $table->integer('id_status')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_status')->references('id')->on('status_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
