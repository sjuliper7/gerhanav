<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_detail_transaction')->unsigned();
            $table->integer('id_request_refund')->unsigned();
            $table->string('no_rekening_tujuan');
            $table->string('atas_nama');
            $table->string('jenis_bank');
            $table->string('kurir_pengiriman');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_detail_transaction')->references('id')->on('detail_transactions');
            $table->foreign('id_request_refund')->references('id')->on('request_refunds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
