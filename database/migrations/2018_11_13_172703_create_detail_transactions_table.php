<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->text('comment');
            $table->double('sub_total_price');
            $table->integer('id_transaction')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('id_cart')->unsigned();
            $table->timestamps();

            $table->foreign('id_transaction')->references('id')->on('transactions');
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_cart')->references("id")->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
