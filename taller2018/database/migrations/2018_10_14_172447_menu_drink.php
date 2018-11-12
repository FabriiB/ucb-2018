<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuDrink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_drink', function (Blueprint $table) {
            $table->increments('id_menu_drink')->unique();
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->integer('id_menu');
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
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
        Schema::dropIfExists('menu_drink');
    }
}
