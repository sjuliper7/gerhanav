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
            $table->string('alasan');
            $table->string('keterangan');
            $table->integer('id_status_refund')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('refund_image');
            $table->string('no_rekening_tujuan');
            $table->string('atas_nama');
            $table->string('jenis_bank');
            $table->integer('jumlah');
            $table->string('kurir_pengiriman');
            $table->string('alasan_penolakan');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_status_refund')->references('id')->on('status_refunds');
            $table->foreign('id_user')->references('id')->on('users');
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
