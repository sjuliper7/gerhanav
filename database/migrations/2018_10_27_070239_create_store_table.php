<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name')->unique();
            $table->string('store_owner');
            $table->string('store_email');
            $table->string('store_phone');
            $table->string('store_address');
            $table->string('store_ktp');
            $table->string('store_ktp_image');
            $table->string('store_npwp');
            $table->string('store_npwp_image');
            $table->string('store_account_bank');
            $table->string('store_account_type');
            $table->string('store_account_bank_image');
            $table->string('store_province');
            $table->string('store_districts');
            $table->string('store_sub_district');
            $table->integer('id_user')->unsigned();
            $table->integer('id_request')->unsigned();
            $table->timestamps();

            $table->foreign('id_request')->references('id')->on('request_stores');
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
        Schema::dropIfExists('stores');
    }
}
