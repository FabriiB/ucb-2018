<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodriv3Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meassure', function (Blueprint $table) {

            Schema::create('product', function (Blueprint $table) {
                $table->increments('id_product');
                $table->string('name', 100);
                $table->string('detail', 100);
                $table->string('precaution', 100);
                $table->integer('transaction_id');
                $table->timestamp('transaction_date');
                $table->string('transaction_host',50);
                $table->string('transaction_user',50);
                $table->timestamps();
                $table->rememberToken();
            });

            $table->increments('id_product_meassure');
            $table->integer('id_product');
            $table->foreign('id_product')->references('id_product')->on('product');
            $table->integer('id_meassure');
            $table->foreign('id_meassure')->references('id_meassure')->on('meassure');
            $table->integer('id_stock');
            $table->foreign('id_stock')->references('id_stock')->on('stock');
            $table->integer('id_order_delivery');
            $table->foreign('id_order_delivery')->references('id_order_delivery')->on('order_delivery');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();

        });
        Schema::create('stock', function (Blueprint $table) {

            $table->increments('id_stock');
            $table->integer('id_product_meassure');
            $table->foreign('id_product_meassure')->references('id_product_meassure')->on('product_meassure');
            $table->integer('id_depot');
            $table->foreign('id_depot')->references('id_depot')->on('depot');
            $table->decimal('quantity');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();

        });
        Schema::create('staff', function (Blueprint $table) {

            $table->increments('id_staff');
            $table->string('type',100);
            $table->integer('phone');
            $table->string('id',100);
            $table->integer('id_depot');
            $table->foreign('id_depot')->references('id_depot')->on('depot');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });

        Schema::create('depot', function (Blueprint $table) {
            $table->increments('id_depot');
            $table->string('address',100);
            $table->decimal('capacity');
            $table->string('type',100);
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
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
        Schema::dropIfExists('product');
        Schema::dropIfExists('depot');
    }
}
