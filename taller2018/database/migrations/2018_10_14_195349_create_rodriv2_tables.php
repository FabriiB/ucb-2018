<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodriv2Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meassure', function (Blueprint $table) {
            $table->foreign('id_product')->references('id_product')->on('product');
            $table->foreign('id_meassure')->references('id_meassure')->on('meassure');
            $table->foreign('id_stock')->references('id_stock')->on('stock');
            $table->foreign('id_order_delivery')->references('id_order_delivery')->on('order_delivery');

        });
        Schema::create('stock', function (Blueprint $table) {

            $table->foreign('id_product_meassure')->references('id_product_meassure')->on('product_meassure');
            $table->foreign('id_depot')->references('id_depot')->on('depot');

        });
        Schema::create('staff', function (Blueprint $table) {

            $table->foreign('id_depot')->references('id_depot')->on('depot');
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
        Schema::dropIfExists('stock');
        Schema::dropIfExists('staff');

    }
}
