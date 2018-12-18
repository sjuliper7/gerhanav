<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_refunds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('id_detail_transaction')->unsigned();
            $table->integer('id_status_refund')->unsigned();
            $table->string('alasan_pengembalian');
            $table->string('keterangan');
            $table->string('bukti_barang_image');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_detail_transaction')->references('id')->on('detail_transactions');
            $table->foreign('id_status_refund')->references('id')->on('status_refunds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_refunds');
    }
}
