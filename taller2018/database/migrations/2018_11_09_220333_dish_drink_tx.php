<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DishDrinkTx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_drink', function (Blueprint $table) {
            $table->increments('id_dish_drink');
            $table->timestamp('date_created');
            $table->string('status', 50);
            $table->integer('id_dish');
            $table->foreign('id_dish')->references('id_dish')->on('dish');
            $table->integer('id_drink');
            $table->foreign('id_drink')->references('id_drink')->on('drink');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::create('tx', function (Blueprint $table) {
            $table->increments('transaction_id');
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
        Schema::drop('dish_drink');
        Schema::drop('tx');
    }
}
