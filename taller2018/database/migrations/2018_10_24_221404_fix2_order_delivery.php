<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fix2OrderDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_delivery', function (Blueprint $table) {
            if (Schema::hasColumn('idDistributor', '`id_distributor`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN idDistributor;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN id_distributor integer NOT NULL;');
            }
            if (Schema::hasColumn('idOrder', '`id_order`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN idOrder;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN id_order integer NOT NULL;');
            }
            if (Schema::hasColumn('shippedDate', '`shipped_date`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN shippedDate;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN shipped_date timestamp;');
            }
            if (Schema::hasColumn('deliveryTime', '`delivery_time`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN deliveryTime;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN delivery_time timestamp;');
            }
            $table->string('status',100);
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
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
            $table->renameColumn('id_distributor', 'idDistributor');
            if (Schema::hasColumn('idDistributor', '`id_distributor`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN id_distributor;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN idDistributor integer NOT NULL;');
            }
            if (Schema::hasColumn('idOrder', '`id_order`'))
            {
                DB::statement('ALTER TABLE order_delivery DROP COLUMN id_order;');
                DB::statement('ALTER TABLE order_delivery ADD COLUMN idOrder timestamp NOT NULL;');
            }
            $table->renameColumn('shipped_date','shippedDate');
            $table->renameColumn('delivery_time','deliveryTime');
        });
    }
}
