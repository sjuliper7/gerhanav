<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusProduct extends Migration
{
    public function up()
    {
        Schema::create('status_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('status_products');
    }
}
