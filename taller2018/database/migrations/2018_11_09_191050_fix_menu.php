<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->dropForeign('menu_id_administrator_foreign');
        });
        Schema::table('menu_dish', function (Blueprint $table) {
            $table->dropForeign('menu_dish_id_dish_foreign');
        });
        Schema::drop('recipe');
        Schema::drop('dish');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
        });

        Schema::create('recipe', function (Blueprint $table) {
            $table->increments('id_recipe')->unique();
            $table->string('description',250);
            $table->string('ingredients',100);
            $table->integer('id_dish');
            $table->integer('id_administrator');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');
            $table->foreign('id_dish')->references('idDish')->on('dish');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('dish', function (Blueprint $table) {
            $table->increments('idDish');
            $table->timestamp('date');
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('status');
            $table->decimal('quantity');
            $table->integer('idOrder');
            $table->integer('idAdministrator');
            $table->string('tip')->nullable();
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
