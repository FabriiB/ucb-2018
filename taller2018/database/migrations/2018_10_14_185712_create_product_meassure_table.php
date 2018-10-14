<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMeassureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meassure', function (Blueprint $table) {
            $table->increments('idproduct_meassure');
            $table->integer('idproduct');
            $table->integer('idmeassure');
            $table->integer('idstock');
            $table->integer('idorder_delivery');
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
        Schema::dropIfExists('product_meassure');
    }
}
