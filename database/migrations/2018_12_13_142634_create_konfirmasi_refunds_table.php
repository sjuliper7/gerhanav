<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_refunds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_request_refund')->unsigned();
            $table->string('alasan_penolakan');
            $table->string('no_hp_yang_dihubungi');
            $table->timestamps();

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
        Schema::dropIfExists('konfirmasi_refunds');
    }
}
