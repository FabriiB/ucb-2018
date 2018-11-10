<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_delivery', function (Blueprint $table) {
            $table->increments('idOrder_Delivery');
            $table->timestamp('shippedDate');
            $table->timestamp('deliveryTime');
            $table->integer('idOrder')->unsigned();
            $table->integer('idDistributor')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('order_delivery');
    }
}
