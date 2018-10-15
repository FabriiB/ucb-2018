<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixOrderDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_delivery', function (Blueprint $table) {
            $table->integer('idDistributor')->change();
            $table->renameColumn('idDistributor', 'id_distributor');
            $table->integer('idOrder')->change();
            $table->renameColumn('idOrder','id_order');
            $table->timestamp('shippedDate')->nullabe()->change();
            $table->renameColumn('shippedDate','shipped_date');
            $table->timestamp('deliveryTime')->nullabe()->change();
            $table->renameColumn('deliveryTime','delivery_time');
            $table->string('status',100)->change();
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_delivery', function (Blueprint $table) {
            $table->timestamp('shippedDate')->change();
            $table->timestamp('deliveryTime')->change();
            $table->renameColumn('idDistributor', 'id_distributor');
            $table->renameColumn('idOrder','id_order');
            $table->renameColumn('shippedDate','shipped_date');
            $table->renameColumn('deliveryTime','delivery_time');
        });
    }
}
