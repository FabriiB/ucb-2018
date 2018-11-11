<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaBenji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {
            $table->increments('id_provider');
            $table->string('name', 50);
            $table->string('id', 50);
            $table->string('contact', 100);
            $table->string('address', 100);
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::create('provider_product', function (Blueprint $table) {
            $table->string('id_provider');
            $table->string('id_product');
            $table->string('status', 50);
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->string('id_administrator');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->string('id_administrator');
            $table->timestamp('date_created');
            $table->timestamp('date_update');
            $table->string('name', 50);
            $table->string('status', 50);
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
            $table->timestamps();
            $table->rememberToken();
         });
        Schema::create('menu_dish', function (Blueprint $table) {
            $table->increments('id_menu_dish');
            $table->string('id_menu');
            $table->string('id_dish');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::create('administrator', function (Blueprint $table) {
            $table->increments('id_administrator');
            $table->string('name', 100);
            $table->string('password', 50);
            $table->string('mail', 50);
            $table->integer('phone');
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
    public
    function down()
    {
        Schema::dropIfExists('provider');
        Schema::dropIfExists('provider_product');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('menu_dish');
        Schema::dropIfExists('administrator');

    }
}
